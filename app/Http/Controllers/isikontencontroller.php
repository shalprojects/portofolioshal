<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\isikonten;

class isikontencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Konten Katalog',
            'isikonten' => isikonten::get(),
            'content' => 'admin/isikonten/index'
        ];
        return view('admin/layouts/wrapper', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Konten',
            'content' => 'admin/isikonten/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'link' => 'required|url',
            'deskripsi' => 'required',
        ]);

        isikonten::create($data);
        return redirect('/admin/isikonten');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Konten',
            'isikonten' => isikonten::findOrFail($id),
            'content' => 'admin/isikonten/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $isikonten = isikonten::findOrFail($id);
        $data = $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'link' => 'required|url',
            'deskripsi' => 'required',
        ]);
        
    
        $data['judul'] = $request->input('judul');
        $isikonten->update($data);
        return redirect('/admin/isikonten');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $isikonten = isikonten::find($id);
        $isikonten->delete();
        return redirect('/admin/isikonten');
    }
}
