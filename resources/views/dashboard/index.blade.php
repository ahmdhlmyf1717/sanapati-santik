<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - Dashboard </title>
    <!-- Link to Bootstrap CSS and Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap');

        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        body,
        html {
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            width: 250px;
            background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 4px 0 8px rgba(0, 0, 0, 0.2);
            color: white;
            padding-top: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar .logo-link {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px 0;
            margin-bottom: 20px;
        }

        .sidebar .logo {
            width: 120px;
            height: auto;
            transition: transform 0.3s ease;
        }

        .sidebar .logo-link:hover .logo {
            transform: scale(1.05);
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 0 20px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 10px;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .sidebar-nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .sidebar-nav a.active {
            background: rgba(255, 255, 255, 0.3);
            font-weight: bold;
        }

        .sidebar .logout-link {
            margin-top: auto;
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .sidebar .logout-link:hover {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: #f8f9fa;
        }

        .hamburger {
            display: none;
        }

        body.show-sidebar {
            overflow: hidden;
        }

        /* Responsive sidebar for smaller screens */
        @media (max-width: 768px) {
            .hamburger {
                display: block;
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #007bff;
                color: white;
                border: none;
                font-size: 24px;
                cursor: pointer;
                padding: 10px;
                z-index: 1100;
            }

            .sidebar {
                transform: translateX(100%);
                right: 0;
                left: auto;
                width: 100%;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-nav {
                align-items: center;
            }

            .sidebar-nav a {
                justify-content: center;
            }

            .main-content {
                margin-top: 0;
                padding-top: 20px;
            }
        }

        @media (max-width: 576px) {
            .sidebar a {
                font-size: 14px;
                padding: 10px 5px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            thead th {
                font-size: 14px;
                padding: 10px;
            }

            tbody tr td {
                font-size: 12px;
                padding: 10px;
            }

            .btn {
                font-size: 12px;
                padding: 5px 10px;
            }
        }

        /* Main content container */
        .main-content {
            margin-left: 125px;
            margin-top: 0px;
            padding: 20px;
            width: 100%;
            padding-bottom: 60px;
            flex: 1;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            font-weight: 700;
            margin-bottom: 40px;
        }

        /* Button Styles */
        .btn {
            border-radius: 30px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            opacity: 0.8;
        }

        /* Table styles */
        .table {
            border-radius: 10px;
            overflow: hidden;
            background-color: #eeeeee;
            animation: fadeIn 2.5s ease;
        }

        thead th {
            background-image: linear-gradient(to right, #007bff, #0056b3);
            color: #fff;
            font-weight: 500;
            text-align: center;
            padding: 15px;
        }

        tbody tr {
            text-align: center;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer Styles */
        .footer {
            background-color: #ffffff;
            color: #424242ce;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            border-top: 1px solid #ddd;
        }

        .menu-icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    @include('layouts.sidebarD')



    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <!-- Welcome Banner -->
            <div class="welcome-section bg-primary text-white p-4 mb-4 shadow" style="border-radius: 15px;">
                <div class="row align-items-center">
                    <!-- Text Content Section -->
                    <div class="col-md-8">
                        <h2 class="mb-3">Selamat Datang di PSB<strong> (Pengelolaan Surat Berita)</strong> Sanapati
                        </h2>
                        <p class="mb-0" style="line-height: 1.6;">
                            Berita dari email sanapati merupakan <strong>salah satu layanan yang bekerjasama dengan
                                Badan Siber dan
                                Sandi Negara</strong>.
                        </p>
                    </div>

                    <!-- Image Section -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('assets/images/logoBSSN.png') }}" alt="Sanapati Logo"
                            class="img-fluid rounded animated-logo" style="max-width: 150px;">
                    </div>

                    <style>
                        .animated-logo {
                            animation: pulse 2s infinite;
                        }

                        @keyframes pulse {
                            0% {
                                transform: scale(1);
                            }

                            50% {
                                transform: scale(1.1);
                            }

                            100% {
                                transform: scale(1);
                            }
                        }
                    </style>

                </div>
            </div>



            <!-- Quick Stats Cards -->
            <div class="row g-4 mb-4 justify-content-center">
                <div class="col-md-6 col-lg-3" id="total-surat">
                    <div class="card border-0 shadow-sm rounded-lg hover-effect">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-container bg-primary text-white rounded-circle">
                                    <i class="bi bi-inboxes"></i><!-- Example icon -->
                                </div>
                                <div class="ms-3">
                                    <h6 class="card-title mb-1 text-muted">Total Surat</h6>
                                    <h3 class="mb-0 font-weight-bold text-dark">{{ $totalSurat }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="total-surat">
                    <div class="card border-0 shadow-sm rounded-lg hover-effect">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-container bg-primary text-white rounded-circle">
                                    <i class="bi bi-envelope-check"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="card-title mb-1 text-muted">Surat Selesai</h6>
                                    <h3 class="mb-0 font-weight-bold text-dark">{{ $totalSurat }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="total-surat">
                    <div class="card border-0 shadow-sm rounded-lg hover-effect">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-container bg-primary text-white rounded-circle">
                                    <i class="bi bi-envelope-exclamation"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="card-title mb-1 text-muted">Dalam Proses</h6>
                                    <h3 class="mb-0 font-weight-bold text-dark"> 0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .card {
                    /* transition: transform 0.3s, box-shadow 0.3s; */
                }

                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
                }

                .icon-container {
                    width: 45px;
                    height: 45px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 20px;
                }

                .text-muted {
                    color: #6c757d;
                }

                .text-dark {
                    color: #343a40;
                }

                .hover-effect {
                    border-radius: 15px;
                }

                #total-surat .card-body {
                    padding-left: 20px;
                }

                #total-surat .ms-3 {
                    margin-left: 30px;
                }

                #total-surat .icon-container {
                    background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
                    padding: 15px;
                    width: 50px;
                    height: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50%;
                }
            </style>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Aksi Cepat</h5>
                            <div class="d-grid gap-2">
                                <a href="{{ route('surats.create') }}"
                                    class="btn btn-gradient d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-envelope-plus menu-icon"></i>
                                    Rekap Surat Baru
                                </a>
                                <a href="{{ route('faq') }}"
                                    class="btn btn-gradient d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <i class="bi bi-question-circle menu-icon"></i>
                                    Panduan Pengguna
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0">Daftar Surat Terkait</h5>
                                <a href="{{ route('surats.index') }}" class="text-decoration-none">Lihat Semua</a>
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-success menu-icon"></i>
                                    Pemutakhiran dan penyebaran data
                                </li>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-success menu-icon"></i>
                                    Keamanan siber
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-success menu-icon"></i>
                                    Posisi fungsional dalam kriptografi
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .btn-gradient {
                    background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    transition: background 0.3s ease;
                }
            </style>

            <!-- Recent Activity -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Aktivitas Terkini</h5>
                        <a href="{{ route('surats.index') }}" class="text-decoration-none">Lihat Semua</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table " style="color: rgb(0, 0, 0);">
                            <thead style="color: white">
                                <tr>
                                    <th>No. Surat</th>
                                    <th>Tanggal</th>
                                    <th>Perihal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0XX/XX/20XX</td>
                                    <td>{{ date('d M Y') }}</td>
                                    <td>XXX</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <style>
                        .bg-success {
                            color: #ffffff;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom Styles */
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .welcome-section {
            background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
        }

        .card {}

        .card:hover {
            transform: translateY(-5px);
        }

        .table th {
            font-weight: 600;
            color: #ffffff;
        }

        .badge {
            padding: 0.5em 0.8em;
            font-weight: 500;
        }

        /* Additional Responsive Styles */
        @media (max-width: 768px) {
            .welcome-section {
                text-align: center;
            }

            .card-title {
                font-size: 1rem;
            }
        }
    </style>


    <!-- Link to Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Footer -->
    @include('layouts.footer')
</body>

</html>
