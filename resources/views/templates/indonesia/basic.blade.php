<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV Template 1 - ATS Friendly</title>
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
  <header class="flex flex-col sm:flex-row items-start gap-6 mb-8">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">
        {{ $profil[0]['name'] ?? 'Budi Santoso' }}
      </h1>
      <p class="text-sm text-gray-600">
        {{ $profil[0]['email'] ?? 'budi@example.com' }} | 
        {{ $profil[0]['phone'] ?? '0812-3456-7890' }} | 
        {{ $profil[0]['linkedin'] ?? 'linkedin.com/in/budisantoso' }} | 
        {{ $profil[0]['portfolio'] ?? 'budisantoso.com' }}
      </p>
      <p class="text-sm text-gray-600">
        {{ $profil[0]['address'] ?? 'Jl. Merdeka No. 10, Jakarta' }}
      </p>
    </div>
  </header>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Profil Singkat</h2>
    <p class="text-gray-600">
      {{ $profil[0]['description'] ?? 'Saya adalah developer berpengalaman yang fokus pada pengembangan aplikasi web dan mobile.' }}
    </p>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pengalaman Kerja</h2>
    @if(!empty($pengalamankerja))
      @foreach ($pengalamankerja as $item)
        <div class="mb-5 text-sm text-gray-700">
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
      {{-- Tampilkan dummy experience kalau data kosong --}}
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
    @endif
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Proyek</h2>
    @if(!empty($proyek))
      @foreach ($proyek as $item)
        <div class="mb-5 text-sm text-gray-700">
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
    @endif
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Keahlian</h2>
    @if(!empty($keahlian))
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
        @foreach ($keahlian as $skill)
          <p>{{ $skill }}</p>
        @endforeach
      </div>
    @else
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
        <p>PHP</p>
        <p>Laravel</p>
        <p>JavaScript</p>
        <p>Tailwind CSS</p>
        <p>MySQL</p>
      </div>
    @endif
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pendidikan</h2>
    @if(!empty($pendidikan))
      @foreach ($pendidikan as $edu)
        <div class="mb-5 text-sm text-gray-700">
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
    @endif
  </section>

  <section>
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Informasi Tambahan</h2>
    <div class="text-sm text-gray-700 space-y-2">
      <p><strong>Bahasa:</strong> {{ !empty($bahasa) ? implode(', ', $bahasa) : 'Bahasa Indonesia, Bahasa Inggris' }}</p>
      <p><strong>Sertifikat:</strong> {{ !empty($sertifikat) ? implode(', ', $sertifikat) : 'Certified Laravel Developer, TOEFL Score 600' }}</p>
      <p><strong>Hobi:</strong> {{ !empty($hobi) ? implode(', ', $hobi) : 'Membaca, Bersepeda' }}</p>
    </div>
  </section>

</body>
</html>
