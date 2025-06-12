@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/paket.css'])

@section('content')
<div class="paket-container">
    <h1 class="paket-title">Paket</h1>
    <p class="paket-subtitle">
        Nikmati akses penuh semua template dengan harga paket terbaik.<br>
        Upgrade kariermu dengan harga paket spesial!
    </p>    
    <div class="paket-cards">
        <div class="paket-card">
            <div class="paket-harga">
                <span class="harga">Rp. 20.000</span><span class="per">/5 cv</span>
            </div>
            <div class="paket-original">Harga original: 30k</div>
            <ul class="paket-list">
                <li><span class="check">&#10003;</span> Penawaran terbatas</li>
                <li><span class="check">&#10003;</span> Akses penuh semua template</li>
                <li><span class="check">&#10003;</span> Akses penuh membuat cv sebanyak 5 kali</li>
                <li><span class="check">&#10003;</span> Gratis 1 template CV setelah 5 kali buat</li>
            </ul>
            <button class="paket-btn" data-harga="20000" data-cv="5">Ayo mulai</button>
        </div>
        <div class="paket-card">
            <div class="paket-harga">
                <span class="harga">Rp. 40.000</span><span class="per">/10 cv</span>
            </div>
            <div class="paket-original">Harga original: 50k</div>
            <ul class="paket-list">
                <li><span class="check">&#10003;</span> Penawaran terbatas</li>
                <li><span class="check">&#10003;</span> Akses penuh semua template</li>
                <li><span class="check">&#10003;</span> Akses penuh membuat cv sebanyak 10 kali</li>
                <li><span class="check">&#10003;</span> Gratis 2 template CV setelah 10 kali buat</li>
            </ul>
            <button class="paket-btn" data-harga="40000" data-cv="10">Ayo mulai</button>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="modal-konfirmasi" class="modal-konfirmasi" style="display:none;">
    <div class="modal-content">
        <!-- Icon menarik di atas judul -->
        <div style="display:flex; justify-content:center; margin-bottom:12px;">
            <svg width="56" height="56" viewBox="0 0 56 56" fill="none">
                <circle cx="28" cy="28" r="24" fill="#FFBC5D"/>
                <circle cx="28" cy="28" r="16" fill="none"/>
                <circle cx="28" cy="28" r="13" stroke="#01287E" stroke-width="2"/>
                <rect x="27" y="19" width="2" height="12" rx="1" fill="#01287E"/>
                <circle cx="28" cy="35" r="1.5" fill="#01287E"/>
            </svg>
        </div>
        <span class="modal-close" onclick="tutupModal()">&times;</span>
        <h2 class="modal-title">Konfirmasi Pembelian Paket</h2>
        <p>Apakah Anda yakin ingin membeli paket ini dan melanjutkan ke pembayaran?</p>
        <label style="display:block; margin:16px 0;">
            <input type="checkbox" id="setuju-checkbox">
            Saya setuju dan ingin melanjutkan pembayaran.
        </label>
        <div class="modal-actions">
            <button onclick="tutupModal()" class="modal-btn-batal">Kembali</button>
            <button id="lanjutkan-btn" class="modal-btn-lanjut" disabled>Lanjutkan</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.paket-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var harga = this.getAttribute('data-harga');
                var cv = this.getAttribute('data-cv');
                
                document.getElementById('modal-konfirmasi').style.display = 'flex';
                
                document.getElementById('lanjutkan-btn').onclick = function() {
                    if(document.getElementById('setuju-checkbox').checked) {
                        // Lanjutkan ke proses pembayaran
                        alert('Proses pembayaran untuk paket seharga Rp. ' + harga + ' dengan kuota ' + cv + ' CV akan segera dimulai.');
                        // Di sini tambahkan kode untuk melanjutkan ke proses pembayaran
                    } else {
                        alert('Anda harus menyetujui syarat dan ketentuan untuk melanjutkan.');
                    }
                };
            });
        });
        var checkbox = document.getElementById('setuju-checkbox');
        var label = checkbox ? checkbox.parentElement : null;
        var lanjutBtn = document.getElementById('lanjutkan-btn');
        if (checkbox && label && lanjutBtn) {
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    label.classList.add('checked');
                    lanjutBtn.classList.add('active');
                } else {
                    label.classList.remove('checked');
                    lanjutBtn.classList.remove('active');
                }
            });
        }
    });

    function tutupModal() {
        document.getElementById('modal-konfirmasi').style.display = 'none';
    }
</script>
@endsection