{{-- filepath: resources/views/pages/ats-profile.blade.php --}}
<h1 class="profile-title">CV Ats Saya</h1>
@foreach($cvs as $cv)
    <div class="profile-ats m-4">
        <div class="flex items-start space-x-4">
            <!-- Logo di kiri -->
            <div class="bg-gray-200 rounded-[10px] p-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path fill="#01287E" d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m9 16v-2H6v2zm3-4v-2H6v2z"/>
                </svg>
            </div>

            <!-- Konten di kanan -->
            <div class="flex flex-col">

                <!-- Tulisan -->
                <h2 class="text-lg font-semibold text-[#01287E] font-bold text-left">{{ $cv->name }}</h2>

                <!-- Dibuat pada -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/time-wait.png') }}" alt="Logo" class="w-4 h-4 rounded-full">
                    <p class="text-sm text-gray-500">Dibuat pada: {{ $cv->created_at->format('d M Y') }}</p>
                </div>

                <!-- Tombol aksi -->
                <div class="flex items-center space-x-2 mt-4">
                    @php
                        $trx = $cv->transaction;
                        $trx_status = $trx->transaction_status ?? null;
                    @endphp

                    @if($trx_status === 'settlement' || $trx_status === 'capture')
                        <!-- Download aktif -->
                        <a href="{{ url('cv-user/' . $cv->template_cv . '/download') }}?cvsy_id={{ $cv->id }}" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">                                
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                            </svg>
                            Download
                        </a>
                    @elseif($trx_status === 'pending')
                        <!-- Download disable -->
                        <button class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] opacity-50 cursor-not-allowed text-[12px] px-2 py-1" disabled>
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                            </svg>
                            Download
                        </button>
                        <!-- Tombol Bayar styled sama -->
                        <button class="flex items-center bg-[#FFBC5D] text-[#01287E] font-bold rounded-[5px] hover:bg-white hover:scale-105 transition text-[12px] px-2 py-1 bayar-btn" data-cvsy-id="{{ $cv->id }}" data-order-id="{{ $trx->id_order ?? '' }}">
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 20c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9zm-1-8V7h2v6h-2zm0 4h2v-2h-2v2z"/>
                            </svg>
                            Bayar
                        </button>
                    @else
                        <!-- Download disable -->
                        <button class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] opacity-50 cursor-not-allowed text-[12px] px-2 py-1" disabled>
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                            </svg>
                            Download
                        </button>
                    @endif

                    <a href="{{ url('cv-user/' . $cv->template_cv) }}?cvsy_id={{ $cv->id }}" target="_blank" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                <path d="M21.544 11.045c.304.426.456.64.456.955c0 .316-.152.529-.456.955C20.178 14.871 16.689 19 12 19c-4.69 0-8.178-4.13-9.544-6.045C2.152 12.529 2 12.315 2 12c0-.316.152-.529.456-.955C3.822 9.129 7.311 5 12 5c4.69 0 8.178 4.13 9.544 6.045"/>
                                <path d="M15 12a3 3 0 1 0-6 0a3 3 0 0 0 6 0"/>
                            </g>
                        </svg>
                        Lihat
                    </a>

                    <!-- Hapus -->
                    <form method="POST" action="{{ route('cvs-users.destroy', $cv->id) }}" onsubmit="return confirm('Yakin hapus CV ini?')" class="flex items-center m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">
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
});
</script>