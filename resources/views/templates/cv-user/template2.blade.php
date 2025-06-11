@php
  $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
  use Illuminate\Support\Str;
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
      font-size: 15px;
    }
    .section-title {
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1.1rem;
      border-bottom: 1px solid #888;
      margin-bottom: 0.5rem;
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
      @if(!empty($profil0['address']) || !empty($profil0['email']) || !empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['website']))
        <hr style="border:1px solid #888; margin:0.5rem 0 0.7rem 0; width:100%;">
        <div class="text-sm" style="margin-bottom:0.2rem;">
          {{ $profil0['address'] ?? '' }}
          @if(!empty($profil0['address']) && (!empty($profil0['email']) || !empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['website']))) | @endif
          {{ $profil0['email'] ?? '' }}
          @if(!empty($profil0['email']) && (!empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['website']))) | @endif
          {{ $profil0['phone'] ?? '' }}
          @if(!empty($profil0['phone']) && (!empty($profil0['linkedin']) || !empty($profil0['website']))) | @endif
          {{ $profil0['linkedin'] ?? '' }}
          @if(!empty($profil0['linkedin']) && !empty($profil0['website'])) | @endif
          {{ $profil0['website'] ?? '' }}
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
        <span>{{ $skill['skill_name'] ?? (is_array($skill) ? implode(', ', $skill) : $skill) }}</span>
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
            <span class="bold">{{ $item['company_name'] ?? '' }}</span>
            @if(!empty($item['location']))
              - <span>{{ $item['location'] }}</span>
            @endif
          </span>
          <span id="job-date-{{ $loop->index }}"></span>
        </div>
        @if(!empty($item['role']))
          <div class="italic mb-1">{{ $item['role'] }}</div>
        @endif
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
    @endforeach
  @endif

  {{-- PROYEK --}}
  @if(is_array($proyek) && count($proyek))
    <div class="section-title">Proyek</div>
    @foreach ($proyek as $item)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $item['project_name'] ?? '' }}</span>
          <span id="project-date-{{ $loop->index }}"></span>
        </div>
        <div class="italic mb-1">{{ $item['role'] ?? '' }}</div>
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
    @endforeach
  @endif

  {{-- PENDIDIKAN --}}
  @if(is_array($pendidikan) && count($pendidikan))
    <div class="section-title">Pendidikan</div>
    @foreach ($pendidikan as $edu)
      <div class="mb-3">
        <div style="display:flex; justify-content:space-between;">
          <span class="bold">{{ $edu['institution'] ?? '' }}</span>
          <span id="edu-date-{{ $loop->index }}"></span>
        </div>
        <div class="italic mb-1">{{ $edu['degree'] ?? '' }}</div>
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
        <div><span class="bold">Bahasa:</span> {{ implode(', ', array_map(fn($b) => $b['language_name'] ?? (is_array($b) ? implode(' ', $b) : $b), $bahasa)) }}</div>
      @endif
      @if(is_array($sertifikat) && count($sertifikat))
        <div><span class="bold">Sertifikat:</span> {{ implode(', ', array_map(fn($s) => $s['certificate_name'] ?? (is_array($s) ? implode(' ', $s) : $s), $sertifikat)) }}</div>
      @endif
      @if(is_array($hobi) && count($hobi))
        <div><span class="bold">Hobi:</span> {{ implode(', ', array_map(fn($h) => $h['hobby'] ?? (is_array($h) ? implode(' ', $h) : $h), $hobi)) }}</div>
      @endif
    </div>
  @endif
</body>
</html>