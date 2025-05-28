@php
  $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV Template 2 - ATS Friendly</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      max-width: 800px;
      margin: auto;
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      color: #222;
      padding: 32px 24px;
      font-size: 15px; /* Ukuran font dasar */
    }
    .section-title {
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1.1rem;
      border-bottom: 1px solid #888;
      margin-bottom: 0.5rem; /* lebih kecil agar lebih rapat */
      padding-bottom: 2px;
      letter-spacing: 1px;
    }
    .bold { font-weight: bold; }
    .italic { font-style: italic; }
    ul {
      list-style-type: disc !important;
      list-style-position: outside !important;
      margin-left: 1.2em !important;
    }
    li {
      margin-bottom: 0.25rem;
    }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
  </style>
</head>
<body>
  <!-- Header -->
  <div style="text-align:center; margin-bottom:0.5rem;">
    <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin: 0 auto 0.5rem auto;">
      <img src="{{ session('foto') ?? ($profil0['photo'] ?? asset('images/CV Profil.jpg')) }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
    <div style="display:flex; flex-direction:column; align-items:center;">
      <h1 style="font-size:2rem; font-weight:bold; text-transform:uppercase; margin-bottom:0.2rem;">
        {{ $profil0['name'] ?? 'Nama Lengkap' }}
      </h1>
      <hr style="border:1px solid #888; margin:0.5rem 0 0.7rem 0; width:100%;">
      <div class="text-sm" style="margin-bottom:0.2rem;">
        {{ $profil0['address'] ?? 'Jakarta, Indonesia' }} | {{ $profil0['email'] ?? 'nama@email.com' }} | {{ $profil0['phone'] ?? '0812-3456-7890' }} | {{ $profil0['linkedin'] ?? 'LinkedIn Profile URL' }} | {{ $profil0['portfolio'] ?? 'Portfolio/Website URL' }}
      </div>
      <hr style="border:1px solid #888; margin:0.3rem 0 0.5rem 0; width:100%;">
    </div>
  </div>

  <!-- Profil -->
  <div class="mb-4">
    {{ $profil0['description'] ?? 'Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.' }}
  </div>

  <!-- Keahlian -->
  <div class="section-title mb-2">Keahlian</div>
  <div class="mb-4" style="display:grid; grid-template-columns:repeat(3,1fr); gap:0.5rem;">
    @if(is_array($keahlian) && count($keahlian))
      @foreach($keahlian as $skill)
        <span>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</span>
      @endforeach
    @else
      <span>Prototyping Tools</span>
      <span>User Research</span>
      <span>Interaction Design</span>
      <span>Visual Design</span>
      <span>Accessibility</span>
      <span>Responsive Design</span>
    @endif
  </div>

  <!-- Pengalaman Kerja -->
  <div class="section-title mb-2">Pengalaman Kerja</div>
  @if(is_array($pengalamankerja) && count($pengalamankerja))
    @foreach ($pengalamankerja as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $item['companyName'] ?? 'Instrument Tech' }} - {{ $item['jobCity'] ?? 'Sleman' }}</span>
          <span class="text-xs">{{ $item['jobStartDate'] ?? 'Jan 2024' }} - {{ ($item['jobIsPresent'] ?? false) ? 'Sekarang' : ($item['jobEndDate'] ?? 'Jan 2025') }}</span>
        </div>
        <div class="mb-1">{{ $item['jobPosition'] ?? 'Marcelle Program' }}</div>
        <ul>
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
    <div class="mb-3">
      <div style="display:flex; justify-content:space-between;">
        <span class="bold">Instrument Tech - Sleman</span>
        <span class="text-xs">Jan 2024 - Jan 2025</span>
      </div>
      <div class="mb-1">Marcelle Program</div>
      <ul>
        <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  @endif

  <!-- Proyek -->
  <div class="section-title">Proyek</div>
  @if(is_array($proyek) && count($proyek))
    @foreach ($proyek as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $item['projectName'] ?? 'Industrial Basics and General Application' }}</span>
          <span class="text-xs">{{ $item['projectStartDate'] ?? 'Jan 2023' }} - {{ ($item['isPresent'] ?? false) ? 'Sekarang' : ($item['projectEndDate'] ?? 'Jun 2023') }}</span>
        </div>
        <div class="italic mb-1">{{ $item['projectPosition'] ?? 'University of Engineering Process Cohort' }}</div>
        <ul>
          @php
            $descArr = $item['projectDescription'] ?? [
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
    <div class="mb-3">
      <div style="display:flex; justify-content:space-between;">
        <span class="bold">Industrial Basics and General Application</span>
        <span class="text-xs">Jan 2023 - Jun 2023</span>
      </div>
      <div class="italic mb-1">University of Engineering Process Cohort</div>
      <ul>
        <li>Automotive Technology.</li>
        <li>Technological Advancements within the current Chemical & Process Industry.</li>
        <li>Other relevant information.</li>
      </ul>
    </div>
  @endif

  <!-- Pendidikan -->
  <div class="section-title">Pendidikan</div>
  @if(is_array($pendidikan) && count($pendidikan))
    @foreach ($pendidikan as $edu)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $edu['educationInstitution'] ?? 'Engineering University' }}</span>
          <span class="text-xs">{{ $edu['educationStartDate'] ?? 'Jan 2024' }} - {{ ($edu['isPresent'] ?? false) ? 'Sekarang' : ($edu['educationEndDate'] ?? 'Jan 2025') }}</span>
        </div>
        <div class="italic mb-1">{{ $edu['educationDegree'] ?? 'Bachelor of Design in Process Engineering' }}</div>
        <ul>
          @php
            $descArr = $edu['educationDescription'] ?? [
              'Relevant coursework in Process Design and Project Management.',
              'Streamlined manufacturing processes, reducing production costs by 10%.',
              'Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.'
            ];
            if (!is_array($descArr)) $descArr = [$descArr];
            if (empty($descArr) || (count($descArr) === 1 && $descArr[0] === '')) $descArr = [
              'Relevant coursework in Process Design and Project Management.',
              'Streamlined manufacturing processes, reducing production costs by 10%.',
              'Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.'
            ];
          @endphp
          @foreach ($descArr as $desc)
            <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  @else
    <div class="mb-3">
      <div style="display:flex; justify-content:space-between;">
        <span class="bold">Engineering University</span>
        <span class="text-xs">Jan 2024 - Jan 2025</span>
      </div>
      <div class="italic mb-1">Bachelor of Design in Process Engineering</div>
      <ul>
        <li>Relevant coursework in Process Design and Project Management.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  @endif

  <!-- Informasi Tambahan -->
  <div class="section-title">Informasi Tambahan</div>
  <div>
    <div><span class="bold">Bahasa:</span> 
      @if(is_array($bahasa) && count($bahasa))
        {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}
      @else
        English, French, Mandarin
      @endif
    </div>
    <div><span class="bold">Sertifikat:</span> 
      @if(is_array($sertifikat) && count($sertifikat))
        {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}
      @else
        Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)
      @endif
    </div>
    <div><span class="bold">Hobi:</span> 
      @if(is_array($hobi) && count($hobi))
        {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}
      @else
        Tenis Lapangan
      @endif
    </div>
  </div>
</body>
</html>