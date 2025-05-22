\<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV Template ATS Layout 3</title>
  <style>
    @page {
            size: A4;
            margin: 20mm;
        }
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
    <img src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil">
    <div>
      <h1>Nama Lengkap</h1>
      <div class="contact">
        Email: email@example.com | Telepon: +62 812 3456 7890<br>
        LinkedIn: linkedin.com/in/username | Website: website.com/username
      </div>
    </div>
  </div>

  <section>
    <h2>Profil Singkat</h2>
    <p>Seorang profesional di bidang [bidang] dengan pengalaman lebih dari X tahun dalam mengelola proyek, menyusun strategi, dan memberikan hasil yang terukur. Memiliki kemampuan analisis yang kuat dan kepemimpinan yang solid.</p>
  </section>

  <section>
    <h2>Pengalaman Kerja</h2>
    <div class="item">
      <div class="item-title">Nama Perusahaan – Posisi</div>
      <div class="item-sub">Jan 2020 – Sekarang | Jakarta</div>
      <div class="item-desc">
        <ul>
          <li>Mengelola tim proyek dengan 5 anggota untuk mengembangkan sistem informasi internal.</li>
          <li>Meningkatkan efisiensi proses sebesar 20% melalui otomasi.</li>
        </ul>
      </div>
    </div>
    <div class="item">
      <div class="item-title">Perusahaan Sebelumnya – Posisi</div>
      <div class="item-sub">Jan 2018 – Des 2019 | Bandung</div>
      <div class="item-desc">
        <ul>
          <li>Bertanggung jawab atas perancangan UI/UX untuk produk SaaS.</li>
          <li>Bekerja sama dengan tim pengembang lintas fungsi.</li>
        </ul>
      </div>
    </div>
  </section>

  <section>
    <h2>Proyek</h2>
    <div class="item">
      <div class="item-title">Nama Proyek – Posisi</div>
      <div class="item-sub">Jan 2020 – Sekarang | Jakarta</div>
      <div class="item-desc">
        <ul>
          <li>Mengelola tim proyek dengan 5 anggota untuk mengembangkan sistem informasi internal.</li>
          <li>Meningkatkan efisiensi proses sebesar 20% melalui otomasi.</li>
        </ul>
      </div>
    </div>
    <div class="item">
      <div class="item-title">Proyek Sebelumnya – Posisi</div>
      <div class="item-sub">Jan 2018 – Des 2019 | Bandung</div>
      <div class="item-desc">
        <ul>
          <li>Bertanggung jawab atas perancangan UI/UX untuk produk SaaS.</li>
          <li>Bekerja sama dengan tim pengembang lintas fungsi.</li>
        </ul>
      </div>
    </div>
  </section>

  <section>
    <h2>Pendidikan</h2>
    <div class="item">
      <div class="item-title">Universitas ABC – S1 Teknik Informatika</div>
      <div class="item-sub">2014 – 2018</div>
    </div>
  </section>

  <section>
    <h2>Keahlian</h2>
    <ul>
      <li>PHP, Laravel, JavaScript</li>
      <li>Analisis Data, Python (Pandas, NumPy)</li>
      <li>Git, REST API, Docker</li>
    </ul>
  </section>

  <section>
    <h2>Bahasa</h2>
    <ul>
      <li>Indonesia</li>
    </ul>
  </section>

  <section>
    <h2>Sertifikat</h2>
    <ul>
      <li>Dicoding (2022)</li>
    </ul>
  </section>

  <section>
    <h2>Hobi</h2>
    <ul>
      <li>Sepakbola</li>
    </ul>
  </section>

</body>
</html>
