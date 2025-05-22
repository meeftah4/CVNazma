<!-- filepath: d:\Magang\CVNazma\resources\views\templates\indonesia\template4.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CV Template 4</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px auto;
      max-width: 850px;
      padding: 0 30px;
      line-height: 1.6;
      color: #222;
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .profile-header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      flex-shrink: 0;
    }

    .profile-text {
      flex-grow: 1;
    }

    .name {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .contact {
      font-size: 13px;
      margin-bottom: 0;
    }

    section {
      margin-bottom: 30px;
    }

    .section-label {
      background: #eee;
      padding: 6px 12px;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .item-title {
      font-weight: bold;
      font-size: 15px;
    }

    .item-sub {
      font-size: 13px;
      font-style: italic;
      color: #555;
    }

    ul {
      margin-left: 20px;
    }
  </style>
</head>
<body>

  <div class="profile-header">
    <img id="cvPhotoPreview" src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil">
    <div class="profile-text">
      <div id="previewName" class="name"></div>
      <div id="previewContact" class="contact"></div>
    </div>
  </div>

  <section>
    <div class="section-label">Profil Singkat</div>
    <div id="previewProfil"></div>
  </section>

  <section>
    <div class="section-label">Pengalaman Kerja</div>
    <div id="previewPengalamanKerja"></div>
  </section>

  <section>
    <div class="section-label">Proyek</div>
    <div id="previewProject"></div>
  </section>

  <section>
    <div class="section-label">Pendidikan</div>
    <div id="previewEducation"></div>
  </section>

  <section>
    <div class="section-label">Keahlian</div>
    <div id="previewSkill"></div>
  </section>

  <section>
    <div class="section-label">Bahasa</div>
    <div id="previewBahasa"></div>
  </section>

  <section>
    <div class="section-label">Sertifikat</div>
    <div id="previewCertificate"></div>
  </section>

  <section>
    <div class="section-label">Hobi</div>
    <div id="previewHobby"></div>
  </section>

</body>
</html>