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
      <h1>Nama Lengkap</h1>
      <div class="contact">
        Email: email@example.com | +62 812 3456 7890 | linkedin.com/in/username | website.com/username
      </div>
    </div>
    <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="profile-photo" />
  </div>

  <h2>Profil Singkat</h2>
  <p>Profesional di bidang .... dengan lebih dari X tahun pengalaman dalam pengembangan sistem dan manajemen proyek.</p>

  <h2>Pengalaman Kerja</h2>
  <div class="item-title">Nama Perusahaan – Posisi</div>
  <div class="item-sub">Jan 2020 – Sekarang | Jakarta</div>
  <ul>
    <li>Mengelola tim proyek dengan 5 anggota.</li>
    <li>Meningkatkan efisiensi proses sebesar 20%.</li>
  </ul>

  <h2>Proyek</h2>
  <div class="item-title">Nama Proyek – Posisi</div>
  <div class="item-sub">Jan 2020 – Sekarang</div>
  <ul>
    <li>Mengembangkan sistem informasi internal.</li>
  </ul>

  <h2>Pendidikan</h2>
  <div class="item-title">Universitas ABC – S1 Teknik Informatika</div>
  <div class="item-sub">2014 – 2018</div>

  <h2>Keahlian</h2>
  <ul>
    <li>PHP, Laravel, JavaScript</li>
    <li>Python, Data Analysis</li>
    <li>Git, Docker</li>
  </ul>

  <h2>Bahasa</h2>
  <ul><li>Indonesia</li></ul>

  <h2>Sertifikat</h2>
  <ul><li>Dicoding (2022)</li></ul>

  <h2>Hobi</h2>
  <ul><li>Sepakbola</li></ul>

</body>
</html>
