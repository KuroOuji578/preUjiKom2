@extends('template.main')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title m-b-0">Data Mahasiswa</h5>
            </div>
            <div class="col-md-2">
                <a href="{{ route('mahasiswa.create') }}">
                    <button class="btn btn-success float-right">+ tambah</button>
                </a>
            </div>
        </div>
        
    </div>
    <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width: 5%">#</th>
              <th scope="col" style="width: 25%">NIM</th>
              <th scope="col" style="width: 20%">Nama Mahasiswa</th>
              <th scope="col">
                
              </th>
            </tr>
          </thead>
          <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{$no}}</th>
                <td>{{$item->NIM}}</td>
                <td>{{$item->nama_mahasiswa}}</td>
                <td>
                    <center>
                        <a href="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </a>
                        &nbsp;
                        <a href="{{ route('mahasiswa.destroy', $item->id) }}">
                            <button onclick="return confirm('Yakin data {{$item ['nama_mahasiswa']}} dihapus?')" type="button" class="btn btn-danger">
                                Hapus
                            </button>
                        </a>
                    </center>
                </td>
            </tr>
            @php
                 $no++;
            @endphp
            @endforeach
          </tbody>
    </table>
</div>
@endsection