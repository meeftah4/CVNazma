<!-- resources/views/templates/cv1.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
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
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .name {
            font-size: 28px;
            font-weight: 700;
            color: black;
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
            color: black;
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
                <div id="previewName" class="name">Nama Lengkap</div>
                <div id="previewContact" class="email">email@example.com</div>
                <div class="telephone">+62 812 3456 7890</div>
            </div>
        </div>
        <div id="previewAddress" class="contact">
            LinkedIn: linkedin.com/in/username<br>
            Website: website.com/username
        </div>
    </header>

    <section>
        <h2>Profil Singkat</h2>
        <div id="previewProfil">
            <p>
                Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
            </p>
        </div>
    </section>

    <section>
        <h2>Pengalaman Kerja</h2>
        <div id="previewPengalamanKerja">
            <div class="item">
                <div class="item-title"><strong id="companyName">Instrument Tech</strong> – <span id="jobPosition">Marcelle Program</span></div>
                <div class="item-sub"><span id="jobDuration">Jan 2024 - Jan 2025</span> | <span id="jobCity">Sleman</span></div>
                <div class="item-desc">
                    <ul id="jobDescription">
                        <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
                        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
                        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2>Proyek</h2>
        <div id="previewProject">
            <div class="item">
                <div class="item-title">Industrial Basics and General Application</div>
                <div class="item-sub">Jan 2023 - Jun 2023 | University of Engineering Process Cohort</div>
                <div class="item-desc">
                    <ul>
                        <li>Automotive Technology.</li>
                        <li>Technological Advancements within the current Chemical & Process Industry.</li>
                        <li>Other relevant information.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2>Pendidikan</h2>
        <div id="previewEducation">
            <div class="item">
                <div class="item-title" id="educationInstitution">Engineering University</div>
                <div class="item-sub" id="educationDuration">Jan 2024 - Jan 2025</div>
                <div class="item-desc">
                    <p id="educationDegree" class="italic">Bachelor of Design in Process Engineering</p>
                    <ul id="educationDescription">
                        <li>Relevant coursework in Process Design and Project Management.</li>
                        <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
                        <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2>Keahlian</h2>
        <div id="previewSkill">
            <ul>
                <li>Prototyping Tools</li>
                <li>User Research</li>
                <li>Interaction Design</li>
                <li>Visual Design</li>
                <li>Accessibility</li>
                <li>Responsive Design</li>
            </ul>
        </div>
    </section>

    <section>
        <h2>Bahasa</h2>
        <div id="previewBahasa">
            <ul>
                <li>English</li>
                <li>French</li>
                <li>Mandarin</li>
            </ul>
        </div>
    </section>

    <section>
        <h2>Sertifikat</h2>
        <div id="previewCertificate">
            <ul>
                <li>Professional Design Engineer (PDE) License</li>
                <li>Project Management Tech (PMT)</li>
                <li>Structural Process Design (SPD)</li>
            </ul>
        </div>
    </section>

    <section>
        <h2>Hobi</h2>
        <div id="previewHobby">
            <ul>
                <li>Tenis Lapangan</li>
            </ul>
        </div>
    </section>

</body>
</html>
