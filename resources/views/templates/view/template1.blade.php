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
  <!-- Header -->
  <div style="display: flex; align-items: center; gap: 24px; margin-bottom: 1.5rem;">
    <div style="width: 140px; height: 140px; overflow: hidden;">
      <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
    <div>
      <h1 style="text-transform:uppercase; font-weight:bold; font-size:25px; letter-spacing:1px; margin-bottom:0.25rem;">
        NAMA LENGKAP
      </h1>
      <div style="margin-bottom:0;">
        <span class="info-label">Address:</span> Jakarta, Indonesia<br>
        <span class="info-label">Phone:</span> 0812-3456-7890<br>
        <span class="info-label">Email:</span> nama@email.com<br>
        <span class="info-label">LinkedIn:</span> LinkedIn Profile URL<br>
        <span class="info-label">Website:</span> Portfolio/Website URL
      </div>
    </div>
  </div>

  <!-- Summary -->
  <div class="section-title">Profil</div>
  <div class="mb-4">
    Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
  </div>

  <!-- Work Experience -->
  <div class="section-title">Pengalaman Kerja</div>
  <div class="mb-3">
    <div class="job-header">
      <span><b>Marcelle Program</b>, Instrument Tech</span>
      <span>Jan 2024 - Jan 2025</span>
    </div>
    <div class="italic mb-1">Sleman</div>
    <ul class="list-disc list-inside">
      <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <!-- Projects -->
  <div class="section-title">Proyek</div>
  <div class="mb-3">
    <div class="job-header">
      <span><b>Industrial Basics and General Application</b></span>
      <span>Jan 2023 - Jun 2023</span>
    </div>
    <div class="italic mb-1">University of Engineering Process Cohort</div>
    <ul class="list-disc list-inside">
      <li>Automotive Technology.</li>
      <li>Technological Advancements within the current Chemical & Process Industry.</li>
      <li>Other relevant information.</li>
    </ul>
  </div>

  <!-- Education -->
  <div class="section-title">Pendidikan</div>
  <div class="mb-3">
    <div class="edu-header">
      <span><b>Bachelor of Design in Process Engineering</b></span>
      <span>Jan 2024 - Jan 2025</span>
    </div>
    <div class="italic mb-1">Engineering University</div>
    <ul class="list-disc list-inside">
      <li>Relevant coursework in Process Design and Project Management.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <!-- Skills -->
  <div class="section-title">Keahlian</div>
  <div class="mb-2 grid grid-cols-3 text-sm">
    <p>Prototyping Tools</p>
    <p>User Research</p>
    <p>Interaction Design</p>
    <p>Visual Design</p>
    <p>Accessibility</p>
    <p>Responsive Design</p>
  </div>

  <!-- Additional Information -->
  <div class="section-title">ADDITIONAL INFORMATION</div>
  <ul class="mb-2">
    <li><b>Bahasa:</b> English, French, Mandarin</li>
    <li><b>Sertifikat:</b> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</li>
    <li><b>Hobi:</b> Tenis Lapangan</li>
  </ul>
</body>
</html>
