@extends('layout.header')
@section('title','pencarian siswa')
@section('container')
        <div class="container-sm" style="padding-block-start: 10px;">
            <h4>Daftar Siswa</h4>
            <h5>Menampilkan hasil pencarian "{{$search}}"</h5>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr class="table-info">
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                 $i = 1;   
                @endphp
                    @foreach($student as $s)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$s->nis}}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->kelas}}</td>
                        <td>
                            <a href="{{url('/detail_siswa/'.$s->id)}}" class="badge bg-secondary" style="text-decoration: none;">Detail siswa</a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('/tambah_siswa')}}" class="badge bg-success" style="text-decoration: none;">Tambah Siswa</a>
        </div>
    </div>
@endsection