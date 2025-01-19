<?php

namespace App\Http\Controllers;

use App\Models\tentang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = [
            'type_menu' => 'settings',
            'menu'      => 'Tentang Sekolah',
            'form'      => 'Form Tentang Sekolah'
        ];

        return view('pages.tentang.index', $data);
    }
    public function getData(){
        $result  = tentang::all();

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
        $request->validate([
            'deskripsi' => 'required|string|max:255',
        ]);

        $result = tentang::create($request->all());

        if($result){
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil di simpan'
            );
        }else{
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
    public function show(tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tentang $tentang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tentang $tentang)
    {
        // Validate the request data
        $request->validate([
            'deskripsi' => 'required|string|max:255',
        ]);

        // Update the category with the new data
        $tentang = tentang::find($request->id);
        $tentang->deskripsi = $request->deskripsi;

        if($tentang->save()){
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil di ubah'
            );
        }else{
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
    public function destroy(tentang $tentang)
    {
        if($tentang->delete()){
            $message = array(
                'status' => true,
                'message' => 'Data Berhasil dihapus'
            );
        }else{
            $message = array(
                'status' => false,
                'message' => 'Data gagal dihapus'
            );
        }

        echo json_encode($message);
    }
}
