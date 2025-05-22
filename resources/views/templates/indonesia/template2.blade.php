<!-- filepath: d:\Magang\CVNazma\resources\views\templates\indonesia\template2.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CV ATS Friendly</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #000;
      background-color: #fff;
      max-width: 800px;
      margin: auto;
      padding: 40px;
      line-height: 1.6;
    }
    h1, h2, h3 {
      margin-top: 24px;
      margin-bottom: 8px;
      font-weight: bold;
    }
    h1 {
      font-size: 24px;
      text-align: center;
    }
    h2 {
      font-size: 18px;
      border-bottom: 1px solid #000;
      padding-bottom: 4px;
    }
    ul {
      padding-left: 20px;
    }
    .contact-info {
      text-align: center;
      margin-bottom: 20px;
    }
    .section {
      margin-bottom: 24px;
    }
    .profile-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }
    .profile-header img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #ccc;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="profile-header">
    <img id="cvPhotoPreview" src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil">
    <h1 id="previewName"></h1>
    <div id="previewContact" class="contact-info"></div>
  </div>

  <div class="section">
    <h2>Profil Singkat</h2>
    <div id="previewProfil"></div>
  </div>

  <div class="section">
    <h2>Pengalaman Kerja</h2>
    <div id="previewPengalamanKerja"></div>
  </div>

  <div class="section">
    <h2>Proyek</h2>
    <div id="previewProject"></div>
  </div>

  <div class="section">
    <h2>Pendidikan</h2>
    <div id="previewEducation"></div>
  </div>

  <div class="section">
    <h2>Keahlian</h2>
    <div id="previewSkill"></div>
  </div>

  <div class="section">
    <h2>Bahasa</h2>
    <div id="previewBahasa"></div>
  </div>

  <div class="section">
    <h2>Sertifikat</h2>
    <div id="previewCertificate"></div>
  </div>

  <div class="section">
    <h2>Hobi</h2>
    <div id="previewHobby"></div>
  </div>

</body>
</html>