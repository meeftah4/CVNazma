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
  </style>
</head>
<body>
  <!-- Header -->
  <div style="text-align:center; margin-bottom:0.5rem;">
    <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0; margin: 0 auto 0.5rem auto;">
      <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
    <div style="display:flex; flex-direction:column; align-items:center;">
      <h1 style="font-size:2rem; font-weight:bold; text-transform:uppercase; margin-bottom:0.2rem;">
        Nama Lengkap
      </h1>
      <hr style="border:1px solid #888; margin:0.5rem 0 0.7rem 0; width:100%;">
      <div class="text-sm" style="margin-bottom:0.2rem;">
        Jakarta, Indonesia | nama@email.com | 0812-3456-7890 | LinkedIn Profile URL | Portfolio/Website URL
      </div>
      <hr style="border:1px solid #888; margin:0.3rem 0 0.5rem 0; width:100%;">
    </div>
  </div>

  <!-- Profil -->
  <div class="mb-4">
    Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
  </div>

  <!-- Keahlian -->
  <div class="section-title mb-2">Keahlian</div>
  <div class="mb-4" style="display:grid; grid-template-columns:repeat(3,1fr); gap:0.5rem;">
    <span>Prototyping Tools</span>
    <span>User Research</span>
    <span>Interaction Design</span>
    <span>Visual Design</span>
    <span>Accessibility</span>
    <span>Responsive Design</span>
  </div>

  <!-- Pengalaman Kerja -->
  <div class="section-title mb-2">Pengalaman Kerja</div>
  <div class="mb-3">
    <div style="display:flex; justify-content:space-between;">
      <span class="bold">Instrument Tech - Sleman</span>
      <span class="text-xs">Jan 2024 - Jan 2025</span>
    </div>
    <div class="mb-1">Marcelle Program</div>
    <ul>
      <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <!-- Proyek -->
  <div class="section-title">Proyek</div>
  <div class="mb-3">
    <div style="display:flex; justify-content:space-between;">
      <span class="bold">Industrial Basics and General Application</span>
      <span class="text-xs">Jan 2023 - Jun 2023</span>
    </div>
    <div class="italic mb-1">University of Engineering Process Cohort</div>
    <ul>
      <li>Automotive Technology.</li>
      <li>Technological Advancements within the current Chemical & Process Industry.</li>
      <li>Other relevant information.</li>
    </ul>
  </div>

  <!-- Pendidikan -->
  <div class="section-title">Pendidikan</div>
  <div class="mb-3">
    <div style="display:flex; justify-content:space-between;">
      <span class="bold">Engineering University</span>
      <span class="text-xs">Jan 2024 - Jan 2025</span>
    </div>
    <div class="italic mb-1">Bachelor of Design in Process Engineering</div>
    <ul>
      <li>Relevant coursework in Process Design and Project Management.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <!-- Informasi Tambahan -->
  <div class="section-title">Informasi Tambahan</div>
  <div>
    <div><span class="bold">Bahasa:</span> English, French, Mandarin</div>
    <div><span class="bold">Sertifikat:</span> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</div>
    <div><span class="bold">Hobi:</span> Tenis Lapangan</div>
  </div>
</body>
</html>
