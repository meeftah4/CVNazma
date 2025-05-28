@php
  $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV Template 5 - ATS Friendly</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      color: #222;
      padding: 40px 32px 32px 32px;
      font-size: 15px;
    }
    .main-pink { color: #df2176; }
    .border-pink { border-color: #df2176 !important; }
    .section-title {
      color: #df2176;
      font-weight: bold;
      font-size: 1.15rem;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 0.2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .section-title-line {
      flex: 1;
      border-bottom: 2px solid #df2176;
      margin-left: 1rem;
      height: 0;
    }
    .bold { font-weight: bold; }
    .italic { font-style: italic; }
    ul {
      list-style-type: disc !important;
      list-style-position: outside !important;
      margin-left: 1.2em !important;
      padding-left: 0 !important;
    }
    li {
      display: list-item !important;
      color: #111;
      margin-bottom: 0.25rem;
    }
    .two-col-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0.2rem 2rem;
      margin-left: 0;
      list-style-position: inside;
    }
    .gpa {
      font-size: 1rem;
      color: #222;
      font-style: italic;
      float: right;
    }
    .mb-1 { margin-bottom: 0.25rem; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .grid-skill { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem 1.5rem; }
  </style>
</head>
<body>
  <!-- Header -->
  <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:2.2rem;">
    <div>
      <h1 style="font-size:2.2rem; font-weight:bold; letter-spacing:2px;" class="main-pink mb-1">
        {{ $profil0['name'] ?? 'Nama Lengkap' }}
      </h1>
      <div style="font-size:1rem; letter-spacing:2px; margin-bottom:1.2rem;">
        {{ $profil0['email'] ?? 'nama@email.com' }} | {{ $profil0['address'] ?? 'Jakarta, Indonesia' }}
      </div>
      <!-- Foto -->
      <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin-top:1rem;">
        <img src="{{ session('foto') ?? ($profil0['photo'] ?? asset('images/CV Profil.jpg')) }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
      </div>
    </div>
    <div style="text-align:right; min-width:260px; margin-top:5.8rem;">
      <div style="padding-bottom:0.3rem; margin-bottom:0.3rem; border-bottom:1px solid #df2176;">
        {{ $profil0['phone'] ?? '0812-3456-7890' }}
      </div>
      <div style="padding-bottom:0.3rem; margin-bottom:0.3rem; border-bottom:1px solid #df2176;">
        {{ $profil0['linkedin'] ?? 'LinkedIn Profile URL' }}
      </div>
      <div>
        {{ $profil0['portfolio'] ?? 'Portfolio/Website URL' }}
      </div>
    </div>
  </div>
  
  <!-- Profil -->
  <div class="section-title">
    Profil
    <span class="section-title-line"></span>
  </div>
  <div class="mb-4">
    {{ $profil0['description'] ?? 'Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.' }}
  </div>

  <!-- Pengalaman Kerja -->
  <div class="section-title mt-2">
    Pengalaman Kerja
    <span class="section-title-line"></span>
  </div>
  @if(is_array($pengalamankerja) && count($pengalamankerja))
    @foreach ($pengalamankerja as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span class="bold">{{ $item['companyName'] ?? 'Instrument Tech' }} - {{ $item['jobCity'] ?? 'Sleman' }}</span>
          <span class="italic" style="font-size:0.98rem;">{{ $item['jobStartDate'] ?? 'Jan 2024' }} - {{ ($item['jobIsPresent'] ?? false) ? 'Sekarang' : ($item['jobEndDate'] ?? 'Jan 2025') }}</span>
        </div>
        <div>{{ $item['jobPosition'] ?? 'Marcelle Program' }}</div>
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
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <span class="bold">Instrument Tech - Sleman</span>
        <span class="italic" style="font-size:0.98rem;">Jan 2024 - Jan 2025</span>
      </div>
      <div>Marcelle Program</div>
      <ul>
        <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  @endif

  <!-- Proyek -->
  <div class="section-title mt-2">
    Proyek
    <span class="section-title-line"></span>
  </div>
  @if(is_array($proyek) && count($proyek))
    @foreach ($proyek as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span class="bold">{{ $item['projectName'] ?? 'Industrial Basics and General Application' }}</span>
          <span class="italic" style="font-size:0.98rem;">{{ $item['projectStartDate'] ?? 'Jan 2023' }} - {{ ($item['isPresent'] ?? false) ? 'Sekarang' : ($item['projectEndDate'] ?? 'Jun 2023') }}</span>
        </div>
        <div class="italic">{{ $item['projectPosition'] ?? 'University of Engineering Process Cohort' }}</div>
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
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <span class="bold">Industrial Basics and General Application</span>
        <span class="italic" style="font-size:0.98rem;">Jan 2023 - Jun 2023</span>
      </div>
      <div class="italic">University of Engineering Process Cohort</div>
      <ul>
        <li>Automotive Technology.</li>
        <li>Technological Advancements within the current Chemical & Process Industry.</li>
        <li>Other relevant information.</li>
      </ul>
    </div>
  @endif

  <!-- Keahlian -->
  <div class="section-title mt-2">
    Keahlian
    <span class="section-title-line"></span>
  </div>
  @if(is_array($keahlian) && count($keahlian))
    <ul class="two-col-list">
      @foreach ($keahlian as $skill)
        <span>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</span>
      @endforeach
    </ul>
  @else
      <span>Prototyping Tools</span>
      <span>User Research</span>
      <span>Interaction Design</span>
      <span>Visual Design</span>
      <span>Accessibility</span>
      <span>Responsive Design</span>
  @endif

  <!-- Pendidikan -->
  <div class="section-title mt-2">
    Pendidikan
    <span class="section-title-line"></span>
  </div>
  @if(is_array($pendidikan) && count($pendidikan))
    @foreach ($pendidikan as $edu)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span class="bold">{{ $edu['educationInstitution'] ?? 'Engineering University' }}</span>
          <span class="italic" style="font-size:0.98rem;">{{ $edu['educationStartDate'] ?? 'Jan 2024' }} - {{ ($edu['isPresent'] ?? false) ? 'Sekarang' : ($edu['educationEndDate'] ?? 'Jan 2025') }}</span>
        </div>
        <div class="italic">{{ $edu['educationDegree'] ?? 'Bachelor of Design in Process Engineering' }}</div>
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
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <span class="bold">Engineering University</span>
        <span class="italic" style="font-size:0.98rem;">Jan 2024 - Jan 2025</span>
      </div>
      <div class="italic">Bachelor of Design in Process Engineering</div>
      <ul>
        <li>Relevant coursework in Process Design and Project Management.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  @endif

  <!-- Informasi Tambahan -->
  <div class="section-title mt-2">
    Informasi Tambahan
    <span class="section-title-line"></span>
  </div>
  <div class="mb-4">
    <p><strong>Bahasa:</strong>
      @if(is_array($bahasa) && count($bahasa))
        {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}
      @else
        English, French, Mandarin
      @endif
    </p>
    <p><strong>Sertifikat:</strong>
      @if(is_array($sertifikat) && count($sertifikat))
        {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}
      @else
        Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)
      @endif
    </p>
    <p><strong>Hobi:</strong>
      @if(is_array($hobi) && count($hobi))
        {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}
      @else
        Tenis Lapangan
      @endif
    </p>
  </div>
</body>
</html>