      @php
        use Illuminate\Support\Str;
        $fromDatabase = request()->has('cvsy_id');
        $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];

        // Ambil foto dari key 'photo' atau fallback ke 'cv_picture'
        if ($fromDatabase) {
            $foto = $profil0['photo'] ?? $profil0['cv_picture'] ?? '';
        } else {
            $foto = !empty(session('foto')) ? session('foto') : ($profil0['photo'] ?? $profil0['cv_picture'] ?? '');
        }

        $foto = trim($foto);

        if ($foto && !Str::startsWith($foto, ['http', 'data:image/'])) {
            $foto = asset($foto);
        }

        $showPhoto = $foto !== ''
            && strtolower($foto) !== 'null'
            && $foto !== '#'
            && (
                preg_match('/\.(jpg|jpeg|png|gif)$/i', $foto)
                || Str::startsWith($foto, 'data:image/')
                || Str::startsWith($foto, 'http')
            );
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
    body, h1, h2, h3, h4, h5, h6, .section-title, .bold, .italic, div, span, p, li, ul, ol, table, th, td {
      font-family: Arial, Helvetica, sans-serif !important;
    }
    .justify {
      text-align: justify;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div style="text-align:center; margin-bottom:0.5rem;">
    @if($showPhoto)
      <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin: 0 auto 0.5rem auto;">
        <img src="{{ $foto }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
      </div>
    @endif
    <div style="display:flex; flex-direction:column; align-items:center;">
      @if(!empty($profil0['name']))
        <h1 style="font-size:2rem; font-weight:bold; text-transform:uppercase; margin-bottom:0.2rem;">
          {{ $profil0['name'] }}
        </h1>
      @endif
      @if(!empty($profil0['address']) || !empty($profil0['email']) || !empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['portfolio']))
        <hr style="border:1px solid #888; margin:0.5rem 0 0.7rem 0; width:100%;">
        <div class="text-sm" style="margin-bottom:0.2rem;">
          {{ $profil0['address'] ?? '' }}
          @if(!empty($profil0['address']) && (!empty($profil0['email']) || !empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['portfolio'])) ) | @endif
          {{ $profil0['email'] ?? '' }}
          @if(!empty($profil0['email']) && (!empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['portfolio']))) | @endif
          {{ $profil0['phone'] ?? '' }}
          @if(!empty($profil0['phone']) && (!empty($profil0['linkedin']) || !empty($profil0['portfolio']))) | @endif
          {{ $profil0['linkedin'] ?? '' }}
          @if(!empty($profil0['linkedin']) && !empty($profil0['portfolio'])) | @endif
          {{ $profil0['portfolio'] ?? '' }}
        </div>
        <hr style="border:1px solid #888; margin:0.3rem 0 0.5rem 0; width:100%;">
      @endif
    </div>
  </div>

  <!-- Profil -->
  @if(!empty($profil0['description']))
    <div class="mb-4 justify">
      {{ $profil0['description'] }}
    </div>
  @endif

  {{-- KEAHLIAN --}}
  @if(is_array($keahlian) && count($keahlian))
    <div class="section-title mb-2">Keahlian</div>
    <div class="mb-4" style="display:grid; grid-template-columns:repeat(3,1fr); gap:0.5rem;">
      @foreach($keahlian as $skill)
        <span>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</span>
      @endforeach
    </div>
  @endif

  {{-- PENGALAMAN KERJA --}}
  @if(is_array($pengalamankerja) && count($pengalamankerja))
    <div class="section-title mb-2">Pengalaman Kerja</div>
    @foreach ($pengalamankerja as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span>
            <span class="bold">{{ $item['companyName'] ?? '' }}</span>
            @if(!empty($item['jobCity']))
              - <span>{{ $item['jobCity'] }}</span>
            @endif
          </span>
          <span id="job-date-{{ $loop->index }}"></span>
        </div>
        @if(!empty($item['jobPosition']))
          <div class="italic mb-1">{{ $item['jobPosition'] }}</div>
        @endif
        @php
          $jobDesc = $item['jobDescription'] ?? [];
          if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
          $descList = [];
          foreach ($jobDesc as $desc) {
            if (is_array($desc)) {
              foreach ($desc as $d) {
                foreach (preg_split('/\r\n|\r|\n/', $d) as $line) {
                  if (trim($line) !== '') $descList[] = $line;
                }
              }
            } else {
              foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
                if (trim($line) !== '') $descList[] = $line;
              }
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
        <div style="display:flex; justify-content:space-between;">
          <span></span>
          <span id="job-date-{{ $loop->index }}"></span>
        </div>
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
          const present = @json($item['jobIsPresent'] ?? false );
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('job-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
    @endforeach
  @endif

  {{-- PROYEK --}}
  @if(is_array($proyek) && count($proyek))
    <div class="section-title">Proyek</div>
    @foreach ($proyek as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $item['projectName'] ?? '' }}</span>
          <span id="project-date-{{ $loop->index }}"></span>
        </div>
        <div class="italic mb-1">{{ $item['projectPosition'] ?? '' }}</div>
        @php
          $descArr = $item['projectDescription'] ?? [];
          if (!is_array($descArr)) $descArr = [$descArr];
          $descList = [];
          foreach ($descArr as $desc) {
            if (is_array($desc)) {
              foreach ($desc as $d) {
                foreach (preg_split('/\r\n|\r|\n/', $d) as $line) {
                  if (trim($line) !== '') $descList[] = $line;
                }
              }
            } else {
              foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
                if (trim($line) !== '') $descList[] = $line;
              }
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
    @endforeach
  @endif

  {{-- PENDIDIKAN --}}
  @if(is_array($pendidikan) && count($pendidikan))
    <div class="section-title">Pendidikan</div>
    @foreach ($pendidikan as $edu)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $edu['educationInstitution'] ?? '' }}</span>
          <span id="edu-date-{{ $loop->index }}"></span>
        </div>
        <div class="italic mb-1">{{ $edu['educationDegree'] ?? '' }}</div>
        @php
          $descArr = $edu['educationDescription'] ?? [];
          if (!is_array($descArr)) $descArr = [$descArr];
          $descList = [];
          foreach ($descArr as $desc) {
            if (is_array($desc)) {
              foreach ($desc as $d) {
                foreach (preg_split('/\r\n|\r|\n/', $d) as $line) {
                  if (trim($line) !== '') $descList[] = $line;
                }
              }
            } else {
              foreach (preg_split('/\r\n|\r|\n/', $desc) as $line) {
                if (trim($line) !== '') $descList[] = $line;
              }
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
    @endforeach
  @endif

  {{-- INFORMASI TAMBAHAN --}}
  @if(
    (is_array($bahasa) && count($bahasa)) ||
    (is_array($sertifikat) && count($sertifikat)) ||
    (is_array($hobi) && count($hobi))
  )
    <div class="section-title">Informasi Tambahan</div>
    <div>
      @if(is_array($bahasa) && count($bahasa))
        <div><span class="bold">Bahasa:</span> {{ implode(', ', array_map(fn($b) => is_array($b) ? implode(' ', $b) : $b, $bahasa)) }}</div>
      @endif
      @if(is_array($sertifikat) && count($sertifikat))
        <div><span class="bold">Sertifikat:</span> {{ implode(', ', array_map(fn($s) => is_array($s) ? implode(' ', $s) : $s, $sertifikat)) }}</div>
      @endif
      @if(is_array($hobi) && count($hobi))
        <div><span class="bold">Hobi:</span> {{ implode(', ', array_map(fn($h) => is_array($h) ? implode(' ', $h) : $h, $hobi)) }}</div>
      @endif
    </div>
  @endif
</body>
</html>