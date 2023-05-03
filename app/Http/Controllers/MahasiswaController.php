<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $mahasiswa;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->mahasiswa = new mahasiswa;
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Mahasiswa::all();
        //cek query jalan atau gak
        //dump and die = var_dump
        // dd($data);
        return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_mahasiswa' => 'required|min:3|max:200',
            'nim' => 'required|min:6|max:8',
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        $this->mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $this->mahasiswa->NIM = $request->nim;
        //simpan file gambar ke direktori upload yang ada didalam public

        // simpan data menggunakan method save()
        $this->mahasiswa->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('mahasiswa')->with('status', 'Data mahasiswa berhasil ditambahkan');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Mahasiswa::findOrFail($id);
        $destroy->delete();
        return redirect()->route('mahasiswa')->with('status', 'Data Mahasiswa berhasil dihapus');
    }
}
