<!-- filepath: d:\Magang\CVNazma\resources\views\templates\indonesia\template3.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV Template ATS Layout 3</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #ffffff;
      color: #000000;
      max-width: 850px;
      margin: 40px auto;
      padding: 0 30px;
      line-height: 1.6;
      font-size: 14px;
    }

    .header {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 10px;
    }

    .header img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #ccc;
    }

    h1 {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 2px;
    }

    .contact {
      font-size: 13px;
      margin-bottom: 30px;
    }

    section {
      margin-bottom: 28px;
    }

    h2 {
      font-size: 16px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 4px;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    .item {
      margin-bottom: 15px;
    }

    .item-title {
      font-weight: 600;
      font-size: 15px;
    }

    .item-sub {
      font-size: 13px;
      font-style: italic;
      color: #444;
    }

    .item-desc {
      margin-top: 5px;
    }

    ul {
      margin-top: 5px;
      margin-left: 20px;
    }
  </style>
</head>
<body>

  <div class="header">
    <img id="cvPhotoPreview" src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil">
    <div>
      <h1 id="previewName"></h1>
      <div id="previewContact" class="contact"></div>
    </div>
  </div>

  <section>
    <h2>Profil Singkat</h2>
    <div id="previewProfil"></div>
  </section>

  <section>
    <h2>Pengalaman Kerja</h2>
    <div id="previewPengalamanKerja"></div>
  </section>

  <section>
    <h2>Proyek</h2>
    <div id="previewProject"></div>
  </section>

  <section>
    <h2>Pendidikan</h2>
    <div id="previewEducation"></div>
  </section>

  <section>
    <h2>Keahlian</h2>
    <div id="previewSkill"></div>
  </section>

  <section>
    <h2>Bahasa</h2>
    <div id="previewBahasa"></div>
  </section>

  <section>
    <h2>Sertifikat</h2>
    <div id="previewCertificate"></div>
  </section>

  <section>
    <h2>Hobi</h2>
    <div id="previewHobby"></div>
  </section>

</body>
</html>