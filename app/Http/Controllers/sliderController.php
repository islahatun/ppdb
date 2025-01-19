<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = [
            'type_menu' => 'settings',
            'menu'      => 'Slider',
            'form'      => 'Form Slider'
        ];

        return view('pages.slider.index', $data);
    }

    public function getData(){
        $result  = slider::all();

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



    if ($request->file('gambar')) {
        $data['gambar']   = $request->file('gambar')->store('slider','public');
    }

    $result = slider::create($data);

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
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slider $slider)
    {
        $slider = slider::find($request->id);


        if ($request->file('gambar')) {
            if (Storage::disk('public')->exists($slider->gambar)) {

                Storage::disk('public')->delete($slider->gambar);
            }
            $gambar   = $request->file('gambar')->store('slider','public');
            $slider->gambar   = $gambar;
        }




        if($slider->save()){
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
    public function destroy(slider $slider)
    {
        if (Storage::disk('public')->exists($slider->gambar)) {
            Storage::disk('public')->delete($slider->gambar);

        }
        if($slider->delete()){
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
