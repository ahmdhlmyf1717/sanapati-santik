<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - Tambah Surat</title>
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
    @include('layouts.sidebarC')



    <!-- Main Content -->
    <div class="main-content">
        <div class="container">

            <div class="text-center">
                <h1 class="h2 fw-bold pt-2 pb-2 mb-3"
                    style="display: inline-block; border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                    TAMBAH SURAT
                </h1>
            </div>

            <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="no_register" class="form-label"><span class="text-danger">*</span>No</label>
                    <input type="number" name="no_register" id="no_register" class="form-control" required
                        value="{{ $nextRegisterNumber }}">

                </div>

                <div class="mb-3">
                    <label for="tanggal_diterima" class="form-label"><span class="text-danger">*</span>Tanggal
                        Diterima</label>
                    <input type="date" name="tanggal_diterima" id="tanggal_diterima" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="asal_surat" class="form-label"><span class="text-danger">*</span>Asal Surat</label>
                    <input type="text" name="asal_surat" id="asal_surat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nomor_surat" class="form-label"><span class="text-danger">*</span>Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="perihal" class="form-label"><span class="text-danger">*</span>Perihal</label>
                    <input type="text" name="perihal" id="perihal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ditujukan" class="form-label"><span class="text-danger">*</span>Ditujukan</label>
                    <input type="text" name="ditujukan" id="ditujukan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_diteruskan" class="form-label"><span class="text-danger">*</span>Tanggal
                        Diteruskan</label>
                    <input type="date" name="tanggal_diteruskan" id="tanggal_diteruskan" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="file_surat" class="form-label">Upload File Surat (PDF)</label>
                    <input type="file" name="file_surat" id="file_surat" class="form-control" accept=".pdf">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('surats.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>

    <!-- Link to Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('file_surat').addEventListener('change', function() {
            const fileInput = document.getElementById('file_surat');
            const filePath = fileInput.value;
            const allowedExtensions = /(\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Tidak Valid!',
                    text: 'Hanya file berformat PDF yang diperbolehkan. Silakan pilih file lain.',
                    confirmButtonColor: '#d33',
                    scrollbarPadding: false,
                }).then(() => {
                    fileInput.value = ''; // Reset input jika bukan PDF
                });
                return false;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalDiterima = document.getElementById('tanggal_diterima');
            const tanggalDiteruskan = document.getElementById('tanggal_diteruskan');

            tanggalDiterima.addEventListener('change', function() {
                // kalau belum diisi manual, atau masih kosong, baru diisi otomatis
                if (!tanggalDiteruskan.value) {
                    tanggalDiteruskan.value = tanggalDiterima.value;
                }
            });
        });
    </script>



    <!-- Footer -->
    @include('layouts.footer')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan',
                text: '{{ $errors->first() }}',
            });
        </script>
    @endif

</body>

</html>
