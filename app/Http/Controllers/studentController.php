<?php

namespace App\Http\Controllers;

use App\Models\info;
use App\Models\student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'type_menu' => 'master',
            'menu'      => 'user',
            'form'      => 'Form User',

        ];
        return view('pages.siswa.index', $data);
    }

    public function getData()
    {
        $result  = student::with('user', 'jurusan')->get();

        return DataTables::of($result)->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->user->name;
                return $return;
            })
            ->addColumn('jurusan', function ($data) {
                return $data->jurusan ? $data->jurusan->jurusan : "-";
                return $return;
            })
            ->addColumn('ijazah', function ($data) {
                return asset($data->ijazah);
                return $return;
            })
            ->addColumn('profil', function ($data) {
                return asset($data->profil);
                return $return;
            })
            ->addColumn('validasi', function ($data) {
                if ($data->validasi == 1) {
                    $return = "Tervalidasi";
                } else {
                    $return = "-";
                }
                return $return;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        // Validate the request data
        // $request->validate([
        //     'validasi' => 'required|string|max:255',
        // ]);

        // Update the category with the new data
        $student = student::find($request->id);
        $student->validasi = 1;

        if ($student->save()) {
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
    public function destroy(student $student)
    {
        //
    }
}
