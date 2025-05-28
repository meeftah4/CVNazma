<div class="flex items-center justify-center min-h-screen bg-[#F4F8FF]">
    <div class="bg-[#F4F8FF] rounded-[2rem] p-8 w-[400px] shadow-md flex flex-col items-center">
        <img src="https://img.freepik.com/free-vector/customer-satisfaction-concept-illustration_114360-7763.jpg?w=826&t=st=1716463142~exp=1716463742~hmac=7b6e3e5e7b2e9b6a7c5c4d2b6b7c8d2e" alt="Ulasan" class="w-48 mb-4 rounded-lg">
        <div class="w-full">
            <div class="mb-4">
                <div class="bg-[#FFBC5D] rounded-xl py-2 text-center text-2xl font-bold text-[#01287E] shadow" style="border:4px solid #F4E3C6;">
                    Ulasan
                </div>
            </div>
            <form method="POST" action="{{ route('rating.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-[#01287E] font-semibold mb-1">Nilai</label>
                    <div class="flex items-center space-x-1 text-3xl" id="starRating">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="star cursor-pointer transition" data-value="{{ $i }}" style="color:#FFC700;">&#9734;</span>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="0">
                </div>
                <div class="mb-6">
                    <label class="block text-[#01287E] font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="w-full rounded-xl border border-gray-200 p-4 text-[#01287E] focus:outline-none focus:ring-2 focus:ring-[#FFBC5D] shadow" placeholder="Tulis ulasan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="w-full py-2 rounded-xl bg-[#FFBC5D] text-[#01287E] font-bold text-xl shadow hover:bg-[#ffcb7d] transition">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    // Star rating interaktif
    const stars = document.querySelectorAll('#starRating .star');
    const ratingInput = document.getElementById('ratingInput');
    stars.forEach((star, idx) => {
        star.addEventListener('mouseenter', () => {
            for (let i = 0; i <= idx; i++) stars[i].innerHTML = '&#9733;';
            for (let i = idx + 1; i < stars.length; i++) stars[i].innerHTML = '&#9734;';
        });
        star.addEventListener('mouseleave', () => {
            let val = parseInt(ratingInput.value);
            for (let i = 0; i < stars.length; i++) {
                stars[i].innerHTML = i < val ? '&#9733;' : '&#9734;';
            }
        });
        star.addEventListener('click', () => {
            ratingInput.value = idx + 1;
            for (let i = 0; i < stars.length; i++) {
                stars[i].innerHTML = i <= idx ? '&#9733;' : '&#9734;';
            }
        });
    });
</script>