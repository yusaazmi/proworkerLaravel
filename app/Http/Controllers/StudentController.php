<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('index',['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/tambah_siswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data input
        $this->validate($request,[
            'nama' => 'required',
            'nis' => 'required|unique:students|max:10',
            'foto' => 'required|image|max:3000'
        ]);
        // masukan data
        $student = new Student;
        $student->nama = $request->nama;
        $student->nis = $request->nis;
        $student->kelas = $request->kelas;
        $student->jk = $request->jk;
        // upload foto dan move file ke folder
            $foto = $request->file('foto');
            $nama_file = time()."_".$foto->getClientOriginalName();
            $tujuan_upload = 'foto_siswa';
            $foto->move($tujuan_upload,$nama_file);
            $student->foto = $nama_file;
        $student->save();
        return redirect('/')->with('status','Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/detail_siswa',[
            'student' => Student::find($id)
        ]);

    }

    // method search
    public function search(Request $request)
    {
        $search = $request->search;
        $student = Student::where('nama','like',"%".$search."%")->paginate();
        $count = $student->count();
        if($count>0)
        {
            return view('/search',['student'=>$student,'search'=>$search]);
        }
        else
        {
            return redirect('/')->with('status','Data siswa yang dicari tidak ada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/edit_siswa',[
            'student' =>Student::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required'
        ]);
        // upload foto
        if($request->hasFile('foto'))
        {
            $foto = $request->file('foto');
            $nama_file = time()."_".$foto->getClientOriginalName();
            $tujuan_upload = 'foto_siswa';
            $foto->move($tujuan_upload,$nama_file);
            
            Student::where('id',$id)
            ->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jk' => $request->jk,
                'foto' => $nama_file,
            ]);
            return redirect('/')->with('status','Data siswa berhasil diedit!');
        }
        else
        {
            Student::where('id',$id)
            ->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jk' => $request->jk
            ]);
            return redirect('/')->with('status','Data siswa berhasil diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/')->with('status','Data siswa berhasil dihapus!');
    }
}
