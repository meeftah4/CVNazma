<!-- filepath: d:\Magang\CVNazma\resources\views\templates\indonesia\template1.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #f9f9f9;
            color: #333;
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #005bbb;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .name {
            font-size: 28px;
            font-weight: 700;
            color: #005bbb;
        }
        .title {
            font-size: 18px;
            font-weight: 500;
            margin-top: 5px;
        }
        .contact {
            text-align: right;
            font-size: 14px;
            line-height: 1.6;
        }
        section {
            margin-bottom: 25px;
        }
        h2 {
            font-size: 18px;
            color: #005bbb;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
            font-weight: 600;
        }
        .item {
            margin-bottom: 15px;
        }
        .item-title {
            font-weight: 600;
            font-size: 16px;
        }
        .item-sub {
            font-size: 14px;
            color: #555;
        }
        .item-desc {
            margin-top: 5px;
            font-size: 14px;
        }
        ul {
            margin-top: 6px;
            margin-left: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <div style="display: flex; gap: 20px; align-items: center;">
            <img id="cvPhotoPreview" src="{{ asset('images/CV Profil.jpg') }}" alt="Foto Profil" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 2px solid #005bbb;">
            <div>
                <div id="previewName" class="name"></div>
                <div id="previewContact" class="email"></div>
            </div>
        </div>
        <div id="previewAddress" class="contact"></div>
    </header>

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