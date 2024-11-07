<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - Rincian</title>
    <!-- Link to Bootstrap CSS and Google Fonts -->
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
            /* Animasi untuk kemunculan */
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
            /* Mencegah halaman bergeser saat sidebar aktif */
        }

        /* Main content container next to the sidebar */
        .main-content {
            margin-left: 125px;
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

        .btn {
            border-radius: 30px;
            padding: 8px 16px;
            /* Increased padding for better touch targets */
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            border: none;
            /* Remove default border */
            cursor: pointer;
            /* Change cursor to pointer */
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
            /* Add hover effect */
        }

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

        /* Pastikan kolom aksi memiliki ketinggian yang sama */
        .action-buttons {
            display: flex;
            flex-direction: column;
            /* Mengatur tombol dalam susunan vertikal */
            gap: 5px;
            /* Menambahkan jarak antar tombol */
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .action-buttons .btn {
            line-height: 1.2;
            padding: 6px 8px;
        }


        /* Terapkan padding konsisten di semua kolom */
        table.table tbody tr td {
            padding: 15px;
            vertical-align: middle;
            /* Menjaga konten tetap rata tengah */
        }




        .footer {
            background-color: #ffffff;
            color: #424242ce;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            border-top: 1px solid #ddd;
        }

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
                /* Tersembunyi di sisi kanan */
                right: 0;
                left: auto;
                width: 100%;
            }

            .sidebar.show {
                transform: translateX(0);
                /* Muncul dari kanan */
            }

            .sidebar-nav {
                align-items: center;
            }

            .sidebar-nav a {
                justify-content: center;
            }

            .main-content {
                margin-top: 0;
                /* Menghilangkan margin-top di layar kecil */
                padding-top: 20px;
                /* Sesuaikan padding-top agar tidak terlalu rapat */
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

        .menu-icon {
            margin-right: 10px;
        }

        .btn-success {
            background-image: linear-gradient(to right, #28a745, #218838);
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-image: linear-gradient(to right, #218838, #1e7e34);
        }

        .btn-primary {
            background-image: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-image: linear-gradient(to right, #0056b3, #004085);
        }

        .menu-icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    @include('layouts.sidebar')



    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="text-left">
                    <a href="{{ route('surats.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>

                <div class="flex-grow-1 text-center">
                    <h1 class="h2 fw-bold pt-2 pb-2 mb-3"
                        style="display: inline-block; border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                        DETAIL
                    </h1>
                </div>
            </div>

            <div class="content-row d-flex">

                <!-- Information Column -->
                <div class="info-col" style="flex: 1; margin-right: 20px;">
                    <p><strong>No Register:</strong> {{ $surat->no_register }}</p>
                    <p><strong>Tanggal Diterima:</strong> {{ $surat->tanggal_diterima }}</p>
                    <p><strong>Asal Surat:</strong> {{ $surat->asal_surat }}</p>
                    <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
                    <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
                    <p><strong>Ditujukan:</strong> {{ $surat->ditujukan }}</p>
                    <p><strong>Tanggal Diteruskan:</strong> {{ $surat->tanggal_diteruskan }}</p>
                    <p><strong>Keterangan:</strong> {{ $surat->keterangan }}</p>
                </div>

                <!-- PDF Viewer Column -->
                <div class="pdf-col" style="flex: 1;">
                    @if ($surat->file_path)
                        <iframe src="{{ asset('storage/' . $surat->file_path) }}" class="pdf-viewer"></iframe>
                    @else
                        <p>Tidak ada file surat.</p>
                    @endif
                </div>
            </div>

            <style>
                .content-row {
                    display: flex;
                    /* Ensure the row is a flex container */
                    margin-top: 20px;
                    /* Space above the row */
                }

                .info-col {
                    background-color: #f9f9f9;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }

                .info-col p {
                    font-family: 'Poppins', sans-serif;
                    font-size: 16px;
                    color: #333;
                    line-height: 1.5;
                }

                .info-col strong {
                    font-weight: bold;
                    color: #007bff;
                }

                .pdf-col {
                    background-color: #ffffff;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    padding: 15px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100%;
                    /* Make sure it stretches to fill the height */
                }

                .pdf-viewer {
                    width: 100%;
                    height: 500px;
                    /* Set a fixed height for the PDF viewer */
                    border: none;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }

                .pdf-col h2 {
                    margin-bottom: 15px;
                    /* Space below the title */
                    font-family: 'Poppins', sans-serif;
                    /* Custom font */
                    color: #007bff;
                    /* Title color */
                    text-align: center;
                    /* Center align title */
                    font-weight: bold;
                    /* Bold title */
                }

                .pdf-col p {
                    color: #666;
                    /* Light gray text for any description */
                    text-align: center;
                    /* Center align description */
                    font-size: 14px;
                    /* Font size for description */
                }
            </style>


        </div>
    </div>



    <!-- Link to Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Footer -->
    @include('layouts.footer')
</body>

</html>
