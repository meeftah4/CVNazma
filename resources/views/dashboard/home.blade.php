@extends('dashboard.components.index')

@section('title', 'Dashboard')

@section('dahboard-content')
<style>
    .dashboard-bg {
        background: #F4F8FF;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }
    .dashboard-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .dashboard-header img {
        width: 3rem;
        height: 3rem;
        margin-right: 1rem;
    }
    .dashboard-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .dashboard-desc {
        color: #01287E;
    }
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-top: 2rem;
    }
    @media (min-width: 768px) {
        .dashboard-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .dashboard-card {
        background: #eff6ff;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.07);
        transition: box-shadow 0.2s;
    }
    .dashboard-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }
    .dashboard-icon {
        display: flex;
        align-items: center;
        background: #eff6ff;
        padding: 0.75rem;
        border-radius: 9999px;
        margin-right: 1rem;
    }
    .dashboard-icon.blue { background: #dbeafe; color: #2563eb; }
    .dashboard-icon.green { background: #dcfce7; color: #16a34a; }
    .dashboard-icon.red { background: #fee2e2; color: #dc2626; }
    .dashboard-card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #01287E;
    }
    .dashboard-card-title.green { color: #16a34a; }
    .dashboard-card-title.red { color: #dc2626; }
    .dashboard-card-value {
        margin-top: 0.25rem;
        font-size: 1.875rem;
        font-weight: bold;
    }
    .dashboard-card-value.blue { color: #01287E; }
    .dashboard-card-value.green { color: #16a34a; }
    .dashboard-card-value.red { color: #dc2626; }
    .grafik-title {
        color: #01287E;
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 1rem;
    }
</style>
<div class="dashboard-bg">
    <div class="dashboard-header">
        <img src="https://img.icons8.com/ios-filled/50/4e73df/admin-settings-male.png" alt="Admin Icon">
        <div>
            <h2 class="dashboard-title">Selamat Datang Admin Cv Nazma!</h2>
            <p class="dashboard-desc">Kelola pengaturan website dan pengguna Anda di sini!</p>
        </div>
    </div>
    <div class="dashboard-grid">
        <div class="dashboard-card">
            <div class="flex items-center">
                <div class="dashboard-icon blue">
                    <!-- Icon user di lingkaran biru -->
                    <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                        <circle cx="24" cy="24" r="22" fill="#dbeafe" stroke="#01287E" stroke-width="4"/>
                        <path d="M24 24c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm0 4c-5.33 0-10 2.238-10 5v3h20v-3c0-2.762-4.67-5-10-5z" fill="#01287E"/>
                    </svg>
                </div>
                <div>
                    <h3 class="dashboard-card-title">Total User</h3>
                    <p class="dashboard-card-value blue">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="flex items-center">
                <div class="dashboard-icon green">
                    <!-- Icon transaksi -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 8V6a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2v-2M7 12h14m-3-3l3 3-3 3"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="dashboard-card-title green">Jumlah Transaksi</h3>
                    <p class="dashboard-card-value green">{{ $totalTransaksiBulanIni ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="flex items-center">
                <div class="dashboard-icon red">
                    <!-- Icon Rupiah di lingkaran -->
                    <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                        <circle cx="24" cy="24" r="22" fill="#fee2e2" stroke="#dc2626" stroke-width="4"/>
                        <text x="24" y="27" text-anchor="middle" fill="#dc2626" font-size="18" font-family="Arial, sans-serif" font-weight="bold" dominant-baseline="middle">Rp</text>
                    </svg>
                </div>
                <div>
                    <h3 class="dashboard-card-title red">Pendapatan Bulan Ini</h3>
                    <p class="dashboard-card-value red">
                        Rp. {{ number_format($pendapatanBulanIni ?? 0, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="dashboard-card" style="margin-top:2rem;">
    <div class="grafik-title">
        Pendapatan 6 Bulan Terakhir
    </div>
    <canvas id="pendapatanChart" height="100"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data statis FE
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
    const pendapatan = [1200000, 1500000, 900000, 2000000, 1750000, 2200000];

    const ctx = document.getElementById('pendapatanChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: pendapatan,
                borderColor: '#dc2626',
                backgroundColor: 'rgba(220,38,38,0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#dc2626',
                pointBorderColor: '#fff',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endsection