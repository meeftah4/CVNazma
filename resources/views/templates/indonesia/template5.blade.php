<!-- filepath: d:\Magang\CVNazma\resources\views\templates\Indonesia\template5.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CV Template 5</title>
  <style>
    body {
      font-family: 'Courier New', Courier, monospace;
      margin: 40px auto;
      max-width: 850px;
      padding: 0 30px;
      background-color: #fff;
      color: #000;
    }

    /* Container atas untuk foto dan info */
    .header-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    /* Nama dan kontak di sebelah kiri */
    .info-left {
      flex: 1;
    }

    h1 {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .contact {
      font-size: 12px;
      margin-bottom: 0;
    }

    /* Foto profil di kanan */
    .profile-photo {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-left: 20px;
      border: 2px solid #000;
      flex-shrink: 0;
    }

    h2 {
      font-size: 16px;
      margin-top: 30px;
      margin-bottom: 10px;
      border-bottom: 1px solid #000;
    }

    .item-title {
      font-weight: bold;
    }

    .item-sub {
      font-style: italic;
      color: #555;
      font-size: 13px;
    }

    ul {
      margin-left: 20px;
    }
  </style>
</head>
<body>

  <div class="header-top">
    <div class="info-left">
      <h1 id="previewName"></h1>
      <div id="previewContact" class="contact"></div>
    </div>
    <img id="cvPhotoPreview" src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="profile-photo" />
  </div>

  <h2>Profil Singkat</h2>
  <div id="previewProfil"></div>

  <h2>Pengalaman Kerja</h2>
  <div id="previewPengalamanKerja"></div>

  <h2>Proyek</h2>
  <div id="previewProject"></div>

  <h2>Pendidikan</h2>
  <div id="previewEducation"></div>

  <h2>Keahlian</h2>
  <div id="previewSkill"></div>

  <h2>Bahasa</h2>
  <div id="previewBahasa"></div>

  <h2>Sertifikat</h2>
  <div id="previewCertificate"></div>

  <h2>Hobi</h2>
  <div id="previewHobby"></div>

</body>
</html>