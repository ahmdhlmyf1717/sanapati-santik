<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard dengan Sidebar</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 20px;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar a {
            color: #adb5bd;
            font-size: 1rem;
            padding: 15px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a .icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar .active {
            background-color: #007bff;
            color: #fff;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h3 class="text-center text-white mb-4">My Dashboard</h3>
        <a href="#" class="active">
            <span class="icon">🏠</span> Home
        </a>
        <a href="#">
            <span class="icon">📄</span> Daftar Surat
        </a>
        <a href="#">
            <span class="icon">📥</span> Kotak Masuk
        </a>
        <a href="#">
            <span class="icon">📝</span> Tambah Surat
        </a>
        <a href="#">
            <span class="icon">⚙️</span> Pengaturan
        </a>
        <a href="#">
            <span class="icon">📊</span> Laporan
        </a>
    </div>

    {{-- @include('surats.index') --}}

    <!-- Link to Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
