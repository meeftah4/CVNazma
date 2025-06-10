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
  <header class="flex flex-col sm:flex-row items-start gap-6 mb-8">
    <div style="width: 140px; height: 140px; overflow: hidden;">
      <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
    <div>
    <div>
      <h1 class="text-3xl font-bold text-gray-900">
        NAMA LENGKAP
      </h1>
      <p class="text-sm text-gray-600">
        nama@email.com | 0812-3456-7890 | linkedin.com/in/namalengkap | portfolio.com
      </p>
      <p class="text-sm text-gray-600">
        Jakarta, Indonesia
      </p>
    </div>
  </header>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Profil</h2>
    <p class="text-gray-600">
      Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
    </p>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pengalaman Kerja</h2>
    <div class="mb-5 text-sm text-gray-700">
      <div class="flex justify-between font-semibold">
        <p>Marcelle Program, Instrument Tech</p>
        <p class="text-gray-500">Jan 2024 - Jan 2025</p>
      </div>
      <p class="italic">Sleman</p>
      <ul class="list-disc list-inside">
        <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Proyek</h2>
    <div class="mb-5 text-sm text-gray-700">
      <div class="flex justify-between font-semibold">
        <p>Industrial Basics and General Application</p>
        <p class="text-gray-500">Jan 2023 - Jun 2023</p>
      </div>
      <p class="italic">University of Engineering Process Cohort</p>
      <ul class="list-disc list-inside">
        <li>Automotive Technology.</li>
        <li>Technological Advancements within the current Chemical &amp; Process Industry.</li>
        <li>Other relevant information.</li>
      </ul>
    </div>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Keahlian</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
      <p>Prototyping Tools</p>
      <p>User Research</p>
      <p>Interaction Design</p>
      <p>Visual Design</p>
      <p>Accessibility</p>
      <p>Responsive Design</p>
    </div>
  </section>

  <section class="mb-8">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Pendidikan</h2>
    <div class="mb-5 text-sm text-gray-700">
      <div class="flex justify-between font-semibold">
        <p>Engineering University</p>
        <p class="text-gray-500">Jan 2024 - Jan 2025</p>
      </div>
      <p class="italic">Bachelor of Design in Process Engineering</p>
      <ul class="list-disc list-inside">
        <li>Relevant coursework in Process Design and Project Management.</li>
        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
      </ul>
    </div>
  </section>

  <section>
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-3">Informasi Tambahan</h2>
    <div class="text-sm text-gray-700 space-y-2">
      <p><strong>Bahasa:</strong> English, French, Mandarin</p>
      <p><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>
      <p><strong>Hobi:</strong> Tenis Lapangan</p>
    </div>
  </section>
</body>
</html>
