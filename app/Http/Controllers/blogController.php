<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = [
            'type_menu' => 'settings',
            'menu'      => 'blog',
            'form'      => 'Form Blog'
        ];

        return view('pages.blog.index', $data);
    }

    public function getData(){
        $result  = blog::all();

        return DataTables::of($result)->addIndexColumn()

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
       $data =  $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        if ($request->file('gambar')) {
            $data['gambar']   = $request->file('gambar')->store('blog','public');
        }

        $result = blog::create($data);

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
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        // Validate the request data
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

         // Update the category with the new data
         $blog = blog::find($request->id);
         $blog->judul    = $request->judul;
         $blog->deskripsi= $request->deskripsi;




        if ($request->file('gambar')) {
            if (Storage::disk('public')->exists($blog->gambar)) {
                Storage::disk('public')->delete($blog->gambar);

            }
            $gambar   = $request->file('gambar')->store('blog','public');
            $blog->gambar   = $gambar;
        }



        if($blog->save()){
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
    public function destroy(blog $blog)
    {

        if (Storage::disk('public')->exists($blog->gambar)) {
            Storage::disk('public')->delete($blog->gambar);

        }
        if($blog->delete()){
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
