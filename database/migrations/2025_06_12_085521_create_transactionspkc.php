<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactionspkc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkc_id')->constrained('packages')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('id_order')->unique();
            $table->integer('gross_amount');
            $table->string('payment_method');
            $table->string('transaction_status');
            $table->string('fraud_status');
            $table->string('transaction_id')->nullable();
            $table->string('status_code')->nullable();
            $table->string('signature_key')->nullable();
            $table->string('currency')->default('IDR');
            $table->timestamp('transaction_time')->nullable();
            $table->string('callback_url')->nullable();
        
            // Sistem langganan transaksi
            $table->boolean('is_subscription')->default(false);
            $table->integer('remaining_uses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionspkc');
    }
};
