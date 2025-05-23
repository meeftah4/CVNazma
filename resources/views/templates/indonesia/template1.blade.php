<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f9f9f9;
            color: #333;
            padding: 40px;
            max-width: 850px;
            margin: auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #005bbb;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .profile-info {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .name {
            font-size: 28px;
            font-weight: 700;
            color: #005bbb;
        }
        .contact {
            text-align: right;
            font-size: 14px;
            line-height: 1.6;
        }
        .photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #005bbb;
        }
        section { margin-bottom: 25px; }
        h2 {
            font-size: 18px;
            color: #005bbb;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
            font-weight: 600;
        }
        .item { margin-bottom: 15px; }
        .item-title { font-weight: 600; font-size: 16px; }
        .item-sub { font-size: 14px; color: #555; }
        .item-desc { margin-top: 5px; font-size: 14px; }
        ul { margin-top: 6px; margin-left: 20px; font-size: 14px; }
        .section-columns { display: flex; gap: 40px; flex-wrap: wrap; }
        .section-half { flex: 1; min-width: 350px; }
    </style>
</head>
<body>

<header>
    <div class="profile-info">
        <img src="{{ session('foto') ?? asset('images/CV Profil.jpg') }}" alt="Foto Profil" class="photo">
        <div>
            <div class="name">{{ $profil[0]['name'] ?? 'Nama Lengkap' }}</div>
            <div class="email">
                {{ $profil[0]['email'] ?? '' }}
                @if(!empty($profil[0]['phone'])) {{ $profil[0]['phone'] }} @endif
                @if(!empty($profil[0]['linkedin'])) {{ $profil[0]['linkedin'] }} @endif
                @if(!empty($profil[0]['portfolio'])) {{ $profil[0]['portfolio'] }} @endif
            </div>
        </div>
    </div>
    <div class="contact">{{ $profil[0]['address'] ?? '' }}</div>
</header>

<section>
    <h2>Profil Singkat</h2>
    <div>{{ $profil[0]['description'] ?? '' }}</div>
</section>

<section>
    <h2>Pengalaman Kerja</h2>
    <div>
        @foreach($pengalamankerja ?? [] as $item)
            <div class="item">
                <div class="item-title"><strong>{{ $item['companyName'] ?? $item['company'] ?? '' }}</strong> – {{ $item['jobPosition'] ?? $item['position'] ?? '' }}</div>
                <div class="item-sub">
                    {{ $item['jobStartDate'] ?? $item['startDate'] ?? '' }} – 
                    @if(!empty($item['isPresent']) && $item['isPresent'])
                        Present
                    @else
                        {{ $item['jobEndDate'] ?? $item['endDate'] ?? '' }}
                    @endif
                    @if(!empty($item['jobCity']) || !empty($item['location']))
                        | {{ $item['jobCity'] ?? $item['location'] }}
                    @endif
                </div>
                <div class="item-desc">{!! nl2br(e($item['jobDescription'] ?? $item['description'] ?? '')) !!}</div>
            </div>
        @endforeach
    </div>
</section>

<section>
    <h2>Proyek</h2>
    <div>
        @foreach($proyek ?? [] as $item)
            <div class="item">
                <div class="item-title">{{ $item['projectName'] ?? '' }} – {{ $item['projectPosition'] ?? $item['role'] ?? '' }}</div>
                <div class="item-sub">{{ $item['projectStartDate'] ?? $item['startDate'] ?? '' }} – {{ $item['projectEndDate'] ?? $item['endDate'] ?? '' }}</div>
                <div class="item-desc">{!! nl2br(e($item['projectDescription'] ?? $item['description'] ?? '')) !!}</div>
            </div>
        @endforeach
    </div>
</section>

<section>
    <h2>Pendidikan</h2>
    <div>
        @foreach($pendidikan ?? [] as $item)
            <div class="item">
                <div class="item-title">{{ $item['educationInstitution'] ?? '' }}@if(!empty($item['educationCity'])) - {{ $item['educationCity'] }}@endif</div>
                <div class="item-sub">
                    {{ $item['educationStartDate'] ?? '' }}@if(!empty($item['educationEndDate'])) - {{ $item['educationEndDate'] }}@endif
                </div>
                @if(!empty($item['educationDegree']))
                    <div class="item-degree">{{ $item['educationDegree'] }}</div>
                @endif
                @if(!empty($item['educationDescription']))
                    <div class="item-desc">{!! nl2br(e($item['educationDescription'])) !!}</div>
                @endif
            </div>
        @endforeach
    </div>
</section>

<div class="section-columns">
    <div class="section-half">
        <section>
            <h2>Keahlian</h2>
            <div>
                <ul>
                    @foreach($keahlian ?? [] as $item)
                        <li>{{ $item['skillName'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section>
            <h2>Bahasa</h2>
            <div>
                <ul>
                    @foreach($bahasa ?? [] as $item)
                        <li>{{ $item['languageName'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>

    <div class="section-half">
        <section>
            <h2>Sertifikat</h2>
            <div>
                <ul>
                    @foreach($sertifikat ?? [] as $item)
                        <li>{{ $item['certificateName'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section>
            <h2>Hobi</h2>
            <div>
                <ul>
                    @foreach($hobi ?? [] as $item)
                        <li>{{ $item['hobbyName'] ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</div>

</body>
</html>
