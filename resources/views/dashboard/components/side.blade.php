<style>
    .sidebar-bg {
        background: #01287E;
        /* bg-blue-800 */
        color: #fff;
        box-shadow: 0 10px 25px rgba(30,64,175,0.10);
        display: flex;
        flex-direction: column;
        height: 100vh;
        width: 16rem;
    }
    .sidebar-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.5rem;
        background: #01287E;
    }
    .sidebar-logo {
        background: #fff;
        border-radius: 9999px;
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }
    .sidebar-title {
        font-size: 1.25rem;
        font-weight: bold;
        letter-spacing: 0.05em;
        white-space: nowrap;   
        overflow: hidden;        
        text-overflow: ellipsis;  
    }
    .sidebar-menu {
        flex: 1;
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        padding-left: 0;
        padding-right: 0;
    }
    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        transition: all 0.15s;
        font-size: 1rem;
        text-decoration: none;
        color: inherit;
        font-weight: 500;
    }
    .sidebar-link:hover, .sidebar-link.active {
        background: #1e3a8a;
        color: #FFBC5D;
        font-weight: bold;
    }
    .sidebar-link i {
        margin-right: 0.75rem;
        font-size: 1.25rem;
        transition: color 0.15s;
    }
    .sidebar-link:hover i, .sidebar-link.active i {
        color: #FFBC5D;
    }
    .sidebar-main-link {
        margin-top: 1rem;
        box-shadow: 0 2px 8px rgba(37,99,235,0.10);
        font-weight: 600;
    }
    /* Tambahan untuk responsive sidebar */
    .sidebar-hamburger {
        display: none;
        position: fixed;
        top: 1rem;
        left: 1rem;
        z-index: 200;
        background: #01287E;
        border: none;
        color: #fff;
        padding: 0.5rem 0.7rem;
        border-radius: 0.4rem;
        font-size: 1.5rem;
        cursor: pointer;
    }
    .sidebar-hamburger.hide {
        display: none !important;
    }
    @media (max-width: 800px) {
        .sidebar-bg {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 150;
            transform: translateX(-100%);
            transition: transform 0.3s;
        }
        .sidebar-bg.active {
            transform: translateX(0);
        }
        .sidebar-hamburger {
            display: block;
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            left: auto;
            z-index: 201;
            transition: left 0.3s, right 0.3s;
        }
        .sidebar-hamburger.sidebar-right {
            right: 1.5rem !important;
            left: auto !important;
            top: 1.5rem !important;
        }
        body.sidebar-open {
            overflow: hidden;
        }
        .sidebar-overlay {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0; top: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.25);
            transition: opacity 0.3s;
        }
        .sidebar-bg.active ~ .sidebar-overlay,
        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }
    }
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 100;
        display: none;
    }
    .sidebar-bg.active + .sidebar-overlay {
        display: block;
    }
</style>

<button class="sidebar-hamburger" id="sidebarHamburger" onclick="toggleSidebar()">
    <span class="icon-bars">
        <svg width="24" height="24" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
            <line x1="4" y1="7" x2="20" y2="7"/>
            <line x1="4" y1="12" x2="20" y2="12"/>
            <line x1="4" y1="17" x2="20" y2="17"/>
        </svg>
    </span>
    <span class="icon-close" style="display:none;">
        <svg width="24" height="24" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
            <line x1="6" y1="6" x2="18" y2="18"/>
            <line x1="6" y1="18" x2="18" y2="6"/>
        </svg>
    </span>
</button>

<aside class="sidebar-bg">
    <div class="sidebar-header">
        <div>
            <i class="fas fa-user-shield text-blue-800 text-xl"></i>
        </div>
        <span class="sidebar-title">Admin Cv Nazma</span>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="/dashboard" class="sidebar-link{{ request()->is('dashboard') ? ' active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Beranda</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/users" class="sidebar-link{{ request()->is('dashboard/users*') ? ' active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Pengguna</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/transactions" class="sidebar-link{{ request()->is('dashboard/transactions*') ? ' active' : '' }}">
                <i class="fas fa-exchange-alt"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.package.index') }}" class="sidebar-link{{ request()->is('dashboard/package') ? ' active' : '' }}">
                <i class="fas fa-box"></i>
                <span>Paket</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.price') }}" class="sidebar-link{{ request()->is('dashboard/price') ? ' active' : '' }}">
                <i class="fas fa-tags"></i>
                <span>Harga</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/faqs" class="sidebar-link{{ request()->is('dashboard/faqs*') ? ' active' : '' }}">
                <i class="fas fa-question-circle"></i>
                <span>Faq</span>
            </a>
        </li>
        <li>
            <a href="/" class="sidebar-link sidebar-main-link">
                <i class="fas fa-home"></i>
                <span>Halaman Utama</span>
            </a>
        </li>
    </ul>
</aside>
<div class="sidebar-overlay" onclick="toggleSidebar()"></div>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar-bg');
        const overlay = document.querySelector('.sidebar-overlay');
        const hamburger = document.getElementById('sidebarHamburger');
        const iconBars = hamburger.querySelector('.icon-bars');
        const iconClose = hamburger.querySelector('.icon-close');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');
        // Toggle icon & posisi
        if (sidebar.classList.contains('active')) {
            iconBars.style.display = 'none';
            iconClose.style.display = 'inline';
            hamburger.classList.add('sidebar-right');
        } else {
            iconBars.style.display = 'inline';
            iconClose.style.display = 'none';
            hamburger.classList.remove('sidebar-right');
        }
    }
</script>