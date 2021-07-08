@extends('layout.header')
@section('title','Tambah Siswa')
@section('container')
        <div class="container-sm" style="padding-block-start: 10px;">
            <h4>Form Tambah Siswa</h4>
            <form class="row g-3" action="{{url('/tambah_siswa')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                  @error('nama')
                    <div class="invalid-feedback">{{$message}}</div>   
                  @enderror  
                </div>
                <div class="col-md-3">
                  <label for="nis" class="form-label">Nomor Induk Siswa</label>
                  <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis">
                  @error('nis')
                    <div class="invalid-feedback">{{$message}}</div>   
                  @enderror
                </div>
                <div class="col-6">
                  <label for="kelas" class="form-label">Kelas</label>
                  <input type="text" name="kelas" class="form-control" id="kelas">
                </div>
                <div class="col-3">
                  <label for="jk" class="form-label">Jenis Kelamin</label>
                  <select name="jk" id="jk" class="form-select" aria-label="">
                    <option selected>Jenis Kelamin ...</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="foto" class="form-label">foto</label>
                  <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                  @error('foto')
                    <div class="invalid-feedback">{{$message}}</div>   
                  @enderror
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>
@endsection