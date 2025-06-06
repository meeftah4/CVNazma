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
      @if(!empty($profil0['name']))
        <h1 style="font-size:2.2rem; font-weight:bold; letter-spacing:2px;" class="main-pink mb-1">
          {{ $profil0['name'] }}
        </h1>
      @endif
      @if(!empty($profil0['email']) || !empty($profil0['address']))
        <div style="font-size:1rem; letter-spacing:2px; margin-bottom:1.2rem;">
          {{ $profil0['email'] ?? '' }}
          @if(!empty($profil0['email']) && !empty($profil0['address'])) | @endif
          {{ $profil0['address'] ?? '' }}
        </div>
      @endif
      @php
        $foto = !empty(session('foto')) ? session('foto') : ($profil0['photo'] ?? '');
        $foto = trim($foto);
        $showPhoto = $foto !== ''
          && strtolower($foto) !== 'null'
          && $foto !== '#'
          && (
            preg_match('/\.(jpg|jpeg|png|gif)$/i', $foto)
            || \Illuminate\Support\Str::startsWith($foto, 'data:image/'))
        ;
      @endphp
      @if($showPhoto)
        <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin-top:1rem;">
          <img src="{{ $foto }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
        </div>
      @endif
    </div>
    <div style="text-align:right; min-width:260px; margin-top:5.8rem;">
      @if(!empty($profil0['phone']))
        <div style="padding-bottom:0.3rem; margin-bottom:0.3rem; border-bottom:1px solid #df2176;">
          {{ $profil0['phone'] }}
        </div>
      @endif
      @if(!empty($profil0['linkedin']))
        <div style="padding-bottom:0.3rem; margin-bottom:0.3rem; border-bottom:1px solid #df2176;">
          {{ $profil0['linkedin'] }}
        </div>
      @endif
      @if(!empty($profil0['portfolio']))
        <div>
          {{ $profil0['portfolio'] }}
        </div>
      @endif
    </div>
  </div>
  
<!-- Profil -->
  @if(!empty($profil0['description']))
    <div class="section-title">
      Profil
      <span class="section-title-line"></span>
    </div>
    <div class="mb-4">
      {{ $profil0['description'] }}
    </div>
  @endif

  <!-- Pengalaman Kerja -->
  @if(is_array($pengalamankerja) && count($pengalamankerja))
    <div class="section-title mt-2">
      Pengalaman Kerja
      <span class="section-title-line"></span>
    </div>
    @foreach ($pengalamankerja as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span class="bold">{{ $item['companyName'] ?? '' }}{{ !empty($item['jobCity']) ? ' - '.$item['jobCity'] : '' }}</span>
          <span class="italic" style="font-size:0.98rem;" id="job-date-{{ $loop->index }}"></span>
          <script>
          (function() {
            function formatDate(dateStr) {
              if (!dateStr) return '';
              const date = new Date(dateStr);
              if (isNaN(date)) return '';
              return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
            }
            const start = @json($item['jobStartDate'] ?? '' );
            const end = @json($item['jobEndDate'] ?? '' );
            const present = @json($item['jobIsPresent'] ?? false);
            let text = '';
            if (start || present) {
              text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
            }
            document.getElementById('job-date-{{ $loop->index }}').innerText = text;
          })();
          </script>
        </div>
        <div>{{ $item['jobPosition'] ?? '' }}</div>
        @if(!empty($item['jobDescription']))
          <ul>
            @php
              $jobDesc = $item['jobDescription'];
              if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
            @endphp
            @foreach ($jobDesc as $desc)
              @if(!empty($desc))
                <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
              @endif
            @endforeach
          </ul>
        @endif
      </div>
    @endforeach
  @endif

  <!-- Proyek -->
  @if(is_array($proyek) && count($proyek))
  <div class="section-title mt-2">
    Proyek
    <span class="section-title-line"></span>
  </div>
  @foreach ($proyek as $item)
    <div class="mb-3">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <span class="bold">{{ $item['projectName'] ?? '' }}</span>
        <span class="italic" style="font-size:0.98rem;" id="project-date-{{ $loop->index }}"></span>
        <script>
        (function() {
          function formatDate(dateStr) {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date)) return '';
            return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
          }
          const start = @json($item['projectStartDate'] ?? '');
          const end = @json($item['projectEndDate'] ?? '');
          const present = @json($item['isPresent'] ?? false);
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('project-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
      <div class="italic">{{ $item['projectPosition'] ?? '' }}</div>
      @if(!empty($item['projectDescription']))
        <ul>
          @php
            $descArr = $item['projectDescription'];
            if (!is_array($descArr)) $descArr = [$descArr];
          @endphp
          @foreach ($descArr as $desc)
            @if(!empty($desc))
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
            @endif
          @endforeach
        </ul>
      @endif
    </div>
  @endforeach
@endif

  <!-- Keahlian -->
  @if(is_array($keahlian) && count($keahlian))
    <div class="section-title mt-2">
      Keahlian
      <span class="section-title-line"></span>
    </div>
    <ul class="two-col-list">
      @foreach ($keahlian as $skill)
        <span>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</span>
      @endforeach
    </ul>
  @endif

  <!-- Pendidikan -->
@if(is_array($pendidikan) && count($pendidikan))
  <div class="section-title mt-2">
    Pendidikan
    <span class="section-title-line"></span>
  </div>
  @foreach ($pendidikan as $edu)
    <div class="mb-3">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <span class="bold">{{ $edu['educationInstitution'] ?? '' }}</span>
        <span class="italic" style="font-size:0.98rem;" id="edu-date-{{ $loop->index }}"></span>
        <script>
        (function() {
          function formatDate(dateStr) {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date)) return '';
            return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
          }
          const start = @json($edu['educationStartDate'] ?? '');
          const end = @json($edu['educationEndDate'] ?? '');
          const present = @json($edu['isPresent'] ?? false);
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('edu-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
      <div class="italic">{{ $edu['educationDegree'] ?? '' }}</div>
      @if(!empty($edu['educationDescription']))
        <ul>
          @php
            $descArr = $edu['educationDescription'];
            if (!is_array($descArr)) $descArr = [$descArr];
          @endphp
          @foreach ($descArr as $desc)
            @if(!empty($desc))
              <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
            @endif
          @endforeach
        </ul>
      @endif
    </div>
  @endforeach
@endif

@if(
  (is_array($bahasa) && count($bahasa)) ||
  (is_array($sertifikat) && count($sertifikat)) ||
  (is_array($hobi) && count($hobi))
)
  <div class="section-title mt-2">
    Informasi Tambahan
    <span class="section-title-line"></span>
  </div>
  <div class="mb-4">
    @if(is_array($bahasa) && count($bahasa))
      <p><strong>Bahasa:</strong> {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}</p>
    @endif
    @if(is_array($sertifikat) && count($sertifikat))
      <p><strong>Sertifikat:</strong> {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}</p>
    @endif
    @if(is_array($hobi) && count($hobi))
      <p><strong>Hobi:</strong> {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}</p>
    @endif
  </div>
@endif