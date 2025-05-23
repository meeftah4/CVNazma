<!-- resources/views/templates/cv1.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CV Template 1 - ATS Friendly</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800 p-8 max-w-3xl mx-auto leading-relaxed">

  <header class="flex flex-col sm:flex-row items-start gap-4 mb-6">
    <img src="{{ session('foto') ?? asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="w-24 h-24 object-cover rounded-md shadow hidden sm:block">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">{{ $profil[0]['name'] ?? 'Nama Lengkap' }}</h1>
      <p class="text-sm text-gray-600">{{ $profil[0]['email'] ?? '' }} | {{ $profil[0]['phone'] ?? '' }} | {{ $profil[0]['linkedin'] ?? '' }} | {{ $profil[0]['portfolio'] ?? '' }}</p>
      <p class="text-sm text-gray-600">{{ $profil[0]['address'] ?? '' }}</p>
    </div>
  </header>

  <section class="mb-6">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Profil Singkat</h2>
    <p class="text-gray-600">{{ $profil[0]['description'] ?? 'Deskripsi singkat tentang Anda.' }}</p>
  </section>

  <section class="mb-6">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Pengalaman Kerja</h2>
    @forelse ($pengalamankerja ?? [] as $item)
      <div class="mb-4 text-sm text-gray-600">
        <div class="flex justify-between">
          <p><strong>{{ $item['companyName'] ?? '' }}</strong> - {{ $item['jobCity'] ?? '' }}</p>
          <p class="text-gray-500">{{ $item['jobStartDate'] ?? '' }} - {{ $item['isPresent'] ? 'Sekarang' : ($item['jobEndDate'] ?? '') }}</p>
        </div>
        <p>{{ $item['jobPosition'] ?? '' }}</p>
        <ul class="list-disc pl-5">
          @foreach ($item['jobDescription'] ?? [] as $desc)
            <li>{{ $desc }}</li>
          @endforeach
        </ul>
      </div>
    @empty
      <p class="text-gray-500">Belum ada data pengalaman kerja.</p>
    @endforelse
  </section>

  <section class="mb-6">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Proyek</h2>
    @forelse ($proyek ?? [] as $item)
      <div class="mb-4 text-sm text-gray-600">
        <div class="flex justify-between">
          <p><strong>{{ $item['title'] ?? '' }}</strong></p>
          <p class="text-gray-500">{{ $item['startDate'] ?? '' }} - {{ $item['endDate'] ?? '' }}</p>
        </div>
        <p class="italic">{{ $item['institution'] ?? '' }}</p>
        <ul class="list-disc pl-5">
          @foreach ($item['description'] ?? [] as $desc)
            <li>{{ $desc }}</li>
          @endforeach
        </ul>
      </div>
    @empty
      <p class="text-gray-500">Belum ada proyek yang ditambahkan.</p>
    @endforelse
  </section>

  <section class="mb-4">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Keahlian</h2>
    <div class="text-sm text-gray-600 grid grid-cols-2 sm:grid-cols-3 gap-2">
      @foreach ($keahlian ?? [] as $skill)
        <p>{{ $skill }}</p>
      @endforeach
    </div>
  </section>

  <section class="mb-6">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Pendidikan</h2>
    @foreach ($pendidikan ?? [] as $edu)
      <div class="mb-4 text-sm text-gray-600">
        <div class="flex justify-between">
          <p><strong>{{ $edu['institution'] ?? '' }}</strong></p>
          <p class="text-gray-500">{{ $edu['startDate'] ?? '' }} - {{ $edu['endDate'] ?? '' }}</p>
        </div>
        <p class="italic">{{ $edu['degree'] ?? '' }}</p>
        <ul class="list-disc pl-5">
          @foreach ($edu['description'] ?? [] as $desc)
            <li>{{ $desc }}</li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </section>

  <section class="mb-6">
    <h2 class="text-xl font-semibold border-b pb-1 mb-2">Informasi Tambahan</h2>
    <div class="text-sm text-gray-600 space-y-2">
      <p><strong>Bahasa:</strong> {{ implode(', ', $bahasa ?? []) }}</p>
      <p><strong>Sertifikat:</strong> {{ implode(', ', $sertifikat ?? []) }}</p>
      <p><strong>Hobi:</strong> {{ implode(', ', $hobi ?? []) }}</p>
    </div>
  </section>

</body>
</html>
