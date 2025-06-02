<!-- filepath: d:\Magang\CVNazma\resources\views\templates\cv1.blade.php -->
<style>
#previewProfil, #previewExperience, #previewProject, #previewSkill, #previewEducation, #previewBahasa {
    word-wrap: break-word; /* Membungkus kata yang panjang */
    overflow-wrap: break-word; /* Alternatif untuk browser lain */
    white-space: normal; /* Pastikan teks tidak dalam satu baris */
}
</style>

<header class="mb-2 flex flex-col sm:flex-row items-start gap-4" id="headerPreview">
    {{-- Foto akan ditampilkan di sini secara dinamis --}}
    <img id="cvPhotoPreview" src="" alt="Foto Profil" class="w-24 h-24 object-cover hidden" />
    
    <div>
        <h1 id="previewName" class="text-3xl font-bold text-gray-900">Nama Lengkap</h1>
        <p id="previewContact" class="text-sm text-gray-600">nama@email.com | 0812-3456-7890 | LinkedIn Profile URL | Portfolio/Website URL</p>
        <p id="previewAddress" class="text-sm text-gray-600">Jakarta, Indonesia</p>
    </div>
</header>

<section class="mb-6">
    <h2 class="border-b border-gray-300 pb-1 mb-2"></h2>
    <div id="previewProfil" class="mt-4 break-words">
        <p class="text-gray-600">
            Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, 
            misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah kemampuan [contoh: desain visual, riset pengguna, 
            dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap berkontribusi secara profesional dalam tim.
        </p>
    </div>
</section>
<section id="sectionPengalamanKerja" class="mb-6">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Pengalaman Kerja</h2>
    <div id="previewPengalamanKerja" class="text-sm text-gray-600">
        <div class="mb-4">
            <div class="flex justify-between items-center">
                <p><strong id="companyName">Instrument Tech</strong> - <span id="jobCity">Sleman</span></p>
                <p class="text-gray-500" id="jobDuration">Jan 2024 - Jan 2025</p>
            </div>
            <p id="jobPosition">Marcelle Program</p>
            <ul id="jobDescription" class="list-disc pl-5 text-gray-600">
                <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
                <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
                <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
            </ul>
        </div>
    </div>
</section>

<section id="sectionProyek" class="mb-6">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Proyek</h2>
    <div id="previewProject" class="text-sm text-gray-600">
        <!-- Data proyek akan ditampilkan di sini -->
        <div class="mb-4">
            <div class="flex justify-between items-center">
                <p><strong>Industrial Basics and General Application</strong></p>
                <p class="text-gray-500">Jan 2023 - Jun 2023</p>
            </div>
            <p class="italic text-gray-600">University of Engineering Process Cohort</p>
            <ul class="list-disc pl-5 text-gray-600">
                <li>Automotive Technology.</li>
                <li>Technological Advancements within the current Chemical & Process Industry.</li>
                <li>Other relevant information.</li>
            </ul>
        </div>
    </div>
</section>

<section id="sectionKeahlian" class="mb-4">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Keahlian</h2>
    <div id="previewSkill" class="text-sm text-gray-600 grid grid-cols-3">
        <!-- Data keahlian akan ditampilkan di sini -->
        <p>Prototyping Tools</p>
        <p>User Research</p>
        <p>Interaction Design</p>
        <p>Visual Design</p>
        <p>Accessibility</p>
        <p>Responsive Design</p>
    </div>
</section>

<section id="sectionPendidikan" class="mb-6">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Pendidikan</h2>
    <div id="previewEducation" class="text-sm text-gray-600">
        <div class="mb-4">
            <div class="flex justify-between items-center">
                <p><strong id="educationInstitution">Engineering University</strong></p>
                <p class="text-gray-500" id="educationDuration">Jan 2024 - Jan 2025</p>
            </div>
            <p id="educationDegree" class="italic text-gray-600">Bachelor of Design in Process Engineering</p>
            <ul id="educationDescription" class="list-disc pl-5 text-gray-600">
                <li>Relevant coursework in Process Design and Project Management.</li>
                <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
                <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
            </ul>
        </div>
    </div>
</section>

<section class="mb-6">
    <h2 class="text-xl font-semibold border-b border-gray-300 pb-1 mb-2">Informasi Tambahan</h2>
    <div class="text-sm text-gray-600">
    <div id="previewBahasa">
        <p class="text-gray-500"><strong>Bahasa:</strong> English, French, Mandarin</p>
    </div>
    <div id="previewCertificate">
        <p class="text-gray-500"><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>
    </div>
    <div id="previewHobby">
        <p class="text-gray-500"><strong>Hobi:</strong> Tenis Lapangan</p>
    </div>
    </div>
</section>


