<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Daftar Akun Admin',
            'user' => User::get(),
            'content' => 'admin\adminuser\index'
        ];
        return view('admin\layouts\wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah Akun Admin',
            'content' => 'admin\adminuser\add'
        ];
        return view('admin\layouts\wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email', // Menambahkan aturan unik untuk kolom email
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('/admin/adminuser')->with('success', 'Data akun admin berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'title' => 'Edit Akun Admin',
            'user' => User::find($id),
            'content' => 'admin\adminuser\add'
        ];
        return view('admin\layouts\wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            //'password' => 'min:8',
        ]);


        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }else{
            $data['password'] = $user->password;
        }
        $user->update($data);
        return redirect('/admin/adminuser')->with('success', 'Data akun admin berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

    if (!$user) {
        return redirect('/admin/adminuser')->with('error', 'Data akun admin tidak ditemukan');
    }

    $user->delete();
    return redirect('/admin/adminuser')->with('success', 'Data akun admin berhasil dihapus');
    }
}
