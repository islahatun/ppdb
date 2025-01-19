<?php

namespace App\Http\Controllers;

use App\Models\params;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class paramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = [
            'type_menu' => 'settings',
            'menu'      => 'Params',
            'form'      => 'Form Params'
        ];

        return view('pages.params.index', $data);
    }
    public function getData()
    {
        $result  = params::all();

        return DataTables::of($result)->addIndexColumn()
            ->addColumn('status', function ($data) {
                return 'Aktif';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'nama_sekolah'  => 'required|string|max:255',
            'alamat_sekolah'        => 'required|string|max:255',
            'awal_pendaftaran'        => 'required',
            'akhir_pendaftaran'        => 'required',
            'uang_daftar'        => 'required',
        ]);

        if ($request->file('logo')) {
            $data['logo']   = $request->file('logo')->store('logo', 'public');
        }

        $result = params::create($data);

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

    /**
     * Display the specified resource.
     */
    public function show(params $params)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(params $params)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, params $params)
    {
        // Validate the request data
        $request->validate([
            'nama_sekolah'  => 'required|string|max:255',
            'alamat_sekolah'        => 'required|string|max:255',
            'awal_pendaftaran'        => 'required',
            'akhir_pendaftaran'        => 'required',
        ]);

        $params = params::find($request->id);
        $params->nama_sekolah    = $request->nama_sekolah;
        $params->alamat_sekolah = $request->alamat_sekolah;
        $params->awal_pendafatran = $request->awal_pendafatran;
        $params->akhir_pendaftaran = $request->akhir_pendaftaran;
        $params->uang_daftar = $request->uang_daftar;


        if ($request->file('logo')) {
            if (Storage::disk('public')->exists($params->logo)) {
                Storage::disk('public')->delete($params->logo);
            }
            $logo   = $request->file('logo')->store('params', 'public');
            $params->logo     = $logo;
        }

        // Update the category with the new data


        if ($params->save()) {
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil di ubah'
            );
        } else {
            $message = array(
                'status' => false,
                'message' => 'Data gagal di ubah'
            );
        }

        echo json_encode($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(params $params)
    {
        if (Storage::disk('public')->exists($params->logo)) {

            Storage::disk('public')->delete($params->logo);
        }
        if ($params->delete()) {
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil dihapus'
            );
        } else {
            $message = array(
                'status' => false,
                'message' => 'Data gagal dihapus'
            );
        }

        echo json_encode($message);
    }
}
