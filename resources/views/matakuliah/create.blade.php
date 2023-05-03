@extends('template.main')
@section('content')
<div class="card">
    <form action="{{ route('matkul.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Tambah Data Mata Kuliah</h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Mata Kuliah</label>
                <div class="col-sm-9">
                    <input name="nama_matkul" type="text" value="{{ old('nama_matkul')}}" class="form-control {{ $errors->first('nama_matkul') ? "is-invalid":""}}" placeholder="Masukan Nama Mata Kuliah">
                    @error('nama_matkul')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Jumlah SKS</label>
                <div class="col-sm-9">
                    <input name="total_sks" type="number" value="{{ old('total_sks')}}" class="form-control {{ $errors->first('total_sks') ? "is-invalid":""}}" placeholder="Masukan Jumlah SKS">
                    @error('total_sks')
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