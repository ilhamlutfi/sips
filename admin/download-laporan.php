<?php

require 'config/core.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('F2', 'DAFTAR DATA PENDAFTARAN')->getColumnDimension('F')->setAutoSize(true);

$sheet->setCellValue('A4', 'No')->getColumnDimension('A')->setAutoSize(true);
$sheet->setCellValue('B4', 'NISN')->getColumnDimension('B')->setAutoSize(true);
$sheet->setCellValue('C4', 'Nama')->getColumnDimension('C')->setAutoSize(true);
$sheet->setCellValue('D4', 'Alamat')->getColumnDimension('D')->setAutoSize(true);
$sheet->setCellValue('E4', 'Tempat/Tanggal Lahir')->getColumnDimension('E')->setAutoSize(true);
$sheet->setCellValue('F4', 'Asal Sekolah')->getColumnDimension('F')->setAutoSize(true);
$sheet->setCellValue('G4', 'Nama Orang Tua')->getColumnDimension('G')->setAutoSize(true);
$sheet->setCellValue('H4', 'Pekerjaan Orang Tua')->getColumnDimension('H')->setAutoSize(true);
$sheet->setCellValue('I4', 'No Telepon')->getColumnDimension('I')->setAutoSize(true);
$sheet->setCellValue('J4', 'Jurusan')->getColumnDimension('J')->setAutoSize(true);
$sheet->setCellValue('K4', 'Tanggal Daftar')->getColumnDimension('K')->setAutoSize(true);

// query ke database
$query = query("SELECT * FROM tbl_pendaftaran JOIN tbl_jurusan ON tbl_pendaftaran.jurusan_id = tbl_jurusan.id_jurusan ORDER BY tanggal_daftar ASC");

// tampil data
$no = 1;
$m = 5; // mulai dari bari ke 5

foreach ($query as $data) {
    $sheet->setCellValue('A' . $m, $no++);
    $sheet->setCellValue('B' . $m, $data['nisn']);
    $sheet->setCellValue('C' . $m, $data['nama']);
    $sheet->setCellValue('D' . $m, $data['alamat']);
    $sheet->setCellValue('E' . $m, $data['tempat'].'/'. date('d-m-Y', strtotime($data['tanggal_lahir'])));
    $sheet->setCellValue('F' . $m, $data['asal_sekolah']);
    $sheet->setCellValue('G' . $m, $data['nama_ortu']);
    $sheet->setCellValue('H' . $m, $data['pekerjaan_ortu']);
    $sheet->setCellValue('I' . $m, $data['no_telepon']);
    $sheet->setCellValue('J' . $m, $data['nama_jurusan']);
    $sheet->setCellValue('K' . $m, date('d-m-Y', strtotime($data['tanggal_daftar'])));

    $m++;
}

// styling
$style = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$baris = $m - 1;
$sheet->getStyle('A4:K' . $baris)->applyFromArray($style);

$writer = new Xlsx($spreadsheet);
$fileName = 'Laporan Data Pendaftaran.xlsx'; // nama file ketika di download
$writer->save($fileName);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize($fileName));
header('Content-Disposition: attachment;filename="' . $fileName . '"');
readfile($fileName); // send file
unlink($fileName); // delete file
exit;