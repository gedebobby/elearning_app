<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
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
        
        $user = UserModel::where('id', Session('idUser'))->first();
        $data['title'] = 'Beranda Guru';
        if ($user->password == "12345678") {
            $data['checkPass'] = false;
        } else {
            $data['checkPass'] = true;
        }
        
        return view('guru.dashboard', $data);
    }

    public function dashboardDetail(){

        $data['title'] = 'Detail Beranda Guru';
        $data['kelas'] = Kelas::all();
        $data['countKelas'] = Kelas::get()->count();
        $user = UserModel::where('id', Session('idUser'))->first();
        if ($user->password == "12345678") {
            $data['checkPass'] = false;
        } else {
            $data['checkPass'] = true;
        }
        return view('guru.dashboardDetail', $data);

        // return Guru::with('tb_mapel_guru')->get();
    }

    public function kelasDetail(){

        $data['title'] = 'Detail Kelas';
        $data['kelas'] = Kelas::all();
        $user = UserModel::where('id', Session('idUser'))->first();
        if ($user->password == "12345678") {
            $data['checkPass'] = false;
        } else {
            $data['checkPass'] = true;
        }
        return view('guru.kelasDetail', $data);
    }

    public function dataSiswa($idkelas){
        $kelas = Kelas::find($idkelas);
        $siswa = Siswa::where('id_kelas', $idkelas)->get();
        $data['title'] = 'Data Siswa Kelas ' . $kelas->kelas;
        $data['siswa'] = $siswa;    
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
