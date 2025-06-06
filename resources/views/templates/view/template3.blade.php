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
    <div style="width: 100px; height: 100px; overflow: hidden; flex-shrink: 0;">
      <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0; border: none;">
    </div>
    <div>
      <h1 style="font-size:2rem; font-weight:bold; color:#111; text-transform:uppercase; margin-bottom:0.2rem;">
        Nama Lengkap
      </h1>
      <div style="font-size:1rem; color:#111; margin-bottom:0.2rem;">
        nama@email.com | 0812-3456-7890 | LinkedIn Profile URL | Portfolio/Website URL
      </div>
      <div style="font-size:1rem; color:#111; margin-bottom:0.7rem;">
        Jakarta, Indonesia
      </div>
    </div>
  </div>

  <!-- Profil -->
  <hr class="section-divider">
  <div class="section-title">Profil</div>
  <hr class="section-divider">
  <div class="mb-4">
    Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
  </div>

  <hr class="section-divider">

  <!-- Pengalaman Kerja -->
  <div class="section-title">Pengalaman Kerja</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div style="display:flex; justify-content:space-between; align-items:center;">
      <p><strong>Instrument Tech</strong> - <span>Sleman</span></p>
      <p style="color:#111;">Jan 2024 - Jan 2025</p>
    </div>
    <p>Marcelle Program</p>
    <ul>
      <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <hr class="section-divider">

  <!-- Proyek -->
  <div class="section-title">Proyek</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div style="display:flex; justify-content:space-between; align-items:center;">
      <p><strong>Industrial Basics and General Application</strong></p>
      <p style="color:#111;">Jan 2023 - Jun 2023</p>
    </div>
    <p class="italic">University of Engineering Process Cohort</p>
    <ul>
      <li>Automotive Technology.</li>
      <li>Technological Advancements within the current Chemical & Process Industry.</li>
      <li>Other relevant information.</li>
    </ul>
  </div>

  <hr class="section-divider">

  <!-- Keahlian -->
  <div class="section-title">Keahlian</div>
  <hr class="section-divider">
  <div class="mb-4 grid-skill">
    <span>Prototyping Tools</span>
    <span>User Research</span>
    <span>Interaction Design</span>
    <span>Visual Design</span>
    <span>Accessibility</span>
    <span>Responsive Design</span>
  </div>

  <hr class="section-divider">

  <!-- Pendidikan -->
  <div class="section-title">Pendidikan</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div style="display:flex; justify-content:space-between; align-items:center;">
      <p><strong>Engineering University</strong></p>
      <p style="color:#111;">Jan 2024 - Jan 2025</p>
    </div>
    <p class="italic">Bachelor of Design in Process Engineering</p>
    <ul>
      <li>Relevant coursework in Process Design and Project Management.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <hr class="section-divider">

  <!-- Informasi Tambahan -->
  <div class="section-title">Informasi Tambahan</div>
  <hr class="section-divider">
  <div class="mb-4">
    <p><strong>Bahasa:</strong> English, French, Mandarin</p>
    <p><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>
    <p><strong>Hobi:</strong> Tenis Lapangan</p>
  </div>
</body>
</html>
