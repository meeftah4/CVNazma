<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;
use App\Models\transactions;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function getSnapToken(Request $request)
    {
        // Set Midtrans config
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Ganti true jika sudah live
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $user = Auth::user();
        $cvsy_id = $request->cvsy_id;
        $order_id = 'ORDER-' . strtoupper(Str::random(10));
        $gross_amount = 20000;

        // Buat transaksi di database (status pending)
        $trx = transactions::create([
            'id' => (string) Str::uuid(),
            'cvsy_id' => $cvsy_id,
            'id_order' => $order_id,
            'gross_amount' => $gross_amount,
            'payment_method' => 'midtrans',
            'transaction_status' => 'pending',
            'fraud_status' => 'accept',
        ]);

        // Data untuk Snap
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $gross_amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id' => $order_id,
        ]);
    }
    public function midtransCallback(Request $request)
    {
        $notif = json_decode($request->getContent());
        $order_id = $notif->order_id ?? null;
        $transaction_status = $notif->transaction_status ?? null;
        $fraud_status = $notif->fraud_status ?? null;
        $transaction_id = $notif->transaction_id ?? null;
        $status_code = $notif->status_code ?? null;
        $signature_key = $notif->signature_key ?? null;
        $transaction_time = $notif->transaction_time ?? null;
        $currency = $notif->currency ?? 'IDR';

        if ($order_id) {
            $trx = \App\Models\transactions::where('id_order', $order_id)->first();
            if ($trx) {
                $trx->update([
                    'transaction_status' => $transaction_status,
                    'fraud_status' => $fraud_status,
                    'transaction_id' => $transaction_id,
                    'status_code' => $status_code,
                    'signature_key' => $signature_key,
                    'transaction_time' => $transaction_time,
                    'currency' => $currency,
                ]);

                // Update status_bayar pada cvs_users jika transaksi sukses
                if (in_array($transaction_status, ['settlement', 'capture'])) {
                    if ($trx->cvsy_id) {
                        \App\Models\Cvs_Users::where('id', $trx->cvsy_id)
                            ->update(['status_bayar' => true]);
                    }
                }
            }
        }
        return response()->json(['success' => true]);
    }
    public function checkStatus(Request $request)
    {
        $order_id = $request->order_id;
        $trx = \App\Models\transactions::where('id_order', $order_id)->first();
        if (!$trx) {
            return response()->json(['status' => 'not_found']);
        }

        // Jika status sudah settlement/capture, langsung return
        if (in_array($trx->transaction_status, ['settlement', 'capture'])) {
            return response()->json(['status' => $trx->transaction_status]);
        }

        // Jika belum, cek ke Midtrans (manual fetch status)
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        $status = \Midtrans\Transaction::status($order_id);

        // Pastikan $status adalah object
        if (is_array($status)) {
            $status = (object) $status;
        }

        // Update status di database
        $trx->update([
            'transaction_status' => $status->transaction_status ?? null,
            'fraud_status' => $status->fraud_status ?? null,
            'transaction_id' => $status->transaction_id ?? null,
            'status_code' => $status->status_code ?? null,
            'signature_key' => $status->signature_key ?? null,
            'transaction_time' => $status->transaction_time ?? null,
            'currency' => $status->currency ?? 'IDR',
        ]);

        return response()->json(['status' => $status->transaction_status]);
    }
}
