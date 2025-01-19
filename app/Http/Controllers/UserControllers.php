<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
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
        return view('pages.user.index', $data);
    }

    public function getData()
    {
        $result  = User::all();

        return DataTables::of($result)->addIndexColumn()
            ->addColumn('role', function ($data) {
                if ($data->role == 3) {
                    $return = 'Siswa';
                } else if ($data->role == 1) {
                    $return = 'Admin';
                } else {
                    $return = 'Kepala Sekolah';
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
                // Validate the request data
                $data =  $request->validate([
                    'email' => 'required',
                    'name' => 'required',
                    'role' => 'required',
                    'nisn' => 'required',
                    'phone' => 'required',
                ]);

                $data['password'] = Hash::make('Password');

                $result = User::create($data);

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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
                // Validate the request data
                $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'role' => 'required',
                    'nisn' => 'required',
                ]);

                // Update the category with the new data
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->nisn = $request->nisn;
                $user->phone = $request->phone;


                if ($user->save()) {
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
    public function destroy(User $user)
    {
        {
            if ($user->delete()) {
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
}
