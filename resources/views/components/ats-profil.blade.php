<style>
    body {
        font-family: 'Kantumruy', sans-serif;
    }
    .profile-title {
        font-size: 40px;
        font-weight: bold;
        font-family: 'Kantumruy', sans-serif;
        color: #01287E;
        text-align: center;
        margin-bottom: 1.5rem;
    }
</style>
<div class="min-h-screen to-white py-8 px-2 md:px-8">
    <h1 class="profile-title">Cv Ats Saya</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($cvs as $cv)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 p-6 flex flex-col border border-gray-100 hover:scale-[1.02]">
                <div class="flex items-start space-x-4">
                    <div class="bg-blue-100 rounded-[10px] p-2 flex items-center justify-center shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                            <path fill="#01287E" d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m9 16v-2H6v2zm3-4v-2H6v2z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-1">
                        <h2 class="text-lg md:text-xl font-bold text-[#01287E] mb-1">{{ $cv->name }}</h2>
                        <div class="flex items-center space-x-2 mb-2">
                            <img src="{{ asset('images/time-wait.png') }}" alt="Logo" class="w-4 h-4 rounded-full">
                            <p class="text-sm text-gray-500 flex items-center gap-1">
                                Dibuat: 
                                <span 
                                    class="realtime-clock whitespace-nowrap"
                                    data-timestamp="{{ $cv->created_at->format('Y-m-d H:i:s') }}">
                                    {{ $cv->created_at->format('d M Y, H:i') }}
                                </span>
                            </p>
                        </div>
                        @php
                            $trx = $cv->transaction;
                            $trx_status = $trx->transaction_status ?? null;
                        @endphp
                        <div class="mb-2">
                            @if($trx_status === 'settlement' || $trx_status === 'capture')
                                <span class="inline-block px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700 font-semibold">Lunas</span>
                            @elseif($trx_status === 'pending')
                                <span class="inline-block px-2 py-0.5 text-xs rounded-full bg-yellow-100 text-yellow-700 font-semibold">Menunggu Pembayaran</span>
                            @else
                                <span class="inline-block px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-500 font-semibold">Belum Dibayar</span>
                            @endif
                        </div>
                        <div class="flex flex-wrap items-center gap-2 mt-2">
                            @if($trx_status === 'settlement' || $trx_status === 'capture')
                                <a href="{{ url('cv-user/' . $cv->template_cv . '/download') }}?cvsy_id={{ $cv->id }}" class="flex items-center bg-blue-50 text-[#01287E] font-bold rounded-[5px] hover:bg-blue-100 hover:scale-105 transition text-[12px] px-3 py-1 shadow-sm">                                
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                                    </svg>
                                    Download
                                </a>
                            @elseif($trx_status === 'pending')
                                <button class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] opacity-50 cursor-not-allowed text-[12px] px-3 py-1" disabled>
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                                    </svg>
                                    Download
                                </button>
                                <button class="flex items-center bg-[#FFBC5D] text-[#01287E] font-bold rounded-[5px] hover:bg-white hover:scale-105 transition text-[12px] px-3 py-1 bayar-btn shadow-sm" data-cvsy-id="{{ $cv->id }}" data-order-id="{{ $trx->id_order ?? '' }}">
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 20c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9zm-1-8V7h2v6h-2zm0 4h2v-2h-2v2z"/>
                                    </svg>
                                    Bayar
                                </button>
                            @else
                                <button class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] opacity-50 cursor-not-allowed text-[12px] px-3 py-1" disabled>
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                                    </svg>
                                    Download
                                </button>
                            @endif

                            <a href="{{ route('cv-user.preview-ats', ['template' => $cv->template_cv, 'cvsy_id' => $cv->id]) }}" target="_blank" class="flex items-center bg-gray-100 text-[#01287E] font-bold rounded-[5px] hover:bg-blue-50 hover:scale-105 transition text-[12px] px-3 py-1 shadow-sm">
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                        <path d="M21.544 11.045c.304.426.456.64.456.955c0 .316-.152.529-.456.955C20.178 14.871 16.689 19 12 19c-4.69 0-8.178-4.13-9.544-6.045C2.152 12.529 2 12.315 2 12c0-.316.152-.529.456-.955C3.822 9.129 7.311 5 12 5c4.69 0 8.178 4.13 9.544 6.045"/>
                                        <path d="M15 12a3 3 0 1 0-6 0a3 3 0 0 0 6 0"/>
                                    </g>
                                </svg>
                                Lihat
                            </a>

                            <form method="POST" action="{{ route('cvs-users.destroy', $cv->id) }}" onsubmit="return confirm('Yakin hapus CV ini?')" class="flex items-center m-0 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center bg-red-50 text-red-700 font-bold rounded-[5px] hover:bg-red-100 hover:scale-105 transition text-[12px] px-3 py-1 shadow-sm">
                                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-tNOItnN7xmutsv1uuPr4zC7e"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.bayar-btn').forEach(function(btn) {
        btn.onclick = async function() {
            const cvsy_id = btn.getAttribute('data-cvsy-id');
            btn.disabled = true;
            btn.textContent = 'Memproses...';

            let snapRes = await fetch('/midtrans/get-snap-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({cvsy_id})
            });
            let snapData = await snapRes.json();

            btn.disabled = false;
            btn.textContent = 'Bayar';

            window.snap.pay(snapData.snap_token, {
                onSuccess: function(result){
                    checkTransactionStatus(snapData.order_id, cvsy_id);
                },
                onPending: function(result){
                    window.location.reload();
                },
                onError: function(result){
                    Swal.fire('Gagal', 'Pembayaran gagal. Silakan coba lagi.', 'error');
                },
                onClose: function(){}
            });

            async function checkTransactionStatus(order_id, cvsy_id) {
                let maxTries = 10;
                let tries = 0;
                let settled = false;
                while (tries < maxTries && !settled) {
                    let res = await fetch('/midtrans/check-status', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content},
                        body: JSON.stringify({order_id})
                    });
                    let data = await res.json();
                    if (data.status === 'settlement' || data.status === 'capture') {
                        settled = true;
                        window.location.reload();
                        return;
                    }
                    await new Promise(r => setTimeout(r, 2000));
                    tries++;
                }
                window.location.reload();
            }
        };
    });

    // Realtime clock for each CV
    function updateRealtimeClocks() {
        document.querySelectorAll('.realtime-clock').forEach(function(el) {
            const timestamp = el.getAttribute('data-timestamp');
            if (!timestamp) return;
            // Parse as UTC then convert to local time
            const date = new Date(timestamp.replace(' ', 'T') + 'Z');
            // Format: 13 Jun 2025, 14:30
            const options = { day: '2-digit', month: 'short', year: 'numeric' };
            const dateStr = date.toLocaleDateString('id-ID', options);
            const timeStr = date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false });
            el.textContent = `${dateStr}, ${timeStr}`;
        });
    }
    updateRealtimeClocks();
    setInterval(updateRealtimeClocks, 1000);
});
</script>