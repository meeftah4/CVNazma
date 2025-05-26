<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV Template 2 - ATS Friendly (2 Kolom)</title>
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
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Sidebar Kiri -->
    <aside class="md:col-span-1 space-y-8">
      <div class="flex flex-col items-center">
        <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-gray-300 mb-3">
          <img src="{{ session('foto') ?? asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="photo" />
        </div>
        <h1 class="text-2xl font-bold text-gray-900 text-center">{{ $profil[0]['name'] ?? 'Budi Santoso' }}</h1>
      </div>
      <section>
        <h2 class="text-lg font-semibold border-b border-gray-300 pb-1 mb-2">Kontak</h2>
        <ul class="space-y-1 text-sm text-gray-700">
          <li>{{ $profil[0]['address'] ?? 'Jl. Merdeka No. 10, Jakarta' }}</li>
          <li>{{ $profil[0]['email'] ?? 'budi@example.com' }}</li>
          <li>{{ $profil[0]['phone'] ?? '0812-3456-7890' }}</li>
          <li>{{ $profil[0]['linkedin'] ?? 'linkedin.com/in/budisantoso' }}</li>
          <li>{{ $profil[0]['portfolio'] ?? 'budisantoso.com' }}</li>
        </ul>
      </section>
      <section>
        <h2 class="text-lg font-semibold border-b border-gray-300 pb-1 mb-2">Keahlian</h2>
        <ul class="list-disc list-inside text-sm">
          @if(!empty($keahlian))
            @foreach ($keahlian as $skill)
              <li>{{ $skill }}</li>
            @endforeach
          @else
            <li>PHP</li>
            <li>Laravel</li>
            <li>JavaScript</li>
            <li>Tailwind CSS</li>
            <li>MySQL</li>
          @endif
        </ul>
      </section>
      <section>
        <h2 class="text-lg font-semibold border-b border-gray-300 pb-1 mb-2">Informasi Tambahan</h2>
        <div class="text-sm space-y-1">
          <p><strong>Bahasa:</strong> {{ !empty($bahasa) ? implode(', ', $bahasa) : 'Bahasa Indonesia, Bahasa Inggris' }}</p>
          <p><strong>Sertifikat:</strong> {{ !empty($sertifikat) ? implode(', ', $sertifikat) : 'Certified Laravel Developer, TOEFL Score 600' }}</p>
          <p><strong>Hobi:</strong> {{ !empty($hobi) ? implode(', ', $hobi) : 'Membaca, Bersepeda' }}</p>
        </div>
      </section>
    </aside>

    <!-- Konten Utama Kanan -->
    <main class="md:col-span-2 space-y-8 text-gray-700 text-sm">
      <section>
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Profil Singkat</h2>
        <p>{{ $profil[0]['description'] ?? 'Saya adalah developer berpengalaman yang fokus pada pengembangan aplikasi web dan mobile.' }}</p>
      </section>

      <section>
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Pengalaman Kerja</h2>
        @if(!empty($pengalamankerja))
          @foreach ($pengalamankerja as $item)
            <div class="mb-4">
              <div class="flex justify-between font-semibold">
                <p>{{ $item['companyName'] ?? 'PT Contoh Perusahaan' }} - {{ $item['jobCity'] ?? 'Jakarta' }}</p>
                <p class="text-gray-500">{{ $item['jobStartDate'] ?? 'Jan 2020' }} - {{ $item['isPresent'] ? 'Sekarang' : ($item['jobEndDate'] ?? 'Des 2022') }}</p>
              </div>
              <p class="italic">{{ $item['jobPosition'] ?? 'Software Engineer' }}</p>
              <ul class="list-disc list-inside">
                @foreach ($item['jobDescription'] ?? ['Mengembangkan aplikasi internal.', 'Berkoordinasi dengan tim QA.'] as $desc)
                  <li>{{ $desc }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        @else
          <div class="mb-4">
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
        @endif
      </section>

      <section>
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Proyek</h2>
        @if(!empty($proyek))
          @foreach ($proyek as $item)
            <div class="mb-4">
              <div class="flex justify-between font-semibold">
                <p>{{ $item['title'] ?? 'Sistem Informasi Toko' }}</p>
                <p class="text-gray-500">{{ $item['startDate'] ?? 'Feb 2021' }} - {{ $item['endDate'] ?? 'Jul 2021' }}</p>
              </div>
              <p class="italic">{{ $item['institution'] ?? 'PT Nazmalogy' }}</p>
              <ul class="list-disc list-inside">
                @foreach ($item['description'] ?? ['Membangun sistem inventory dan penjualan.','Integrasi dengan payment gateway Midtrans.'] as $desc)
                  <li>{{ $desc }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        @else
          <div class="mb-4">
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
        @endif
      </section>

      <section>
        <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Pendidikan</h2>
        @if(!empty($pendidikan))
          @foreach ($pendidikan as $edu)
            <div class="mb-4">
              <div class="flex justify-between font-semibold">
                <p>{{ $edu['institution'] ?? 'Universitas Contoh' }}</p>
                <p class="text-gray-500">{{ $edu['startDate'] ?? '2015' }} - {{ $edu['endDate'] ?? '2019' }}</p>
              </div>
              <p class="italic">{{ $edu['degree'] ?? 'Sarjana Teknik Informatika' }}</p>
              <ul class="list-disc list-inside">
                @foreach ($edu['description'] ?? ['Lulus dengan predikat Cum Laude.', 'Aktif di organisasi kemahasiswaan.'] as $desc)
                  <li>{{ $desc }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        @else
          <div class="mb-4">
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
        @endif
      </section>
    </main>
  </div>
</body>
</html>
