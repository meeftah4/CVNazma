{{-- filepath: d:\Magang\CVNazma\resources\views\pages\cv-complete.blade.php --}}
@extends('layouts.app')

@section('title', 'Unduh CV')

@vite(['resources/css/cv-complete.css'])


@section('content')
@php
    $templateNames = [
        'basic' => 'Klasik Minimalis',
        'template1' => 'Modern Elegan',
        'template2' => 'Kreatif Warna', 
        'template3' => 'Profesional Bisnis',
        'template4' => 'Simetris Bersih',
        'template5' => 'Bold Kontras',
    ];
    $templateDisplay = $templateNames[$template] ?? $template;
@endphp

<div class="cv-complete-container">
    <h1 class="cv-complete-title">Pembayaran Berhasil!</h1>
    <p class="cv-complete-desc">Silakan preview dan unduh CV Anda di bawah ini.</p>

    <!-- Preview CV -->
    <div class="cv-preview-box">
        <div class="cv-preview-bg">
            <div class="cv-preview-frame">
                <iframe 
                    id="cvPreview"
                    src="{{ url('cv-user/' . $template) }}?cvsy_id={{ $cvsy_id }}"
                    class="cv-iframe"
                    loading="lazy"
                    title="Preview {{ $templateDisplay }}"
                    sandbox="allow-same-origin allow-scripts"
                ></iframe>
            </div>
        </div>
    </div>

    <!-- Tombol Unduh PDF -->
    <div class="cv-complete-btn-group">
        <a href="{{ url('/') }}" class="cv-home-btn">
            Home
        </a>
        <button type="button" class="cv-download-btn" id="openRatingModal">
            Unduh CV
        </button>
    </div>

    <!-- Modal Rating -->
    <div class="rating-modal-overlay" id="ratingModalOverlay">
        <div class="rating-modal">
            <img src="{{ asset('images/rating.png') }}" alt="Review" class="rating-modal-img">
            <div class="rating-modal-title">Bagaimana Pengalaman Anda?</div>
            <div class="rating-modal-subtitle">Beri rating & ulasan untuk membantu kami meningkatkan layanan!</div>
            <form id="ratingForm">
                <div class="rating-modal-label">Nilai Anda untuk CV ini</div>
                <div class="rating-stars" id="ratingStars"></div>
                <div class="rating-modal-label">Deskripsi</div>
                <textarea class="rating-modal-textarea" name="desc" rows="4" placeholder="Tulis ulasan"></textarea>
                <button type="submit" class="rating-modal-submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const openBtn = document.getElementById('openRatingModal');
    const modal = document.getElementById('ratingModalOverlay');
    const form = document.getElementById('ratingForm');
    let selectedRating = 0;

    // Key unik per CV (template + cvsy_id)
    const templateKey = 'cv_has_rated_{{ $template }}_{{ $cvsy_id }}';

    // Generate stars
    const starsContainer = document.getElementById('ratingStars');
    let stars = [];
    for (let i = 1; i <= 5; i++) {
        const star = document.createElement('span');
        star.className = 'rating-star';
        star.innerHTML = '☆'; // Outline by default
        star.dataset.value = i;
        star.addEventListener('mouseenter', function() {
            updateStars(i);
        });
        star.addEventListener('mouseleave', function() {
            updateStars(selectedRating);
        });
        star.addEventListener('click', function() {
            selectedRating = i;
            updateStars(selectedRating);
        });
        starsContainer.appendChild(star);
        stars.push(star);
    }
    function updateStars(rating = 0) {
        stars.forEach((star, idx) => {
            if (idx < rating) {
                star.innerHTML = '★'; // Filled
                star.classList.add('selected');
            } else {
                star.innerHTML = '☆'; // Outline
                star.classList.remove('selected');
            }
        });
    }
    updateStars(0);

    // Cek apakah sudah rating untuk CV ini
    function hasRated() {
        return localStorage.getItem(templateKey) === '1';
    }
    function setRated() {
        localStorage.setItem(templateKey, '1');
    }

    // Open modal
    openBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (hasRated()) {
            // Sudah rating untuk CV ini, langsung download
            window.location.href = "{{ url('cv-user/' . $template . '/download') }}?cvsy_id={{ $cvsy_id }}";
        } else {
            // Belum rating, tampilkan modal
            modal.style.display = 'flex';
        }
    });

    // Submit rating
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (selectedRating === 0) {
            alert('Silakan pilih rating terlebih dahulu.');
            return;
        }
        setRated();
        modal.style.display = 'none';
        window.location.href = "{{ url('cv-user/' . $template . '/download') }}?cvsy_id={{ $cvsy_id }}";
    });

    // Optional: klik di luar modal untuk close (bisa di-nonaktifkan jika ingin wajib rating)
    // modal.addEventListener('click', function(e) {
    //     if (e.target === modal) modal.style.display = 'none';
    // });
});
</script>
@endpush