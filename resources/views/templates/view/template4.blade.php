<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=900, initial-scale=1" />
  <title>CV Template 4 - ATS Friendly</title>
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
      font-weight: bold;
      font-size: 1.1rem;
      letter-spacing: 1px;
      margin: 1.5rem 0 0 0;
      color: #111;
    }
    .section-divider {
      border: none;
      border-top: 1px solid #dfb160;
      margin: 0.5rem 0 0.3rem 0;
      width: 100%;
    }
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
    .two-col { display: flex; gap: 2rem; }
    .col { flex: 1; }
    .skills-table { width: 100%; }
    .skills-table td { padding-right: 2rem; vertical-align: top; }
    .bold { font-weight: bold; }
    .italic { font-style: italic; }
    .mb-1 { margin-bottom: 0.25rem; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .mt-2 { margin-top: 0.5rem; }
    .grid-skill { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem 1.5rem; }
    .hr-profil {
      border: none;
      border-top: 2px solid #dfb160;
      margin: 0 0 0.3rem 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div style="margin-bottom:1.5rem;">
    <div style="display:flex; align-items:flex-start; gap:24px;">
      <div style="flex:1;">
        <h1 style="font-size:2rem; font-weight:bold; color:#111; margin-bottom:0.2rem; text-transform:uppercase;">
          Nama Lengkap
        </h1>
        <div style="font-size:1rem; color:#111;">
          nama@email.com | 0812-3456-7890 | LinkedIn Profile URL | Portfolio/Website URL | Jakarta, Indonesia
        </div>
      </div>
      <div style="width:110px; height:110px; overflow:hidden; border-radius:0;">
        <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width:100%; height:100%; object-fit:cover;">
      </div>
    </div>
  </div>

  <hr class="hr-profil">

  <!-- Profil / Summary -->
  <div class="section-title" style="margin-top:0;">Profil</div>
  <hr class="section-divider">
  <div class="mb-4">
    Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
  </div>

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

  <!-- Proyek -->
  <div class="section-title">Proyek</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div style="display:flex; justify-content:space-between; align-items:center;">
      <p><strong>Industrial Basics and General Application</strong></p>
      <p style="color:#111;">Jan 2023 - Jun 2023</p>
    </div>
    <p class="italic" style="color:#111;">University of Engineering Process Cohort</p>
    <ul>
      <li>Automotive Technology.</li>
      <li>Technological Advancements within the current Chemical & Process Industry.</li>
      <li>Other relevant information.</li>
    </ul>
  </div>

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

  <!-- Pendidikan -->
  <div class="section-title">Pendidikan</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div style="display:flex; justify-content:space-between; align-items:center;">
      <p><strong>Engineering University</strong></p>
      <p style="color:#111;">Jan 2024 - Jan 2025</p>
    </div>
    <p class="italic" style="color:#111;">Bachelor of Design in Process Engineering</p>
    <ul>
      <li>Relevant coursework in Process Design and Project Management.</li>
      <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
      <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
    </ul>
  </div>

  <!-- Informasi Tambahan -->
  <div class="section-title">Informasi Tambahan</div>
  <hr class="section-divider">
  <div class="mb-4">
    <div>
      <p style="color:#111;"><strong>Bahasa:</strong> English, French, Mandarin</p>
      <p style="color:#111;"><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>
      <p style="color:#111;"><strong>Hobi:</strong> Tenis Lapangan</p>
    </div>
  </div>
</body>
</html>
