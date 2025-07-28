<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Kategori;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ExportfileController extends Controller
{
    public function export_supplier(Request $request)
    {
        $modelSupplier = new Supplier();
        $datasupplier = $modelSupplier->get();

        // export file pdf
        if ($request->get('export') == 'supplier') {
            $pdf = Pdf::loadView('pdf.pdf_supplier', ['supplier' => $datasupplier]);
            return $pdf->download('Data_Supplier.pdf');
        }

        // export file excel
        if ($request->get('export_excel') == 'supplier') {
            setlocale(LC_ALL, 'id-ID', 'id_ID');
            $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

            $spreadsheet = new Spreadsheet();
            $sheetBaris = $spreadsheet->getActiveSheet();

            $header = 'SI INVENTORY';
            $waktu = $tglHead;

            $sheetBaris->setCellValue('A1', $header);
            $sheetBaris->setCellValue('A2', $waktu);

            $sheetBaris->setCellValue('A4', 'No');
            $sheetBaris->setCellValue('B4', 'KD Supplier');
            $sheetBaris->setCellValue('C4', 'Nama Supplier');
            $sheetBaris->setCellValue('D4', 'Alamat');
            $sheetBaris->setCellValue('E4', 'Telepon');

            $baris = 5;
            $no = 1;
            foreach ($datasupplier as $data) :
                $sheetBaris->setCellValue('A' . $baris, $no++);
                $sheetBaris->setCellValue('B' . $baris, $data->kd_supplier);
                $sheetBaris->setCellValue('C' . $baris, $data->nama_supplier);
                $sheetBaris->setCellValue('D' . $baris, $data->alamat);
                $sheetBaris->setCellValue('E' . $baris, $data->telepon);
                $baris++;
            endforeach;

            // style judul
            $sheetBaris->getStyle('A1')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 15,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);

            // style kolom header
            $sheetBaris->getStyle('A4:E4')->applyFromArray([
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'DCE6F1'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                ],
            ]);

            // Menentukan batas akhir data
            $lastRow = $baris - 1;

            // Tambahkan border ke seluruh tabel
            $sheetBaris->getStyle('A4:E' . $lastRow)->applyFromArray([
                'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
            ]);

            // Mengatur ukuran kolom agar otomatis menyesuaikan isi
            foreach (range('B', 'E') as $col) {
                $sheetBaris->getColumnDimension($col)->setAutoSize(true);
            }

            // Set nama file
            $fileName = 'Data Supplier.xlsx';
            $writer = new Xlsx($spreadsheet);

            // Set header agar browser mengenali file sebagai Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            exit();
        }

        return view('halaman.export_file.export_supplier', [
            'title' => 'Export Data Supplier',
            'active_export' => 'Export_Supplier',
            'active' => 'Export',
            'supplier' => $datasupplier,
        ]);
    }

    public function export_barang(Request $request)
    {
        $modelBarang = Barang::query();
        $modelKategori = Kategori::query();
        $dataKategori = $modelKategori->get();

        // mencari data barang
        $cariDataKategori = $request->get('cari_kategori');
        if ($cariDataKategori) {
            $databarang = $modelBarang->where('kategori_id', $cariDataKategori);
        }

        $databarang = $modelBarang->get();

        // eksport file pdf
        if ($request->get('export') == 'barang') {
            if ($request->get('kategori')) {
                $kategori = $request->get('kategori');
                $databarang = $modelBarang->where('kategori_id', $kategori)->get();
                $kategoriBrg = Kategori::find($kategori);

                $pdf = Pdf::loadView('pdf.pdf_barang', ['barang' => $databarang, 'kategori' => $kategoriBrg->kategori]);
                return $pdf->download('Data_Barang (Kategori).pdf');
            } else {
                $pdf = Pdf::loadView('pdf.pdf_barang', ['barang' => $databarang, 'kategori' => 'Semua']);
                return $pdf->download('Data_Barang.pdf');
            }
        }

        // eksport file excel
        if ($request->get('export_excel') == 'barang') {
            if ($request->get('kategori_excel')) {
                $kategori = $request->get('kategori_excel');
                $databarang = $modelBarang->where('kategori_id', $kategori)->get();
                $kategoriBrg = Kategori::find($kategori);

                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $kategori = $kategoriBrg->kategori;

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Kategori: ' . $kategori);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang');
                $sheetBaris->setCellValue('C5', 'Nama Barang');
                $sheetBaris->setCellValue('D5', 'Kategori');
                $sheetBaris->setCellValue('E5', 'Satuan');
                $sheetBaris->setCellValue('F5', 'Stok Barang');

                $baris = 6;
                $no = 1;
                foreach ($databarang as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barang);
                    $sheetBaris->setCellValue('C' . $baris, $data->nama_barang);
                    $sheetBaris->setCellValue('D' . $baris, $data->kategori->kategori);
                    $sheetBaris->setCellValue('E' . $baris, $data->satuan->satuan);
                    $sheetBaris->setCellValue('F' . $baris, $data->stok_barang);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:F5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:F' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'F') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang (Kategori).xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            } else {
                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $kategori = 'Semua';

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Kategori: ' . $kategori);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang');
                $sheetBaris->setCellValue('C5', 'Nama Barang');
                $sheetBaris->setCellValue('D5', 'Kategori');
                $sheetBaris->setCellValue('E5', 'Satuan');
                $sheetBaris->setCellValue('F5', 'Stok Barang');

                $baris = 6;
                $no = 1;
                foreach ($databarang as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barang);
                    $sheetBaris->setCellValue('C' . $baris, $data->nama_barang);
                    $sheetBaris->setCellValue('D' . $baris, $data->kategori->kategori);
                    $sheetBaris->setCellValue('E' . $baris, $data->satuan->satuan);
                    $sheetBaris->setCellValue('F' . $baris, $data->stok_barang);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:F5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:F' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'F') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang.xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            }
        }

        return view('halaman.export_file.export_barang', [
            'title' => 'Export Data Barang',
            'active_export' => 'Export_Barang',
            'active' => 'Export',
            'barang' => $databarang,
            'kategori' => $dataKategori,
            'request' => $request
        ]);
    }

    public function export_barangmasuk(Request $request)
    {
        $modelBarangmasuk = Barangmasuk::query();
        $cariBulan = $request->get('bulan');
        if ($cariBulan) {
            $databrgmasuk = $modelBarangmasuk->where('tanggal_masuk', 'like', '%' . $cariBulan . '%');
        }

        $databrgmasuk = $modelBarangmasuk->get();

        // export file pdf
        if ($request->get('export') == 'barangmasuk') {
            if ($request->get('bulan')) {
                $bulan = $request->get('bulan');
                $databrgmasuk = $modelBarangmasuk->where('tanggal_masuk', 'like', '%' . $bulan . '%')->get();

                $pdf = Pdf::loadView('pdf.pdf_barangmasuk', ['barangmasuk' => $databrgmasuk]);
                return $pdf->download('Data_Barangmasuk (' . $bulan . ').pdf');
            } else {
                $pdf = Pdf::loadView('pdf.pdf_barangmasuk', ['barangmasuk' => $databrgmasuk]);
                return $pdf->download('Data_Barangmasuk.pdf');
            }
        }

        // eksport file excel
        if ($request->get('export_excel') == 'barangmasuk') {
            if ($request->get('bulan_excel')) {
                $bulan = $request->get('bulan_excel');
                $databrgmasuk = $modelBarangmasuk->where('tanggal_masuk', 'like', '%' . $bulan . '%')->get();

                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $bulanMasuk = $bulan;

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Date: ' . $bulanMasuk);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang Masuk');
                $sheetBaris->setCellValue('C5', 'Tanggal Masuk');
                $sheetBaris->setCellValue('D5', 'Waktu');
                $sheetBaris->setCellValue('E5', 'Nama Barang');
                $sheetBaris->setCellValue('F5', 'Jumlah');
                $sheetBaris->setCellValue('G5', 'Supplier');

                $baris = 6;
                $no = 1;
                foreach ($databrgmasuk as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barangmasuk);
                    $sheetBaris->setCellValue('C' . $baris, $data->tanggal_masuk);
                    $sheetBaris->setCellValue('D' . $baris, $data->created_at->format('H:i'));
                    $sheetBaris->setCellValue('E' . $baris, $data->barang->nama_barang);
                    $sheetBaris->setCellValue('F' . $baris, $data->jumlah);
                    $sheetBaris->setCellValue('G' . $baris, $data->supplier->nama_supplier);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:G5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:G' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'G') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang Masuk (' . $bulanMasuk . ').xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            } else {
                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $bulanMasuk = 'Semua';

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Date: ' . $bulanMasuk);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang Masuk');
                $sheetBaris->setCellValue('C5', 'Tanggal Masuk');
                $sheetBaris->setCellValue('D5', 'Waktu');
                $sheetBaris->setCellValue('E5', 'Nama Barang');
                $sheetBaris->setCellValue('F5', 'Jumlah');
                $sheetBaris->setCellValue('G5', 'Supplier');

                $baris = 6;
                $no = 1;
                foreach ($databrgmasuk as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barangmasuk);
                    $sheetBaris->setCellValue('C' . $baris, $data->tanggal_masuk);
                    $sheetBaris->setCellValue('D' . $baris, $data->created_at->format('H:i'));
                    $sheetBaris->setCellValue('E' . $baris, $data->barang->nama_barang);
                    $sheetBaris->setCellValue('F' . $baris, $data->jumlah);
                    $sheetBaris->setCellValue('G' . $baris, $data->supplier->nama_supplier);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:G5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:G' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'G') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang Masuk.xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            }
        }

        return view('halaman.export_file.export_barangmasuk', [
            'title' => 'Export Data Barang Masuk',
            'active_export' => 'Export_Barang_Masuk',
            'active' => 'Export',
            'barangmasuk' => $databrgmasuk,
            'request' => $request
        ]);
    }

    public function export_barangkeluar(Request $request)
    {
        $modelBarangkeluar = Barangkeluar::query();
        $cariBulan = $request->get('bulan');
        if ($cariBulan) {
            $databrgkeluar = $modelBarangkeluar->where('tanggal_keluar', 'like', '%' . $cariBulan . '%');
        }

        $databrgkeluar = $modelBarangkeluar->get();

        // export file pdf
        if ($request->get('export') == 'barangkeluar') {
            if ($request->get('bulan')) {
                $bulan = $request->get('bulan');
                $databrgmasuk = $modelBarangkeluar->where('tanggal_keluar', 'like', '%' . $bulan . '%')->get();

                $pdf = Pdf::loadView('pdf.pdf_barangkeluar', ['barangkeluar' => $databrgmasuk]);
                return $pdf->download('Data_Barangkeluar (' . $bulan . ').pdf');
            } else {
                $pdf = Pdf::loadView('pdf.pdf_barangkeluar', ['barangkeluar' => $databrgkeluar]);
                return $pdf->download('Data_Barangkeluar.pdf');
            }
        }

        // eksport file excel
        if ($request->get('export_excel') == 'barangkeluar') {
            if ($request->get('bulan_excel')) {
                $bulan = $request->get('bulan_excel');
                $databrgkeluar = $modelBarangkeluar->where('tanggal_keluar', 'like', '%' . $bulan . '%')->get();

                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $bulanKeluar = $bulan;

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Date: ' . $bulanKeluar);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang Keluar');
                $sheetBaris->setCellValue('C5', 'Tanggal Keluar');
                $sheetBaris->setCellValue('D5', 'Waktu');
                $sheetBaris->setCellValue('E5', 'Nama Barang');
                $sheetBaris->setCellValue('F5', 'Jumlah');
                $sheetBaris->setCellValue('G5', 'Tujuan');

                $baris = 6;
                $no = 1;
                foreach ($databrgkeluar as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barangkeluar);
                    $sheetBaris->setCellValue('C' . $baris, $data->tanggal_keluar);
                    $sheetBaris->setCellValue('D' . $baris, $data->created_at->format('H:i'));
                    $sheetBaris->setCellValue('E' . $baris, $data->barang->nama_barang);
                    $sheetBaris->setCellValue('F' . $baris, $data->jumlah);
                    $sheetBaris->setCellValue('G' . $baris, $data->tujuan);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:G5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:G' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'G') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang Keluar (' . $bulanKeluar . ').xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            } else {
                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $tglHead = strftime("%A, %d %B %Y") . '|' . Carbon::now()->format('H:i:s');

                $spreadsheet = new Spreadsheet();
                $sheetBaris = $spreadsheet->getActiveSheet();

                $header = 'SI INVENTORY';
                $waktu = $tglHead;
                $bulanKeluar = 'Semua';

                $sheetBaris->setCellValue('A1', $header);
                $sheetBaris->setCellValue('A2', $waktu);
                $sheetBaris->setCellValue('A3', 'Date: ' . $bulanKeluar);

                $sheetBaris->setCellValue('A5', 'No');
                $sheetBaris->setCellValue('B5', 'KD Barang Keluar');
                $sheetBaris->setCellValue('C5', 'Tanggal Keluar');
                $sheetBaris->setCellValue('D5', 'Waktu');
                $sheetBaris->setCellValue('E5', 'Nama Barang');
                $sheetBaris->setCellValue('F5', 'Jumlah');
                $sheetBaris->setCellValue('G5', 'Tujuan');

                $baris = 6;
                $no = 1;
                foreach ($databrgkeluar as $data) :
                    $sheetBaris->setCellValue('A' . $baris, $no++);
                    $sheetBaris->setCellValue('B' . $baris, $data->kd_barangkeluar);
                    $sheetBaris->setCellValue('C' . $baris, $data->tanggal_keluar);
                    $sheetBaris->setCellValue('D' . $baris, $data->created_at->format('H:i'));
                    $sheetBaris->setCellValue('E' . $baris, $data->barang->nama_barang);
                    $sheetBaris->setCellValue('F' . $baris, $data->jumlah);
                    $sheetBaris->setCellValue('G' . $baris, $data->tujuan);
                    $baris++;
                endforeach;

                // style judul
                $sheetBaris->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // style kolom header
                $sheetBaris->getStyle('A5:G5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'DCE6F1'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                    ],
                ]);

                // Menentukan batas akhir data
                $lastRow = $baris - 1;

                // Tambahkan border ke seluruh tabel
                $sheetBaris->getStyle('A5:G' . $lastRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                ]);

                // Mengatur ukuran kolom agar otomatis menyesuaikan isi
                foreach (range('B', 'G') as $col) {
                    $sheetBaris->getColumnDimension($col)->setAutoSize(true);
                }

                // Set nama file
                $fileName = 'Data Barang Keluar.xlsx';
                $writer = new Xlsx($spreadsheet);

                // Set header agar browser mengenali file sebagai Excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $fileName . '"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
                exit();
            }
        }

        return view('halaman.export_file.export_barangkeluar', [
            'title' => 'Export Data Barang Keluar',
            'active_export' => 'Export_Barang_Keluar',
            'active' => 'Export',
            'barangkeluar' => $databrgkeluar,
            'request' => $request
        ]);
    }
}
