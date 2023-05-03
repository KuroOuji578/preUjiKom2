@extends('template.main')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <h5 class="card-title m-b-0">Data Matakuliah</h5>
            </div>
            <div class="col-md-2">
                <a href="{{ route('matkul.create') }}">
                    <button class="btn btn-success float-right">+ tambah</button>
                </a>
            </div>
        </div>
        
    </div>
    <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width: 5%">#</th>
              <th scope="col" style="width: 25%">Nama Mata Kuliah</th>
              <th scope="col" style="width: 20%">SKS</th>
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
                <td>{{$item->nama_matakuliah}}</td>
                <td>{{$item->sks}}</td>
                <td>
                    <center>
                        <a href="">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </a>
                        &nbsp;
                        <a href="{{ route('matkul.destroy', $item->id) }}">
                            <button onclick="return confirm('Yakin data {{$item ['nama_matakuliah']}} dihapus?')" type="button" class="btn btn-danger">
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