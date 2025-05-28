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
        {{ $profil0['name'] ?? 'Nama Lengkap' }}
      </h1>
      <p class="text-sm text-gray-600">
        {{ $profil0['email'] ?? 'nama@email.com' }} | 
        {{ $profil0['phone'] ?? '0812-3456-7890' }} | 
        {{ $profil0['linkedin'] ?? 'LinkedIn Profile URL' }} | 
        {{ $profil0['portfolio'] ?? 'Portfolio/Website URL' }}
      </p>
      <p class="text-sm text-gray-600">
        {{ $profil0['address'] ?? 'Jakarta, Indonesia' }}
      </p>
    </div>
    @if(!empty($profil0['photo']) || session('foto'))
      <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin-top:1rem;">
        <img src="{{ session('foto') ?? ($profil[0]['photo'] ?? asset('images/CV Profil.jpg')) }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
      </div>
    @endif
  </header>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Profil</h2>
    <p class="text-gray-600">
      {{ $profil0['description'] ?? 'Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.' }}
    </p>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pengalaman Kerja</h2>
    @if(is_array($pengalamankerja) && count($pengalamankerja))
      @foreach ($pengalamankerja as $item)
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between items-center font-semibold">
            <p>
              <strong>{{ $item['companyName'] ?? 'Instrument Tech' }}</strong> - {{ $item['jobCity'] ?? 'Sleman' }}
            </p>
            <p class="text-gray-500">
              {{ $item['jobStartDate'] ?? 'Jan 2024' }} - 
              {{ ($item['isPresent'] ?? false) ? 'Sekarang' : ($item['jobEndDate'] ?? 'Jan 2025') }}
            </p>
          </div>
          <p class="italic">{{ $item['jobPosition'] ?? 'Marcelle Program' }}</p>
          <ul class="list-disc list-inside">
            @php
              $jobDesc = $item['jobDescription'] ?? [
                'Led development of an advanced automation system, achieving a 15% increase in operational efficiency.',
                'Streamlined manufacturing processes, reducing production costs by 10%.',
                'Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.'
              ];
              if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
              if (empty($jobDesc) || (count($jobDesc) === 1 && $jobDesc[0] === '')) $jobDesc = [
                'Led development of an advanced automation system, achieving a 15% increase in operational efficiency.',
                'Streamlined manufacturing processes, reducing production costs by 10%.',
                'Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.'
              ];
            @endphp
            @foreach ($jobDesc as $desc)
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    @else
      <div class="mb-5 text-sm text-gray-700">
        <div class="flex justify-between items-center font-semibold">
          <p><strong>Instrument Tech</strong> - Sleman</p>
          <p class="text-gray-500">Jan 2024 - Jan 2025</p>
        </div>
        <p class="italic">Marcelle Program</p>
        <ul class="list-disc list-inside">
          <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
          <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
          <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
        </ul>
      </div>
    @endif
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Proyek</h2>
    @if(is_array($proyek) && count($proyek))
      @foreach ($proyek as $item)
        <div class="mb-5 text-sm text-gray-700">
          <div class="flex justify-between items-center font-semibold">
            <p><strong>{{ $item['title'] ?? 'Industrial Basics and General Application' }}</strong></p>
            <p class="text-gray-500">
              {{ $item['startDate'] ?? 'Jan 2023' }} - {{ $item['endDate'] ?? 'Jun 2023' }}
            </p>
          </div>
          <p class="italic">{{ $item['institution'] ?? 'University of Engineering Process Cohort' }}</p>
          <ul class="list-disc list-inside">
            @php
              $descArr = $item['description'] ?? [
                'Automotive Technology.',
                'Technological Advancements within the current Chemical & Process Industry.',
                'Other relevant information.'
              ];
              if (!is_array($descArr)) $descArr = [$descArr];
              if (empty($descArr) || (count($descArr) === 1 && $descArr[0] === '')) $descArr = [
                'Automotive Technology.',
                'Technological Advancements within the current Chemical & Process Industry.',
                'Other relevant information.'
              ];
            @endphp
            @foreach ($descArr as $desc)
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    @else
      <div class="mb-5 text-sm text-gray-700">
        <div class="flex justify-between items-center font-semibold">
          <p><strong>Industrial Basics and General Application</strong></p>
          <p class="text-gray-500">Jan 2023 - Jun 2023</p>
        </div>
        <p class="italic">University of Engineering Process Cohort</p>
        <ul class="list-disc list-inside">
          <li>Automotive Technology.</li>
          <li>Technological Advancements within the current Chemical & Process Industry.</li>
          <li>Other relevant information.</li>
        </ul>
      </div>
    @endif
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Keahlian</h2>
    @if(is_array($keahlian) && count($keahlian))
      <div class="grid grid-cols-3 gap-2 text-sm text-gray-700">
        @foreach ($keahlian as $skill)
          <p>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</p>
        @endforeach
      </div>
    @else
      <div class="grid grid-cols-3 gap-2 text-sm text-gray-700">
        <p>Prototyping Tools</p>
        <p>User Research</p>
        <p>Interaction Design</p>
        <p>Visual Design</p>
        <p>Accessibility</p>
        <p>Responsive Design</p>
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