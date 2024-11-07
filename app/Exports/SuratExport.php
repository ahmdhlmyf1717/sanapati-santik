<?php

namespace App\Exports;

use App\Models\Surat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class SuratExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithEvents, WithCustomStartCell
{
    private $month;
    private $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    private function formatTanggalIndonesia($tanggal)
    {
        if (!$tanggal) return '';

        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $split = explode('-', date('Y-m-d', strtotime($tanggal)));
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function collection()
    {
        // Query dasar
        $query = Surat::query();

        // Filter jika bulan dan tahun tersedia
        if ($this->month && $this->year) {
            $query->whereMonth('tanggal_diterima', $this->month)
                ->whereYear('tanggal_diterima', $this->year);
        }

        // Eksekusi query dan format data
        return $query->get()->map(function ($surat) {
            return [
                $surat->no_register,
                $this->formatTanggalIndonesia($surat->tanggal_diterima),
                $surat->asal_surat,
                $surat->nomor_surat,
                $surat->perihal,
                $surat->ditujukan,
                $this->formatTanggalIndonesia($surat->tanggal_diteruskan),
                $surat->keterangan,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No Register',
            'Tanggal Diterima',
            'Asal Surat',
            'Nomor Surat',
            'Perihal',
            'Ditujukan',
            'Tanggal Diteruskan',
            'Keterangan'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,  // No Register
            'B' => 25,  // Tanggal Diterima
            'C' => 30,  // Asal Surat
            'D' => 25,  // Nomor Surat
            'E' => 40,  // Perihal
            'F' => 25,  // Ditujukan
            'G' => 25,  // Tanggal Diteruskan
            'H' => 30,  // Keterangan
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Konversi angka bulan ke nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $namaBulan = isset($bulanIndonesia[$this->month]) ? $bulanIndonesia[$this->month] : 'Bulan Tidak Valid';
        $namaTahun = $this->year;

        // Atur header dengan bulan dan tahun sesuai filter
        $sheet->mergeCells('A1:H1');
        $sheet->mergeCells('A2:H2');

        $sheet->setCellValue('A1', 'REKAP PENERIMAAN BERITA SANAPATI');
        $sheet->setCellValue('A2', 'BULAN ' . strtoupper($namaBulan) . ' ' . $namaTahun);

        $sheet->getStyle('A1:H2')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Style untuk data lainnya
        $sheet->getStyle('A4:H' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'wrapText' => true,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        return [
            4 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4F81BD'],
                ],
            ],
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $highestRow = $sheet->getHighestRow();

                $sheet->getRowDimension(1)->setRowHeight(30);
                $sheet->getRowDimension(2)->setRowHeight(30);

                $sheet->getRowDimension(4)->setRowHeight(30);

                for ($row = 5; $row <= $highestRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(25);
                }

                $sheet->getStyle('A5:A' . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('B5:B' . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('G5:G' . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->setAutoFilter('A4:H' . $highestRow);
            },
        ];
    }
}
