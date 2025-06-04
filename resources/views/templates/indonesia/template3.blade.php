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
  <title>CV Template 3 - ATS Friendly</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      color: #111;
      padding: 32px 32px 32px 32px;
      font-size: 15px;
    }
    .section-title {
      color: #111;
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1.1rem;
      letter-spacing: 1px;
      margin: 0.1rem 0 0.1rem 0;
      border-bottom: none;
      padding-bottom: 0;
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
      color: #111 !important;
    }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .grid-skill {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 0.5rem 1.5rem;
    }
    .section-divider {
      border: none;
      border-top: 2px solid #111;
      margin: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div style="display: flex; align-items: center; gap: 24px; margin-bottom:1.5rem;">
    @if($showPhoto)
      <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0;">
        <img src="{{ $foto }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
      </div>
    @endif
    <div>
      @if(!empty($profil0['name']))
        <h1 style="font-size:2rem; font-weight:bold; color:#111; text-transform:uppercase; margin-bottom:0.2rem;">
          {{ $profil0['name'] }}
        </h1>
      @endif
      @if(!empty($profil0['email']) || !empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['portfolio']))
        <div style="font-size:1rem; color:#111; margin-bottom:0.2rem;">
          {{ $profil0['email'] ?? '' }}
          @if(!empty($profil0['email']) && (!empty($profil0['phone']) || !empty($profil0['linkedin']) || !empty($profil0['portfolio']))) | @endif
          {{ $profil0['phone'] ?? '' }}
          @if(!empty($profil0['phone']) && (!empty($profil0['linkedin']) || !empty($profil0['portfolio']))) | @endif
          {{ $profil0['linkedin'] ?? '' }}
          @if(!empty($profil0['linkedin']) && !empty($profil0['portfolio'])) | @endif
          {{ $profil0['portfolio'] ?? '' }}
        </div>
      @endif
      @if(!empty($profil0['address']))
        <div style="font-size:1rem; color:#111; margin-bottom:0.7rem;">
          {{ $profil0['address'] }}
        </div>
      @endif
    </div>
  </div>

 <!-- Profil -->
@if(!empty($profil0['description']))
  <hr class="section-divider">
  <div class="section-title">Profil</div>
  <hr class="section-divider">
  <div class="mb-4">
    {{ $profil0['description'] }}
  </div>
@endif

<!-- Pengalaman Kerja -->
@if(is_array($pengalamankerja) && count($pengalamankerja))
  <hr class="section-divider">
  <div class="section-title">Pengalaman Kerja</div>
  <hr class="section-divider">
  @foreach ($pengalamankerja as $item)
    <div class="mb-4">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <p>
          @if(!empty($item['companyName']))
            <strong>{{ $item['companyName'] }}</strong>
          @endif
          @if(!empty($item['companyName']) && !empty($item['jobCity']))
            - 
          @endif
          @if(!empty($item['jobCity']))
            <span>{{ $item['jobCity'] }}</span>
          @endif
        </p>
        <p style="color:#111;" id="job-date-{{ $loop->index }}"></p>
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
      <p>{{ $item['jobPosition'] ?? '' }}</p>
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
  <hr class="section-divider">
  <div class="section-title">Proyek</div>
  <hr class="section-divider">
  @foreach ($proyek as $item)
    <div class="mb-4">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <p><strong>{{ $item['projectName'] ?? '' }}</strong></p>
        <p style="color:#111;" id="project-date-{{ $loop->index }}"></p>
        <script>
        (function() {
          function formatDate(dateStr) {
            if (!dateStr) return '';
            const date = new Date(dateStr);
            if (isNaN(date)) return '';
            return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
          }
          const start = @json($item['projectStartDate'] ?? '' );
          const end = @json($item['projectEndDate'] ?? '' );
          const present = @json($item['isPresent'] ?? false );
          let text = '';
          if (start || present) {
            text = `${formatDate(start)} - ${present ? 'Sekarang' : formatDate(end)}`;
          }
          document.getElementById('project-date-{{ $loop->index }}').innerText = text;
        })();
        </script>
      </div>
      <p class="italic">{{ $item['projectPosition'] ?? '' }}</p>
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
  <hr class="section-divider">
  <div class="section-title">Keahlian</div>
  <hr class="section-divider">
  <div class="mb-4 grid-skill">
    @foreach($keahlian as $skill)
      <span>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</span>
    @endforeach
  </div>
@endif

<!-- Pendidikan -->
@if(is_array($pendidikan) && count($pendidikan))
  <hr class="section-divider">
  <div class="section-title">Pendidikan</div>
  <hr class="section-divider">
  @foreach ($pendidikan as $edu)
    <div class="mb-4">
      <div style="display:flex; justify-content:space-between; align-items:center;">
        <p><strong>{{ $edu['educationInstitution'] ?? '' }}</strong></p>
        <p style="color:#111;" id="edu-date-{{ $loop->index }}"></p>
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
      <p class="italic">{{ $edu['educationDegree'] ?? '' }}</p>
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

<!-- Informasi Tambahan -->
@if(
  (is_array($bahasa) && count($bahasa)) ||
  (is_array($sertifikat) && count($sertifikat)) ||
  (is_array($hobi) && count($hobi))
)
  <hr class="section-divider">
  <div class="section-title">Informasi Tambahan</div>
  <hr class="section-divider">
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

</body>
</html>
