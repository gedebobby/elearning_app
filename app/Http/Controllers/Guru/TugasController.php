<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\TugasRequest;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\TabelTugas;
use App\Models\Tugas;
use App\Traits\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    use Message;

    public function index()
    {
        $data['title'] = 'Tugas';
        $data['kelas'] = Kelas::get();
        $data['mapel'] = Guru::where('id', Session('id_guru'))->with(['tb_mapel_guru'])->get();
        $data['tugas'] = Tugas::where('id_guru', Session('id_guru'))->with('mapel', 'kelas', 'guru')->get();
        return view('guru.tugas', $data);
        // return Carbon::now()->format('Y-m-d');
        
    }


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
    public function store(TugasRequest $request)
    {
        $file = $request->file('file_tugas');
        if ($request->hasFile('file_tugas')) {
            $data = [
                'nama_tugas' => $request->nama_tugas,
                'id_mapel' => $request->id_mapel,
                'id_kelas' => $request->id_kelas,
                'id_guru' => $request->id_guru,
                'keterangan' => $request->keterangan,
                'batas_tgl'=> $request->tanggal,
                'batas_waktu'=> $request->waktu,
                'file_tugas' => $file->getClientOriginalName()
            ];
            Storage::putFileAs('tugas_store', $file, $file->getClientOriginalName());
        } else {
            $data = [
                'nama_tugas' => $request->nama_tugas,
                'id_mapel' => $request->id_mapel,
                'id_kelas' => $request->id_kelas,
                'id_guru' => $request->id_guru,
                'keterangan' => $request->keterangan,
                'batas_tgl'=> $request->tanggal,
                'batas_waktu'=> $request->waktu
            ];
        }

        // return dd($data);
        Tugas::create($data);

        return $this->addSuccess();
        
    }

    public function list($idtugas, $idkelas){

        $data['title'] = 'Daftar Tugas Siswa';
        $data['siswa'] = Siswa::where('id_kelas', $idkelas)->get();
        $data['idtugas'] = $idtugas;

        return view('guru.listTugas', $data); 
        
    }

    public static function showFileTugas($idtugas, $idsiswa){
        return TabelTugas::where('id_tugas', $idtugas)
        ->where('id_siswa', $idsiswa)                    
        ->first();
    }

    public function nilaiTugas(Request $request) {

        $idsiswa = $request->inputIdSiswa;
        $idtugas = $request->inputIdTugas;
        
        $data = [
            'nilai' => $request->nilai
        ];

        TabelTugas::where('id_siswa', $idsiswa)
                    ->where('id_tugas', $idtugas)
                    ->update($data);

        return back()->with('success', 'Berhasil Memberikan Nilai');
    }

    public function download($file)
    {
        $path = 'tugas_store/' . $file;
        return Storage::download($path);
    }
    
    // public static function cekTugas($idsiswa, $idtugas){
    //     return TabelTugas::where(['id_siswa' => $idsiswa ,'id_tugas' => $idtugas])->first();

        
    //     return ;
    // }

    public function show($id)
    {
        $data['title'] = 'Tugas';
        $data['kelas'] = Kelas::get();
        $data['mapel'] = Guru::where('id', Session('id_guru'))->with(['tb_mapel_guru'])->get();
        $data['tugas'] = Tugas::find($id);
        return view('admin.updateView.updateTugas', $data);
        // return Tugas::find($id);
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
    public function update(TugasRequest $request, $id)
    {
        if($request->tanggal <= Carbon::now()->format('Y-m-d') && $request->waktu <= Carbon::now()->format('H:i:m') ){
            $status = 0;
        } else {
            $status = 1;
        }

        $file = $request->file('file_tugas');
        $tugas = Tugas::find($id);
        if ($request->hasFile('file_tugas')) {
            $data = [
                'nama_tugas' => $request->nama_tugas,
                'id_mapel' => $request->id_mapel,
                'id_kelas' => $request->id_kelas,
                'id_guru' => $request->id_guru,
                'keterangan' => $request->keterangan,
                'batas_tgl'=> $request->tanggal,
                'batas_waktu'=> $request->waktu,
                'status' => $status,
                'file_tugas' => $file->getClientOriginalName()
            ];
            // Storage::move('tugas_store/'.$tugas->file_name, 'tugas_deleted/');
            Storage::putFileAs('tugas_store', $file, $file->getClientOriginalName());
        } else {
            $data = [
                'nama_tugas' => $request->nama_tugas,
                'id_mapel' => $request->id_mapel,
                'id_kelas' => $request->id_kelas,
                'id_guru' => $request->id_guru,
                'keterangan' => $request->keterangan,
                'batas_tgl'=> $request->tanggal,
                'batas_waktu'=> $request->waktu,
                'status' => $status
            ];
        }

        Tugas::where('id', $id)->update($data);
        
        return $this->updateSuccess('tugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tugas::find($id)->delete();
        return $this->deleteSuccess('tugas');
    }
}
