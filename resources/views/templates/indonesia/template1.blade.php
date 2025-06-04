<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV ATS Friendly</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      max-width: 800px;
      margin: auto;
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      color: #222;
      padding: 32px 24px;
    }
    h1 { font-size: 2rem; font-weight: bold; color: #1e3a8a; margin-bottom: 0.5rem; }
    h2 { font-size: 1.1rem; font-weight: bold; color: #1e3a8a; margin-top: 2rem; margin-bottom: 0.5rem; letter-spacing: 1px; }
    .section-title {
      border-bottom: 2px solid #1e3a8a;
      padding-bottom: 2px;
      margin-bottom: 0.75rem;
      text-transform: uppercase;
      font-size:18px;
      font-weight: bold;
      color: #1e3a8a;
    }
    .info-label { font-weight: bold; }
    ul, ul.list-disc {
      list-style-type: disc;
      list-style-position: outside !important;
      margin-left: 1.2em;
    }
    li {
      margin-bottom: 0.25rem;
      padding-left: 0;
      text-indent: 0;
    }
    .job-header, .edu-header { display: flex; justify-content: space-between; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-1 { margin-bottom: 0.25rem; }
    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .italic { font-style: italic; }
  </style>
</head>
<body>
{{-- @dump($foto) --}}
@php
    use Illuminate\Support\Str;

    $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
    $foto = !empty(session('foto')) ? session('foto') : ($profil0['photo'] ?? '');
    $foto = trim($foto);

    // Foto dianggap valid jika:
    // - Tidak kosong
    // - Bukan 'null', '#', atau hanya spasi
    // - (Mengandung ekstensi gambar ATAU diawali 'data:image/')
    $showPhoto = $foto !== ''
        && strtolower($foto) !== 'null'
        && $foto !== '#'
        && (
            preg_match('/\.(jpg|jpeg|png|gif)$/i', $foto)
            || Str::startsWith($foto, 'data:image/')
        );
@endphp
<!-- Header -->
<div style="display: flex; align-items: center; gap: 24px; margin-bottom: 1.5rem;">
  @if($showPhoto)
    <div style="width: 100px; height: 100px; overflow: hidden;">
      <img 
        src="{{ $foto }}" 
        alt="Foto Profil" 
        style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
  @endif
  <div style="flex:1; text-align:left;">
    @if(!empty($profil0['name']))
      <h1 style="text-transform:uppercase; font-weight:bold; font-size:25px; letter-spacing:1px; margin-bottom:0.25rem;">
        {{ $profil0['name'] }}
      </h1>
    @endif
    <div style="margin-bottom:0; font-size:13px; line-height:1.3;">
      @if(!empty($profil0['address']))
        <span class="info-label">Address:</span> {{ $profil0['address'] }}<br>
      @endif
      @if(!empty($profil0['phone']))
        <span class="info-label">Phone:</span> {{ $profil0['phone'] }}<br>
      @endif
      @if(!empty($profil0['email']))
        <span class="info-label">Email:</span> {{ $profil0['email'] }}<br>
      @endif
      @if(!empty($profil0['linkedin']))
        <span class="info-label">LinkedIn:</span> {{ $profil0['linkedin'] }}<br>
      @endif
      @if(!empty($profil0['portfolio']))
        <span class="info-label">Website:</span> {{ $profil0['portfolio'] }}
      @endif
    </div>
  </div>
</div>

{{-- Summary/Profil --}}
@if(!empty($profil0['description']))
  <div class="section-title">Profil</div>
  <div class="mb-4">
    {{ $profil0['description'] }}
  </div>
@endif

{{-- Pengalaman Kerja --}}
@if(is_array($pengalamankerja) && count($pengalamankerja))
  <div class="section-title">Pengalaman Kerja</div>
  @foreach ($pengalamankerja as $item)
    <div class="mb-3">
      <div class="job-header">
        <span><b>{{ $item['jobPosition'] ?? '' }}</b>{{ isset($item['companyName']) && $item['companyName'] ? ' - '.$item['companyName'] : '' }}</span>
          <span class="text-black" id="job-date-{{ $loop->index }}"></span>
          <script>
            function formatDate(dateStr) {
              if (!dateStr) return '';
              const date = new Date(dateStr);
              if (isNaN(date)) return '';
              return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
            }
            const jobStart = @json($item['jobStartDate'] ?? '');
            const jobEnd = @json($item['jobEndDate'] ?? '');
            const jobPresent = @json($item['jobIsPresent'] ?? false);
            if (jobStart || jobPresent) {
              document.getElementById('job-date-{{ $loop->index }}').innerHTML =
                `${formatDate(jobStart)} - ${jobPresent ? 'Sekarang' : formatDate(jobEnd)}`;
            }
          </script>
      </div>
      @if(!empty($item['jobCity']))
        <div class="italic mb-1">{{ $item['jobCity'] }}</div>
      @endif
      @if(!empty($item['jobDescription']))
        <ul class="list-disc list-inside">
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

{{-- Proyek --}}
@if(is_array($proyek) && count($proyek))
  <div class="section-title">Proyek</div>
  @foreach ($proyek as $item)
    <div class="mb-3">
      <div class="job-header">
        <span><b>{{ $item['projectName'] ?? '' }}</b></span>
          <span id="project-date-{{ $loop->index }}"></span>
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
      @if(!empty($item['projectPosition']))
        <div class="italic mb-1">{{ $item['projectPosition'] }}</div>
      @endif
      @if(!empty($item['projectDescription']))
        <ul class="list-disc list-inside">
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

{{-- Pendidikan --}}
@if(is_array($pendidikan) && count($pendidikan))
  <div class="section-title">Pendidikan</div>
  @foreach ($pendidikan as $edu)
    <div class="mb-3">
      <div class="edu-header">
        <span><b>{{ $edu['educationDegree'] ?? '' }}</b></span>
          <span id="edu-date-{{ $loop->index }}"></span>
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
      @if(!empty($edu['educationInstitution']))
        <div class="italic mb-1">{{ $edu['educationInstitution'] }}</div>
      @endif
      @if(!empty($edu['educationDescription']))
        <ul class="list-disc list-inside">
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

{{-- Keahlian --}}
@if(is_array($keahlian) && count($keahlian))
  <div class="section-title">Keahlian</div>
  <div class="mb-2 grid grid-cols-3 text-sm">
    @foreach ($keahlian as $skill)
      @if(!empty($skill))
        <p>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</p>
      @endif
    @endforeach
  </div>
@endif

{{-- Informasi Tambahan --}}
@if(
  (is_array($bahasa) && count($bahasa)) ||
  (is_array($sertifikat) && count($sertifikat)) ||
  (is_array($hobi) && count($hobi))
)
  <div class="section-title">ADDITIONAL INFORMATION</div>
  <ul class="mb-2">
    @if(is_array($bahasa) && count($bahasa))
      <li><b>Bahasa:</b> {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}</li>
    @endif
    @if(is_array($sertifikat) && count($sertifikat))
      <li><b>Sertifikat:</b> {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}</li>
    @endif
    @if(is_array($hobi) && count($hobi))
      <li><b>Hobi:</b> {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}</li>
    @endif
  </ul>
@endif
</body>
</html>
