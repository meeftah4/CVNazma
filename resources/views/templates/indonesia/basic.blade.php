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
  use Illuminate\Support\Str;
  $profil0 = (is_array($profil) && isset($profil[0]) && is_array($profil[0])) ? $profil[0] : [];
  $foto = !empty(session('foto')) ? session('foto') : ($profil0['photo'] ?? '');
  $foto = trim($foto);
  $showPhoto = $foto !== ''
      && strtolower($foto) !== 'null'
      && $foto !== '#'
      && (
          preg_match('/\.(jpg|jpeg|png|gif)$/i', $foto)
          || Str::startsWith($foto, 'data:image/'))
@endphp
<header class="flex flex-col sm:flex-row items-start gap-6 mb-8">
  @if($showPhoto)
    <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 0; flex-shrink:0;">
      <img src="{{ $foto }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
  @endif
  <div>
    <h1 class="text-3xl font-bold text-black">
      {{ $profil0['name'] ?? '' }}
    </h1>
    <p class="text-sm text-black">
      {{ $profil0['email'] ?? '' }}@if(!empty($profil0['email']) && !empty($profil0['phone'])) | @endif
      {{ $profil0['phone'] ?? '' }}@if(!empty($profil0['phone']) && !empty($profil0['linkedin'])) | @endif
      {{ $profil0['linkedin'] ?? '' }}@if(!empty($profil0['linkedin']) && !empty($profil0['portfolio'])) | @endif
      {{ $profil0['portfolio'] ?? '' }}
    </p>
    <p class="text-sm text-black">
      {{ $profil0['address'] ?? '' }}
    </p>
  </div>
</header>

<!-- PROFIL SINGKAT -->
@if(!empty($profil0['description']))
  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 "></h2>
    <p class="text-black">
      {{ $profil0['description'] }}
    </p>
  </section>
@endif

<!-- PENGALAMAN KERJA -->
@if(is_array($pengalamankerja) && count($pengalamankerja))
  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3 text-black">Pengalaman Kerja</h2>
    @foreach ($pengalamankerja as $item)
      <div class="mb-5 text-sm text-black">
        <div class="flex justify-between">
          <p>
            <span class="font-semibold">{{ $item['companyName'] ?? '' }}</span>
            @if(!empty($item['jobCity']))
              <span> - {{ $item['jobCity'] }}</span>
            @endif
          </p>
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
        <p class="italic">{{ $item['jobPosition'] ?? '' }}</p>
        @php
          $jobDesc = $item['jobDescription'] ?? [];
          if (!is_array($jobDesc)) $jobDesc = [$jobDesc];
        @endphp
        @if(count($jobDesc) && !empty($jobDesc[0]))
          <ul class="list-disc list-inside">
            @foreach ($jobDesc as $desc)
              @if(!empty($desc))
                <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
              @endif
            @endforeach
          </ul>
        @endif

      </div>
    @endforeach
  </section>
@endif

<!-- PROYEK -->
@if(is_array($proyek) && count($proyek))
  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3 text-black">Proyek</h2>
    @foreach ($proyek as $item)
      <div class="mb-5 text-sm text-black">
        <div class="flex justify-between">
          <p class="font-semibold">{{ $item['projectName'] ?? '' }}</p>
          <span class="text-black font-normal" id="project-date-{{ $loop->index }}"></span>
        </div>
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
        <p class="italic">{{ $item['projectPosition'] ?? '' }}</p>
        @php
          $descArr = $item['projectDescription'] ?? [];
          if (!is_array($descArr)) $descArr = [$descArr];
        @endphp
        @if(count($descArr) && !empty($descArr[0]))
          <ul class="list-disc list-inside">
            @foreach ($descArr as $desc)
              @if(!empty($desc))
                <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
              @endif
            @endforeach
          </ul>
        @endif
      </div>
    @endforeach
  </section>
@endif

<!-- KEAHLIAN -->
@if(is_array($keahlian) && count($keahlian))
  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3 text-black">Keahlian</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-black">
      @foreach ($keahlian as $skill)
        <p>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</p>
      @endforeach
    </div>
  </section>
@endif

<!-- PENDIDIKAN -->
@if(is_array($pendidikan) && count($pendidikan))
  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3 text-black">Pendidikan</h2>
    @foreach ($pendidikan as $edu)
      <div class="mb-5 text-sm text-black">
        <div class="flex justify-between">
          <p class="font-semibold">{{ $edu['educationInstitution'] ?? '' }}</p>
          <span class="text-black font-normal" id="edu-date-{{ $loop->index }}"></span>
        </div>
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
        <p class="italic">{{ $edu['educationDegree'] ?? '' }}</p>
        @php
          $descArr = $edu['educationDescription'] ?? [];
          if (!is_array($descArr)) $descArr = [$descArr];
        @endphp
        @if(count($descArr) && !empty($descArr[0]))
          <ul class="list-disc list-inside">
            @foreach ($descArr as $desc)
              @if(!empty($desc))
                <li>{{ is_array($desc) ? implode(', ', $desc) : $desc }}</li>
              @endif
            @endforeach
          </ul>
        @endif
      </div>
    @endforeach
  </section>
@endif

<!-- INFORMASI TAMBAHAN -->
@if(
  (is_array($bahasa) && count($bahasa)) ||
  (is_array($sertifikat) && count($sertifikat)) ||
  (is_array($hobi) && count($hobi))
)
  <section>
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3 text-black">Informasi Tambahan</h2>
    <div class="text-sm text-black space-y-2">
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
  </section>
@endif
</body>
</html>