@extends('template.main')
@section('content')
<div class="card">
    <form action="{{ route('dash.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Tambah Data Barang</h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-2">
                    <select name="mahasiswa_id" type="text" value="{{ old('mahasiswa_id')}}" class="form-control {{ $errors->first('mahasiswa_id') ? "is-invalid":""}}">
                        <option hidden>Nama Mahasiswa</option>
                        @foreach ($mahasiswa as $item)
                            <option value="{{$item->id}}">
                                {{$item->nama_mahasiswa}}
                            </option>
                        @endforeach
                    </select>
                    @error('mahsiswa_id')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mata Kuliah</label>
                <div class="col-sm-2">
                    <select name="matakuliah_id" type="text" value="{{ old('matakuliah_id')}}" class="form-control {{ $errors->first('matakuliah_id') ? "is-invalid":""}}">
                        <option hidden>Pilih Mata Kuliah</option>
                        @foreach ($matkul as $item)
                            <option value="{{$item->id}}">
                                {{$item->nama_matakuliah}}
                            </option>
                        @endforeach
                    </select>
                    @error('matakuliah_id')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nilai</label>
                <div class="col-sm-2">
                    <input name="nilai" type="number" value="{{ old('nilai')}}" class="form-control {{ $errors->first('nilai') ? "is-invalid":""}}" placeholder="Masukan Harga Barang">
                    @error('nilai')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection