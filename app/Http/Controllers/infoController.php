<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'type_menu' => '',
            'menu'      => 'Info',
            'form'      => 'Form Info'
        ];
        return view('pages.info.index',$data);
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
            'info' => 'required|string|max:255',
        ]);

        $result = info::create($request->all());

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

    public function getData(){
        $result  = info::all();

        return DataTables::of($result)->addIndexColumn()
        ->addColumn('status', function ($data) {
            return 'Aktif';
        })
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, info $info)
    {
        // Validate the request data
        $request->validate([
            'info' => 'required|string|max:255',
        ]);

        // Update the category with the new data
        $info = info::find($request->id);
        $info->info = $request->info;

        if($info->save()){
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
    public function destroy(info $info)
    {
        if($info->delete()){
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
