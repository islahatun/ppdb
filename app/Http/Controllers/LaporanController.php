<?php

namespace App\Http\Controllers;

use App\Models\params;
use App\Models\student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanSiswa()
    {

        $data = [
            'type_menu' => 'report',
            'menu'      => 'Laporan Pendaftaran',


        ];
        return view('pages.laporan.laporan_siswa', $data);

    }
    public function printSiswa(){
        $data = [
            'params'    => params::first(),
            'student'   => student::with('user', 'jurusan')->whereYear('created_at',now()->year)->get()
        ];

        // Render view ke dalam PDF
        $pdf = Pdf::loadView('pages.laporan.print_laporan_siswa', $data)
            ->setPaper([0, 0, 841.89, 1500], 'landscape');
        return $pdf->download('Laporan Pendafataran.pdf');
    }

    public function printKeuangan(){
        $data = [
            'params'    => params::first(),
            'student'   => student::with('user', 'jurusan')->whereYear('created_at',now()->year)->get()
        ];

        // Render view ke dalam PDF
        $pdf = Pdf::loadView('pages.laporan.print_laporan_keuangan', $data)
            ->setPaper([0, 0, 841.89, 1500], 'landscape');
        return $pdf->download('Laporan Pendafataran.pdf');
    }
}
