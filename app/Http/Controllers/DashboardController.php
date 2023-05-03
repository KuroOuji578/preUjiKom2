<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $nilai;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->nilai = new nilai;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Nilai::all();
        return view('dashboard', compact('data'));
    }

    public function create()
    {
        $matkul = Matakuliah::all();
        $mahasiswa = Mahasiswa::all();
        $data = Nilai::all();
        return view('dashboard.create', compact('data', 'mahasiswa', 'matkul'));
    }
    public function store(Request $request)
    {
        $rules = [
            'matakuliah_id' => 'required',
            'mahasiswa_id' => 'required',
            'nilai' => 'required',
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
        ];

        $this->validate($request, $rules, $messages);

        $this->nilai->matakuliah_id = $request->matakuliah_id;
        $this->nilai->mahasiswa_id = $request->mahasiswa_id;
        $this->nilai->total_nilai = $request->nilai;
        
        if ($request->nilai <= 100 || $request->nilai >= 85) {
            $this->nilai->huruf_mutu = 'A';
        } elseif ($request->nilai < 85 || $request->nilai >= 70) {
            $this->nilai->huruf_mutu = 'B';
        } elseif ($request->nilai < 70 || $request->nilai >= 60) {
            $this->nilai->huruf_mutu = 'C';
        } elseif ($request->nilai < 60 || $request->nilai >= 50) {
            $this->nilai->huruf_mutu = 'D';
        } elseif ($request->nilai < 50) {
            $this->nilai->huruf_mutu = 'E';
        }
        //simpan file gambar ke direktori upload yang ada didalam public

        // simpan data menggunakan method save()
        $this->nilai->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('dash')->with('status', 'Data nilai berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $destroy = Nilai::findOrFail($id);
        $destroy->delete();
        return redirect()->route('dash')->with('status', 'Data Nilai berhasil dihapus');
    }
}
