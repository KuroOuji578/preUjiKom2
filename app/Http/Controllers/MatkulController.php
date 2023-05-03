<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $matakuliah;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->matakuliah = new matakuliah;
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Matakuliah::all();
        //cek query jalan atau gak
        //dump and die = var_dump
        // dd($data);
        return view('matakuliah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
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
            'nama_matkul' => 'required|min:3|max:200',
            'total_sks' => 'required',
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        $this->matakuliah->nama_matakuliah = $request->nama_matkul;
        $this->matakuliah->sks = $request->total_sks;
        //simpan file gambar ke direktori upload yang ada didalam public

        // simpan data menggunakan method save()
        $this->matakuliah->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('matkul')->with('status', 'Data mata kuliah berhasil ditambahkan');
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
        $destroy = Matakuliah::findOrFail($id);
        $destroy->delete();
        return redirect()->route('matkul')->with('status', 'Data Matakuliah berhasil dihapus');
    }
}
