@extends('template.main')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<div class="row">
         {{-- <div>
            <div class="col-3 m-t-15">
                <div class="bg-dark p-10 text-white text-center">
                   <i class="fa fa-cart-plus font-16"></i>
                   <h5 class="m-t-5"></h5>
                   <small class="font-light">Total Pesanan</small>
                </div>
            </div>
             <div class="col-3 m-t-15">
                <div class="bg-dark p-10 text-white text-center">
                   <i class="fa fa-tag font-16"></i>
                   <h5 class="m-t-5"></h5>
                   <small class="font-light">Belum di verifikasi</small>
                </div>
            </div>
        </div> --}}
    <!-- column -->
    <div class="col-12" style="margin-top: 5%">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title col-md-10">Data Nilai Mahasiswa</h5>
                    <div class="col-md-2">
                        <a href="{{ route('dash.create') }}">
                            <button class="btn btn-success float-right">+ tambah</button>
                        </a>
                    </div>
                </div>
                
            </div>
            <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" style="20%">Mata Kuliah</th>
                      <th scope="col" style="20%">NIM</th>
                      <th scope="col" style="20%">Nama Mahasiswa</th>
                      <th scope="col" style="20%">Huruf Mutu</th>
                      <th scope="col" style="20%">SKS</th>
                      <th scope="col" style="20%">Total Nilai</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp 
                    @foreach ($data as $item)       
                    <tr>
                      <th scope="row">{{$no}}</th>
                      <td>{{$item->matakuliah->nama_matakuliah}}</td>
                      <td>{{$item->mahasiswa->NIM}}</td>
                      <td>{{$item->mahasiswa->nama_mahasiswa}}</td>
                      <td>{{$item->huruf_mutu}}</td>
                      <td>{{$item->matakuliah->sks}}</td>
                      <td>{{$item->total_nilai}}</td>
                      <td>
                        <a href="">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <a href="{{ route('dash.destroy', $item->id) }}">
                            <button onclick="return confirm('Yakin data nilai ini dihapus?')" class="btn btn-danger">Hapus</button>
                        </a>
                      </td>
                    </tr>
                    @php
                         $no++;
                    @endphp
                    @endforeach 
                  </tbody>
                  <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Jumlah</td>
                        <td>yolo</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Rata-rata</td>
                        <td>yolo</td>
                    </tr>
                  </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection