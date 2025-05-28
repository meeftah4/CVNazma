<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV Template 2 - ATS Friendly</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      max-width: 210mm;
      min-height: 297mm;
      margin: auto;
      background: white;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      color: #374151;
      padding: 24px;
    }
  </style>
</head>
<body class="leading-relaxed">
  <div class="flex flex-col sm:flex-row gap-8 mb-8">
    <!-- Kolom Kiri: Foto dan Info Kontak -->
    <aside class="sm:w-1/3 flex flex-col items-center text-center sm:text-left">
      <div class="w-32 h-32 mb-4 rounded-full overflow-hidden border-4 border-gray-300">
        <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="photo" />
      </div>
      <h1 class="text-3xl font-bold text-gray-900 mb-2">
        Budi Santoso
      </h1>
      <p class="text-sm text-gray-600 mb-1">
        Jl. Merdeka No. 10, Jakarta
      </p>
      <p class="text-sm text-gray-600 mb-1">
        budi@example.com
      </p>
      <p class="text-sm text-gray-600 mb-1">
        0812-3456-7890
      </p>
      <p class="text-sm text-gray-600 mb-1">
        linkedin.com/in/budisantoso
      </p>
      <p class="text-sm text-gray-600">
        budisantoso.com
      </p>
    </aside>

    <!-- Kolom Kanan: Isi Detail -->
    <main class="sm:w-2/3">
      <section class="mb-8">
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Profil Singkat</h2>
        <p class="text-gray-600">
          Saya adalah developer berpengalaman yang fokus pada pengembangan aplikasi web dan mobile.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pengalaman Kerja</h2>
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>PT Contoh Perusahaan - Jakarta</p>
            <p class="text-gray-500">Jan 2020 - Des 2022</p>
          </div>
          <p class="italic">Software Engineer</p>
          <ul class="list-disc list-inside">
            <li>Mengembangkan aplikasi internal menggunakan Laravel dan Vue.js.</li>
            <li>Berkoordinasi dengan tim QA untuk memastikan kualitas produk.</li>
          </ul>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Proyek</h2>
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>Sistem Informasi Toko</p>
            <p class="text-gray-500">Feb 2021 - Jul 2021</p>
          </div>
          <p class="italic">PT Nazmalogy</p>
          <ul class="list-disc list-inside">
            <li>Membangun sistem inventory dan penjualan toko retail.</li>
            <li>Integrasi dengan payment gateway Midtrans.</li>
          </ul>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Keahlian</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
          <p>PHP</p>
          <p>Laravel</p>
          <p>JavaScript</p>
          <p>Tailwind CSS</p>
          <p>MySQL</p>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pendidikan</h2>
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>Universitas Contoh</p>
            <p class="text-gray-500">2015 - 2019</p>
          </div>
          <p class="italic">Sarjana Teknik Informatika</p>
          <ul class="list-disc list-inside">
            <li>Lulus dengan predikat Cum Laude.</li>
            <li>Aktif di organisasi kemahasiswaan.</li>
          </ul>
        </div>
      </section>

      <section>
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Informasi Tambahan</h2>
        <div class="text-sm text-gray-700 space-y-2">
          <p><strong>Bahasa:</strong> Bahasa Indonesia, Bahasa Inggris</p>
          <p><strong>Sertifikat:</strong> Certified Laravel Developer, TOEFL Score 600</p>
          <p><strong>Hobi:</strong> Membaca, Bersepeda</p>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
