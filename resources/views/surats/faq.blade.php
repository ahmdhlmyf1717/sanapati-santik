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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-VALID_INTEGRITY_HASH" crossorigin="anonymous">


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
            padding-top: 0;
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
    @include('layouts.sidebarFAQ')


    <!-- Main Content -->
    <div class="main-content">
        <!-- FAQ Section -->
        <section class="faq-section mt-3">
            <div class="text-center">
                <h1 class="h2 fw-bold pt-2 pb-2 mb-3"
                    style="display: inline-block; border: 3px solid #5d87ff; padding: 15px 30px; border-radius: 15px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: #333;">
                    PANDUAN
                </h1>
            </div>
            <p class="text-center mb-4 mt-3 text-muted">
                Berikut ini adalah panduan dalam bentuk pertanyaan dan penjelasan yang dapat membantu Anda
                memahami cara menggunakan fitur-fitur utama di
                aplikasi pengelolaan surat berita <strong>Sanapati</strong>. Klik pada pertanyaan untuk melihat
                penjelasannya.
            </p>

            <div class="accordion" id="faqAccordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true">
                            Bagaimana cara menambahkan surat ke dalam sistem?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Navigasikan ke halaman Tambah Surat melalui menu di sidebar atau navbar di dashboard utama.
                            Isi semua detail yang diperlukan, seperti No Register, Tanggal Diterima, Asal Surat, dan
                            informasi lain, lalu unggah file surat. Klik tombol Simpan untuk menambahkan surat ke dalam
                            sistem.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo">
                            Bagaimana cara mengedit informasi surat yang sudah ada?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Buka halaman Daftar Surat dan cari surat yang ingin diedit menggunakan fitur pencarian atau
                            filter tanggal. Klik tombol Edit di samping surat, lalu ubah informasi yang diperlukan. Klik
                            Simpan untuk menyimpan perubahan. Notifikasi akan muncul sebagai konfirmasi bahwa surat
                            telah berhasil diperbarui.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            Bisakah saya melihat surat yang diunggah tanpa mengunduhnya?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, Anda bisa. Navigasikan ke halaman Lihat Surat di Daftar Surat. File surat akan
                            ditampilkan dalam format PDF dengan animasi JavaScript untuk pengalaman interaktif.
                        </div>
                    </div>
                </div>


                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour">
                            Bagaimana cara mencari surat di tabel daftar surat?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda dapat menggunakan fitur pencarian di atas tabel untuk menemukan surat dengan cepat
                            berdasarkan kata kunci tertentu, seperti nomor surat, perihal, atau asal surat.
                        </div>
                    </div>
                </div>

                {{-- FAQ item 5 --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive">
                            Bagaimana cara menggunakan fitur filter?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Gunakan filter bulanan dan tahunan di tabel Daftar Surat untuk menampilkan data surat sesuai
                            dengan periode waktu yang Anda pilih. Anda juga bisa mengunduh laporan berdasarkan filter
                            tersebut.
                        </div>
                    </div>
                </div>

                {{-- FAQ item 6 --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix">
                            Bagaimana cara mengunduh laporan rekap surat?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Klik tombol Export Excel di halaman Daftar Surat. Jika data yang Anda pilih tidak ditemukan
                            (misalnya, surat untuk bulan/tahun tertentu tidak ada), notifikasi akan muncul yang
                            menyatakan bahwa laporan tidak dapat diunduh.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<style>
    .text-muted {
        color: #ffffff !important;
        font-size: 1rem;
        font-style: italic;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        line-height: 1.5;
        max-width: 600px;
        margin: 0 auto;
    }


    .faq-section {
        margin: -40px auto -5px auto;
        background: linear-gradient(180deg, #80bdff 0%, #0354aa 100%);
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 77%;
        margin: auto;
        margin-bottom: -5px;
    }

    .faq-section h2 {
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.8rem;
        text-align: center;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .accordion-item {
        border: none;
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .accordion-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .accordion-button {
        background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
        color: #ffffff;
        font-size: 1.1rem;
        font-weight: 600;
        padding: 18px;
        border: none;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        letter-spacing: 1px;
        transition: background-color 0.3s ease;
        text-align: left;
    }

    .accordion-button:not(.collapsed) {
        background-color: #4279a9;
    }

    .accordion-button:hover {
        background-color: #003268;
    }

    .accordion-button::after {
        filter: drop-shadow(0px 1px 2px rgba(0, 0, 0, 0.3));
        margin-left: auto;
    }

    .accordion-button:focus {
        outline: none;
        /* Menghilangkan outline saat fokus */
    }

    .accordion-button:active {
        outline: none;
        /* Menghilangkan outline saat aktif */
        box-shadow: none;
        /* Pastikan tidak ada bayangan */
    }

    .accordion-body {
        background-color: #f9f9f9;
        padding: 20px;
        font-size: 1rem;
        color: #555;
        line-height: 1.7;
        border-top: 1px solid rgba(159, 19, 19, 0.1);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .accordion-body:hover {
        background-color: #f1f5f8;
        color: #333;
    }

    .accordion-body a {
        color: #3a7bd5;
        text-decoration: underline;
        font-weight: 500;
    }

    .accordion-body a:hover {
        color: #1f2f40;
    }

    /* Icon transition for a smooth effect */
    .accordion-button.collapsed .accordion-icon {
        transform: rotate(0deg);
        transition: transform 0.3s ease;
    }

    .accordion-button:not(.collapsed) .accordion-icon {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }

    @media (max-width: 768px) {
        .accordion-button {
            font-size: 1rem;
            padding: 15px;
        }

        .faq-section {
            padding: 30px;
        }
    }
</style>



</div>

<!-- Link to Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-VALID_INTEGRITY_HASH" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-VALID_INTEGRITY_HASH" crossorigin="anonymous"></script>

<!-- Footer -->
@include('layouts.footer')
</body>

</html>
