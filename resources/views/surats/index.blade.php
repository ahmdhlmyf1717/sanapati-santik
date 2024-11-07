<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - Daftar Surat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            background-color: #f3f3f3da;
            animation: fadeIn 2.5s ease;
            table-layout: fixed;
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

        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 80px;
            /* Lebar untuk kolom No */
        }

        .table th:nth-child(7),
        .table td:nth-child(7) {
            width: 120px;
            /* Lebar untuk kolom aksi */
            min-width: 120px;
            /* Memastikan lebar minimum */
            padding: 8px;
        }

        /* pagination */
        .pagination {
            margin: 20px 0 0 0;
            justify-content: center;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .page-link {
            color: #007bff;
            padding: 0.5rem 1rem;
        }

        .page-link:hover {
            background-color: #e9ecef;
            color: #0056b3;
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

        /* action button */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: center;
            justify-content: center;
        }

        .action-buttons .btn {
            line-height: 1.2;
            padding: 6px 10px;
            font-size: 12px;
            width: 30px;
            /* Atur lebar tombol sama */
            border-radius: 5px;
            text-align: center;
            /* Pusatkan teks atau ikon */
        }


        .action-buttons .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .action-buttons .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .action-buttons .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .action-buttons .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        /* Optional: Hover effects */
        .action-buttons .btn:hover {
            opacity: 0.8;
        }
    </style>

</head>

<body>

    <!-- Sidebar -->
    @include('layouts.sidebar')



    <!-- Main Content -->
    <div class="main-content">
        <div class="container">

            <div class="text-center">
                <h1 class="h2 fw-bold pt-2 pb-2 mb-3"
                    style="display: inline-block; border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                    DAFTAR SURAT
                </h1>
            </div>


            <!-- Form Filter untuk Menampilkan Data -->
            <form action="{{ route('surats.index') }}" method="GET" class="d-inline">
                <label for="month">Bulan :</label>
                <select name="month" id="month" class="form-control d-inline w-auto mt-3">
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>

                <label for="year">Tahun :</label>
                <input type="number" name="year" id="year" value="{{ request('year', date('Y')) }}"
                    class="form-control d-inline w-auto" min="2000" max="{{ date('Y') }}">

                <button type="submit" class="btn btn-gradient" style="margin-left: 10px; color: white;"
                    onclick="return validateMonth()">
                    <i class="bi bi-funnel-fill"></i> Filter
                </button>

            </form>

            <style>
                .btn-gradient {
                    background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
                    border: none;
                    transition: background 0.3s ease, box-shadow 0.3s ease;
                }

                .btn-gradient:hover {
                    background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                }

                .data-title {
                    font-size: 1rem;
                    font-weight: 500;
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                    color: #616161;
                }

                .data-title i {
                    color: #007bff;
                }
            </style>

            <div class="mt-4">
                <h3 class="data-title"><i class="bi bi-info-circle-fill"></i> Surat yang Ditemukan Berdasarkan Bulan
                </h3>
            </div>
            <!-- Tabel Menampilkan Data Berdasarkan Filter -->
            @if ($surats->isNotEmpty())
                <div class="table-responsive mt-3">
                    <table class="table  ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Diterima</th>
                                <th>Asal Surat</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Ditujukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $surat)
                                <tr>
                                    <td>{{ $surat->no_register }}</td>
                                    <td>{{ $surat->tanggal_diterima }}</td>
                                    <td>{{ $surat->asal_surat }}</td>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->perihal }}</td>
                                    <td>{{ $surat->ditujukan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $surats->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                <!-- Tambahkan links pagination di sini -->
            @else
                <p class="alert alert-danger mt-3">Data tidak ditemukan untuk bulan dan tahun
                    yang dipilih.</p>
            @endif

            <div class="d-flex justify-content-between align-items-end mt-4">
            </div>
        </div>

        {{-- container bawah --}}
        <div class="container" id="kelola-surat">

            <div class="text-center">
                <h1 class="h2 fw-bold pt-2 pb-2 mb-3"
                    style="display: inline-block; border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                    KELOLA SURAT
                </h1>
            </div>
            <!-- Form Filter untuk Menampilkan Data -->
            <style>
                .data-title {
                    font-size: 1rem;
                    font-weight: 500;
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                    color: #616161;
                }

                .data-title i {
                    color: #007bff;
                }
            </style>
            <!-- Tabel Menampilkan Data Berdasarkan Filter -->
            <div class="d-flex justify-content-between align-items-end mt-4">
                <style>
                    .data-title {
                        margin-bottom: 0;
                    }
                </style>
                <h3 class="data-title">
                    <i class="bi bi-info-circle-fill"></i> Kelola data surat
                </h3>

                {{-- ini container 2 tabel CRUD --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <!-- Input Pencarian -->
                    <form action="{{ route('surats.index') }}" method="GET" id="searchForm"
                        class="d-flex align-items-center mr-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari..."
                            value="{{ request('search') }}" oninput="debouncedSearch()" />

                        <!-- Hidden inputs untuk bulan dan tahun jika diperlukan -->
                        <input type="hidden" name="month" value="{{ request('month') }}">
                        <input type="hidden" name="year" value="{{ request('year') }}">
                    </form>

                    <!-- Tombol Export -->
                    <form id="exportForm" action="{{ route('surats.export') }}" method="GET" class="d-inline">
                        <input type="hidden" name="month" value="{{ request('month') }}" id="exportMonth">
                        <input type="hidden" name="year" value="{{ request('year') }}" id="exportYear">
                        <button type="submit" class="btn btn-success" onclick="return validateExport()">
                            <i class="bi bi-file-excel"></i> Export
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Diterima</th>
                            <th>Asal Surat</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Ditujukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surats as $surat)
                            <tr>
                                <td>{{ $surat->no_register }}</td>
                                <td>{{ $surat->tanggal_diterima }}</td>
                                <td>{{ $surat->asal_surat }}</td>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ $surat->perihal }}</td>
                                <td>{{ $surat->ditujukan }}</td>
                                <td class="action-buttons">
                                    <div class="d-flex">
                                        <a href="{{ route('surats.show', $surat->id) }}" class="btn btn-info btn-sm"
                                            title="Lihat" style="margin-right: 5px;">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('surats.edit', $surat->id) }}"
                                            class="btn btn-warning btn-sm" title="Edit" style="margin-right: 5px;">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('surats.destroy', $surat->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    scrollbarPadding: false
                });
            });
        </script>
    @endif

    <script>
        function validateMonth() {
            const month = document.getElementById('month').value;
            if (!month) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: 'Silahkan pilih bulan terlebih dahulu',
                    confirmButtonColor: '#3085d6',
                    scrollbarPadding: false,
                });
                return false;
            }
            return true;
        }
    </script>

    {{-- search --}}
    <script>
        let debounceTimeout;

        function debouncedSearch() {
            clearTimeout(debounceTimeout);

            debounceTimeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 1000);
        }
    </script>

    {{-- humbergur --}}
    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle("show");
            document.body.classList.toggle("show-sidebar");
        }
    </script>

    {{-- script untuk export alert --}}
    <script>
        function validateExport() {
            const month = document.getElementById('exportMonth').value;
            const year = document.getElementById('exportYear').value;

            if (!month) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: 'Silakan pilih bulan terlebih dahulu kemudian filter sebelum melakukan export.',
                    confirmButtonColor: '#3085d6',
                    scrollbarPadding: false,
                });
                return false; // Mencegah submit form
            }

            if (!year) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: 'Silakan pilih tahun terlebih dahulu kemudian filter sebelum melakukan export.',
                    confirmButtonColor: '#3085d6',
                    scrollbarPadding: false,
                });
                return false; // Mencegah submit form
            }

            return true; // Izinkan submit form jika semua validasi lolos
        }
    </script>

    {{-- jika export tp data tidak ditemukan --}}
    <script>
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Data Tidak Ditemukan',
                text: '{{ session('error') }}',
                confirmButtonColor: '#3085d6',
                scrollbarPadding: false,
            });
        @endif
    </script>



    <!-- Link to Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Footer -->
    @include('layouts.footer')


</body>

</html>
