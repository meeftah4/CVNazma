<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Preview CV</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(120deg, #e0e7ff 0%, #f1f5f9 100%);
            position: relative;
            overflow-x: hidden;
        }
        /* Pola dot di luar kertas */
        body::before {
            content: "";
            position: fixed;
            left: 0; top: 0; width: 100vw; height: 100vh;
            background: url('data:image/svg+xml;utf8,<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="2" fill="%236366f1" fill-opacity="0.08"/></svg>');
            z-index: 0;
            pointer-events: none;
        }
        /* Ornamen swirl */
        .swirl {
            position: fixed;
            z-index: 0;
            pointer-events: none;
        }
        .swirl1 {
            left: -120px; top: -120px;
            width: 300px; height: 300px;
            background: radial-gradient(circle at 60% 40%, #6366f1 0%, #e0e7ff 80%);
            border-radius: 50%;
            opacity: 0.18;
            filter: blur(2px);
        }
        .swirl2 {
            right: -80px; bottom: -80px;
            width: 220px; height: 220px;
            background: radial-gradient(circle at 40% 60%, #fbbf24 0%, #f1f5f9 80%);
            border-radius: 50%;
            opacity: 0.13;
            filter: blur(2px);
        }
        .a4-preview {
            background: #fff;
            margin: 48px 0;
            padding: 0;
            width: 794px;
            min-height: 1123px;
            max-width: 100vw;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            border-radius: 22px;
            /* Efek kertas: shadow dan border lembut saja */
            box-shadow:
                0 8px 32px 0 rgba(31, 41, 55, 0.18),
                0 1.5px 6px rgba(0,0,0,0.10);
            border: 1.5px solid #e5e7eb;
            animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) both;
            transition: box-shadow 0.3s, border-color 0.3s;
            overflow: hidden;
        }
        .a4-preview:hover {
            box-shadow:
                0 16px 48px 0 rgba(31, 41, 55, 0.22),
                0 3px 12px rgba(0,0,0,0.13);
            border-color: #6366f1;
        }
        .preview-content {
            padding: 48px 56px 36px 56px;
            position: relative;
            background-color: white;
            min-height: 900px;
        }
        @media (max-width: 820px) {
            .a4-preview {
                width: 100vw;
                min-width: 0;
                padding: 0;
                border-radius: 0;
                margin: 0;
            }
            .preview-content {
                padding: 20px;
            }
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px);}
            100% { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="swirl swirl1"></div>
    <div class="swirl swirl2"></div>
    <div class="a4-preview">
        <div class="preview-content">
            {!! $content !!}
        </div>
    </div>
    <script>
        // Efek hover tilt
        const preview = document.querySelector('.a4-preview');
        preview.addEventListener('mousemove', (e) => {
            const x = e.clientX - preview.getBoundingClientRect().left;
            const y = e.clientY - preview.getBoundingClientRect().top;
            const centerX = preview.offsetWidth / 2;
            const centerY = preview.offsetHeight / 2;
            const angleX = (y - centerY) / 20;
            const angleY = (centerX - x) / 20;
            preview.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateY(-2px)`;
        });
        preview.addEventListener('mouseleave', () => {
            preview.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
        });
    </script>
</body>
</html>