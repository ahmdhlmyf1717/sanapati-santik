<button class="hamburger" onclick="toggleSidebar()">☰</button>
<div class="sidebar">
    <a href="#" class="logo-link">
        <img class="logo" src="{{ asset('assets/images/kominfo-jbg.png') }}" alt="Logo"
            style="width: 100px; height: auto; margin: 20px auto; display: block;">
    </a>
    <nav class="sidebar-nav">
        <a href="{{ route('dashboard') }}">
            <i class="bi bi-house-door menu-icon"></i> Dashboard
        </a>
        <a href="{{ route('surats.create') }}">
            <i class="bi bi-envelope-plus menu-icon"></i> Tambah Surat
        </a>

        <div class="nav-group">
            <a href="#" class="has-submenu" onclick="toggleSubmenu(this, event)">
                <span><i class="bi bi-inbox menu-icon"></i>Manajemen</span>
                <i class="bi bi-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu {{ request()->is('surats*') ? 'show' : '' }} mt-2">
                <li>
                    <a href="{{ route('surats.index') }}">
                        <i class="bi bi-list menu-icon"></i> Daftar Surat
                    </a>
                </li>
                <li>
                    <a href="#kelola-surat">
                        <i class="bi bi-inboxes menu-icon"></i> Kelola Surat
                    </a>
                </li>
            </ul>
        </div>

        <a href="{{ route('faq') }}">
            <i class="bi bi-question-circle menu-icon"></i> Panduan
        </a>
        <a href="{{ route('logout') }}" class="logout-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right menu-icon"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</div>

<style>
    .sidebar-nav .submenu {
        display: none;
        list-style-type: none;
        padding-left: 20px;
        margin: 0;
    }

    .sidebar-nav .submenu.show {
        display: block;
    }

    .submenu-icon {
        transition: transform 0.3s ease;
    }

    .has-submenu.active .submenu-icon {
        transform: rotate(180deg);
    }

    .has-submenu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 15px;
        text-decoration: none;
        color: inherit;
    }

    .submenu li a {
        display: block;
        padding: 8px 15px;
        text-decoration: none;
        color: inherit;
    }

    .nav-group {
        margin: 5px 0;
    }

    .submenu {
        transition: all 0.3s ease-in-out;
        overflow: hidden;
    }
</style>

<script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('collapsed');
    }

    function toggleSubmenu(element, event) {
        event.preventDefault();
        element.classList.toggle('active');

        const submenu = element.nextElementSibling;
        if (submenu) {
            submenu.classList.toggle('show');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {

        const currentPath = window.location.pathname;

        if (currentPath.includes('surats')) {
            const manajemenLink = document.querySelector('.has-submenu');
            const submenu = document.querySelector('.submenu');

            if (manajemenLink && submenu) {
                manajemenLink.classList.add('active');
                submenu.classList.add('show');
            }
        }
    });
</script>
