@php
  use Illuminate\Support\Str;
  $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
  $foto = !empty(session('foto')) ? session('foto') : ($profil0['photo'] ?? '');
  $foto = trim($foto);
  $showPhoto = $foto !== ''
    && strtolower($foto) !== 'null'
    && $foto !== '#'
    && (
      preg_match('/\.(jpg|jpeg|png|gif)$/i', $foto)
      || Str::startsWith($foto, 'data:image/')
    );
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
    body, h1, h2, h3, h4, h5, h6, .section-title, .bold, .italic, div, span, p, li, ul, ol, table, th, td {
      font-family: Arial, Helvetica, sans-serif !important;
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
      grid-template-columns: 1fr 1fr 1fr;
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
    .justify {
      text-align: justify;
    }
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
      @if(!empty($profil0['website']))
        <div>
          {{ $profil0['website'] }}
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
  <div class="mb-4 justify">
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
          <span>
            <span class="bold">{{ $item['company_name'] ?? '' }}</span>
            @if(!empty($item['location']))
              <span>{{ ' - ' . $item['location'] }}</span>
            @endif
          </span>
          <span class="italic" id="job-date-{{ $loop->index }}"></span>
          <script>
          (function() {
            function formatDate(dateStr) {
              if (!dateStr) return '';
              const date = new Date(dateStr);
              if (isNaN(date)) return '';
              return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
            }
            const start = @json($item['start_date'] ?? '' );
            const end = @json($item['end_date'] ?? '' );
            const present = @json(empty($item['end_date']));
            let text = '';
            if (start || present) {
              text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
            }
            document.getElementById('job-date-{{ $loop->index }}').innerText = text;
          })();
          </script>
        </div>
        <div>{{ $item['role'] ?? '' }}</div>
        @php
          $jobDesc = $item['description'] ?? [];
          if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
          $descList = [];
          foreach ($jobDesc as $desc) {
            foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
              if (trim($line) !== '') $descList[] = $line;
            }
          }
        @endphp
        @if(count($descList))
          <ul>
            @foreach ($descList as $line)
              <li>{{ $line }}</li>
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
        <span class="bold">{{ $item['project_name'] ?? '' }}</span>
        <span class="italic" id="project-date-{{ $loop->index }}"></span>
        <script>
        (function() {
          function formatDate(dateStr) {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date)) return '';
            return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
          }
          const start = @json($item['start_date'] ?? '');
          const end = @json($item['end_date'] ?? '');
          const present = @json(empty($item['end_date']));
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('project-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
      <div class="italic">{{ $item['role'] ?? '' }}</div>
      @php
        $descArr = $item['description'] ?? [];
        if (!is_array($descArr)) $descArr = [$descArr];
        $descList = [];
        foreach ($descArr as $desc) {
          foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
            if (trim($line) !== '') $descList[] = $line;
          }
        }
      @endphp
      @if(count($descList))
        <ul>
          @foreach ($descList as $line)
            <li>{{ $line }}</li>
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
        <span>{{ $skill['skill_name'] ?? (is_array($skill) ? implode(', ', $skill) : $skill) }}</span>
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
        <span class="bold">{{ $edu['institution'] ?? '' }}</span>
        <span class="italic" id="edu-date-{{ $loop->index }}"></span>
        <script>
        (function() {
          function formatDate(dateStr) {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date)) return '';
            return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
          }
          const start = @json($edu['start_date'] ?? '');
          const end = @json($edu['end_date'] ?? '');
          const present = @json(empty($edu['end_date']));
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('edu-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
      <div class="italic">{{ $edu['degree'] ?? '' }}</div>
      @php
        $descArr = $edu['description'] ?? [];
        if (!is_array($descArr)) $descArr = [$descArr];
        $descList = [];
        foreach ($descArr as $desc) {
          foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
            if (trim($line) !== '') $descList[] = $line;
          }
        }
      @endphp
      @if(count($descList))
        <ul>
          @foreach ($descList as $line)
            <li>{{ $line }}</li>
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
      <p><strong>Bahasa:</strong> {{ implode(', ', array_map(fn($b) => $b['language_name'] ?? (is_array($b) ? implode(' ', $b) : $b), $bahasa)) }}</p>
    @endif
    @if(is_array($sertifikat) && count($sertifikat))
      <p><strong>Sertifikat:</strong> {{ implode(', ', array_map(fn($s) => $s['certificate_name'] ?? (is_array($s) ? implode(' ', $s) : $s), $sertifikat)) }}</p>
    @endif
    @if(is_array($hobi) && count($hobi))
      <p><strong>Hobi:</strong> {{ implode(', ', array_map(fn($h) => $h['hobby'] ?? (is_array($h) ? implode(' ', $h) : $h), $hobi)) }}</p>
    @endif
  </div>
@endif
</body>
</html>