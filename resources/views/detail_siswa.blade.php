@extends('layout.header')
@section('title','Detail Siswa')
@section('container')
        <div class="content" style="padding-top: 10px; padding-left: 5px; margin-left: 5px; ">
            <div class="card" style="width: 18rem;">
                <img src="{{ url('foto_siswa/'.$student->foto) }}" class="card-img-top" style="width: 18rem;height: 19rem;" alt="{{$student->foto}}">
                <div class="card-body">
                    <p class="card-title">{{$student->nama}}</p>
                    <p class="card-subtitle mb-2 text-muted">{{$student->nis}}</p>
                    <p class="card-text">Kelas : {{$student->kelas}}</p>
                    <p class="card-text">Jenis Kelamin :{{$student->jk}}</p>
                    <a href="{{url('/edit_siswa/'.$student->id)}}" class="btn btn-primary">Edit siswa</a>
                    <form action="{{url('/detail_siswa/'.$student->id)}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus siswa</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection