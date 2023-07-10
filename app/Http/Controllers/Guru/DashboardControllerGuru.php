<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Models\UserModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DashboardControllerGuru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['siswa6A'] = Siswa::where('id_kelas', 1)->count();
        $data['siswa6B'] = Siswa::where('id_kelas', 2)->count();
        $data['siswa6C'] = Siswa::where('id_kelas', 3)->count();
        $data['countTugas'] = Tugas::where('id_guru', Session('id_guru'))->count();
        $data['countUjian'] = Ujian::where('id_guru', Session('id_guru'))->count();
        $data['countMateri'] = Materi::where('id_guru', Session('id_guru'))->count();
        $data['countKelas'] = Kelas::get()->count();
        $user = UserModel::where('id', Session('idUser'))->first();
        if ($user->password == "12345678") {
            $data['checkPass'] = false;
        } else {
            $data['checkPass'] = true;
        }
        return view('guru.dashboard', $data);
    }

    public function dataSiswa($idkelas){
        $data['title'] = 'Data Siswa';
        $data['siswa'] = Siswa::where('id_kelas', $idkelas)->get();
        return view('guru.listSiswa', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idkelas)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
