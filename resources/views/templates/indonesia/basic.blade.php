<!-- filepath: d:\Magang\CVNazma\resources\views\templates\indonesia\basic.blade.php -->
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
  @php
    $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
  @endphp
  <header class="flex flex-col sm:flex-row items-start gap-6 mb-8">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">
        {{ $profil0['name'] ?? 'Budi Santoso' }}
      </h1>
      <p class="text-sm text-gray-600">
        {{ $profil0['email'] ?? 'budi@example.com' }} | 
        {{ $profil0['phone'] ?? '0812-3456-7890' }} | 
        {{ $profil0['linkedin'] ?? 'linkedin.com/in/budisantoso' }} | 
        {{ $profil0['portfolio'] ?? 'budisantoso.com' }}
      </p>
      <p class="text-sm text-gray-600">
        {{ $profil0['address'] ?? 'Jl. Merdeka No. 10, Jakarta' }}
      </p>
    </div>
  </header>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Profil Singkat</h2>
    <p class="text-gray-600">
      {{ $profil0['description'] ?? 'Saya adalah developer berpengalaman yang fokus pada pengembangan aplikasi web dan mobile.' }}
    </p>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pengalaman Kerja</h2>
    @if(is_array($pengalamankerja) && count($pengalamankerja))
      @foreach ($pengalamankerja as $item)
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>{{ $item['companyName'] ?? 'PT Contoh Perusahaan' }} - {{ $item['jobCity'] ?? 'Jakarta' }}</p>
            <p class="text-gray-500">
              {{ $item['jobStartDate'] ?? 'Jan 2020' }} - 
              {{ ($item['jobIsPresent'] ?? false) ? 'Sekarang' : ($item['jobEndDate'] ?? 'Des 2022') }}
            </p>
          </div>
          <p class="italic">{{ $item['jobPosition'] ?? 'Software Engineer' }}</p>
          <ul class="list-disc list-inside">
            @php
              $jobDesc = $item['jobDescription'] ?? ['Mengembangkan aplikasi internal.', 'Berkoordinasi dengan tim QA.'];
              if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
              if (empty($jobDesc) || (count($jobDesc) === 1 && $jobDesc[0] === '')) $jobDesc = ['Mengembangkan aplikasi internal.', 'Berkoordinasi dengan tim QA.'];
            @endphp
            @foreach ($jobDesc as $desc)
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    @else
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
    @if(is_array($proyek) && count($proyek))
      @foreach ($proyek as $item)
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>{{ $item['projectName'] ?? 'Sistem Informasi Toko' }}</p>
            <p class="text-gray-500">
              {{ $item['projectStartDate'] ?? 'Feb 2021' }} - 
              {{ ($item['isPresent'] ?? false) ? 'Sekarang' : ($item['projectEndDate'] ?? 'Jul 2021') }}
            </p>
          </div>
          <p class="italic">{{ $item['projectPosition'] ?? 'PT Nazmalogy' }}</p>
          <ul class="list-disc list-inside">
            @php
              $descArr = $item['projectDescription'] ?? [];
              if (!is_array($descArr)) $descArr = [$descArr];
              if (empty($descArr) || (count($descArr) === 1 && $descArr[0] === '')) $descArr = ['Membangun sistem inventory dan penjualan.', 'Integrasi dengan payment gateway Midtrans.'];
            @endphp
            @foreach ($descArr as $desc)
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
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
    @if(is_array($keahlian) && count($keahlian))
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
        @foreach ($keahlian as $skill)
          <p>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</p>
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
    @if(is_array($pendidikan) && count($pendidikan))
      @foreach ($pendidikan as $edu)
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between font-semibold">
            <p>{{ $edu['educationInstitution'] ?? 'Universitas Contoh' }}</p>
            <p class="text-gray-500">
              {{ $edu['educationStartDate'] ?? '2015' }} - 
              {{ ($edu['isPresent'] ?? false) ? 'Sekarang' : ($edu['educationEndDate'] ?? '2019') }}
            </p>
          </div>
          <p class="italic">{{ $edu['educationDegree'] ?? 'Sarjana Teknik Informatika' }}</p>
          <ul class="list-disc list-inside">
            @php
              $descArr = $edu['educationDescription'] ?? [];
              if (!is_array($descArr)) $descArr = [$descArr];
              if (empty($descArr) || (count($descArr) === 1 && $descArr[0] === '')) $descArr = ['Lulus dengan predikat Cum Laude.', 'Aktif di organisasi kemahasiswaan.'];
            @endphp
            @foreach ($descArr as $desc)
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
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
      <p><strong>Bahasa:</strong>
        @if(is_array($bahasa) && count($bahasa))
          {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}
        @else
          Bahasa Indonesia, Bahasa Inggris
        @endif
      </p>
      <p><strong>Sertifikat:</strong>
        @if(is_array($sertifikat) && count($sertifikat))
          {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}
        @else
          Certified Laravel Developer, TOEFL Score 600
        @endif
      </p>
      <p><strong>Hobi:</strong>
        @if(is_array($hobi) && count($hobi))
          {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}
        @else
          Membaca, Bersepeda
        @endif
      </p>
    </div>
  </section>
</body>
</html>