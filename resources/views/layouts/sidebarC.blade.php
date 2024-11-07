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
        <a href="{{ route('surats.create') }}" class="active">
            <i class="bi bi-envelope-plus menu-icon"></i> Tambah Surat
        </a>
        <a href="{{ route('surats.index') }}">
            <i class="bi bi-inbox menu-icon"></i> Manajemen
        </a>
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
