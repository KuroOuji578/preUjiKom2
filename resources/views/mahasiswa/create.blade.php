@extends('template.main')
@section('content')
<div class="card">
    <form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Tambah Data Mata Kuliah</h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-9">
                    <input name="nama_mahasiswa" type="text" value="{{ old('nama_mahasiswa')}}" class="form-control {{ $errors->first('nama_mahasiswa') ? "is-invalid":""}}" placeholder="Masukan Nama Mahasiswa">
                    @error('nama_mahasiswa')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">NIM</label>
                <div class="col-sm-9">
                    <input name="nim" type="number" value="{{ old('nim')}}" class="form-control {{ $errors->first('nim') ? "is-invalid":""}}" placeholder="Masukan nim">
                    @error('nim')
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