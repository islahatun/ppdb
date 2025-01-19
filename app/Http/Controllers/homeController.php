<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\info;
use App\Models\User;
use App\Models\params;
use App\Models\slider;
use App\Models\jurusan;
use App\Models\student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    public function index()
    {
        $data = [
            'type_menu' => '',
            'menu'      => 'Info',
            'form'      => 'Form Info',
            'params'    => params::first(),
            'slider'    => slider::all(),
            'blog'      => blog::all(),
            'info'      => info::all(),
            'jurusan'   => jurusan::all()
        ];
        return view('pages.home.index', $data);
    }

    public function login()
    {
        $data =[
            'params'    => params::first(),
        ];
        return view('pages.auth.login',$data);
    }

    public function login_data(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user   = User::where('email', $request->email)->where('role', 3)->first();
            // $siswa  = student::where('nisn',$user->nisn)->first();
            $request->session()->regenerate();

            if ($user) {
                $message = array(
                    'status' => true,
                    'message' => 'Berhasil Login',
                    'direct'    => '/form-pendaftaran'
                );
            } else {
                $message = array(
                    'status' => true,
                    'message' => 'Berhasil Login',
                    'direct'    => '/dashboard'
                );
            }
            // Redirect ke dashboard
        } else {
            $message = array(
                'status' => false,
                'message' => 'Gagal Login'
            );
        }

        echo json_encode($message);
    }

    public function registration()
    {
        $data =[
            'params'    => params::first(),
        ];

        return view('pages.auth.registration',$data);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:16',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->nisn      = $request->nisn;
        $user->phone     = $request->phone;
        $user->gender    = $request->gender;
        $user->role      = 3;
        $user->password  = Hash::make($request->password);

        if ($user->save()) {
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil di simpan'
            );
        } else {
            $message = array(
                'status' => false,
                'message' => 'Data gagal di simpan'
            );
        }

        echo json_encode($message);
    }

    public function form_pendaftaran()
    {

        $params = params::first();

        $data = [
            'tgl_awal'  => $params->awal_pendaftaran > date('Y-m-d') ? 0 : 1,
            'tgl_akhir' => $params->akhir_pendaftaran < date('Y-m-d') ? 0 : 1,
            'user'      => Auth::user(),
            'jurusan'   => jurusan::all(),
            'params'    => $params
        ];
        return view('pages.auth.form_pendaftaran', $data);
    }

    public function getData()
    {
        $data = student::with('user')->where('user_id', Auth::user()->id)->first();

        if ($data) {
            echo  json_encode(array(
                'success' => true,
                'detail' => $data,
            ));
        } else {
            echo json_encode(array(
                'success' => false,
            ));
        }
    }

    public function save_pendaftaran(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:16',
            'user_id' => 'required',
            'phone' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_ijazah' => 'required',
            'tgl_lahir_ibu' => 'required',
            'tgl_lahir_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_orangtua' => 'required',
            'sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'jurusan_id' => 'required',

        ]);

        $data['validasi'] = 0;

        if ($request->file('ijazah')) {
            $data['ijazah']   = $request->file('ijazah')->store('siswa', 'public');
        }
        if ($request->file('kk')) {
            $data['kk']   = $request->file('kk')->store('siswa', 'public');
        }
        if ($request->file('akta')) {
            $data['akta']   = $request->file('akta')->store('siswa', 'public');
        }
        if ($request->file('profil')) {
            $data['profil']   = $request->file('profil')->store('siswa', 'public');
        }

        $today = now()->format('Ymd'); // Format tanggal: YYYYMMDD
        $lastRecord = student::whereDate('created_at', now())->orderBy('id', 'desc')->first();
        // Tentukan nomor urut berikutnya
        $nextSequence = 1;
        if ($lastRecord) {
            $lastSequence = (int) substr($lastRecord->sequence_number, -3); // Ambil 3 digit terakhir
            $nextSequence = $lastSequence + 1;
        }

        // Format nomor berurutan
        $sequenceNumber = $today . '-' . str_pad($nextSequence, 3, '0', STR_PAD_LEFT);
        $data['no_pendaftaran'] = $sequenceNumber;
        $data['tahun_masuk']    = now()->format('Y');

        $result = student::create($data);

        if ($result) {
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil di simpan'
            );
        } else {
            $message = array(
                'status' => false,
                'message' => 'Data gagal di simpan'
            );
        }

        echo json_encode($message);
    }

    public function downloadKartu($id) {
        $data = [
            'params'    => params::first(),
            'student'   => student::with('user', 'jurusan')->where('user_id',$id)->first()
        ];

        // Render view ke dalam PDF
        $pdf = Pdf::loadView('pages.auth.print_kartu', $data)
            ->setPaper([0, 0, 700, 500], 'landscape');
        return $pdf->download('Kartu Pendafataran.pdf');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
