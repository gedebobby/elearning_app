<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoalRequest;
use App\Http\Requests\UjianRequest;
use App\Jobs\setStatusUjian;
use App\Models\HasilUjian;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\SoalUjian;
use App\Models\Ujian;
use App\Traits\Message;
use Illuminate\Http\Request;

class UjianController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Ujian';
        $data['mapel'] = Mapel::get();
        $data['kelas'] = Kelas::get();
        $data['ujian'] = Ujian::with('mapel', 'kelas')->get();

        return view('guru.ujian', $data);
    }

    public static function setStatusUjian($idujian){

        $ujian = Ujian::find($idujian);

        // setStatusUjian::dispa
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
    public function store(UjianRequest $request)
    {
        $data = [
            'nama_ujian' => $request->nama_ujian,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'tgl_mulai' => $request->tgl_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'endtime' => $request->waktu,
            'waktu' => $request->waktu
        ];

        // return $data;

        Ujian::create($data);
        return $this->addSuccess();

    }

    public function addSoal(SoalRequest $request){
        
        $data = [
            'soal' => $request->soal,
            'id_ujian' => $request->id_ujian,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'kunci_jawaban' => $request->kunci_jawaban,
        ];

        SoalUjian::create($data);
        return $this->addSuccess();
    }

    public function soal($idujian){
        
        $data['title'] = 'Tambah Soal Ujian';
        $data['idujian'] = $idujian;
        $data['soal'] = SoalUjian::where('id_ujian', $idujian)->get();

        return view('guru.soalUjian', $data);
    }

    public function import(){
        
    }

    public function show($id)
    {
        $data['title'] = 'Edit Ujian';
        $data['mapel'] = Mapel::get();
        $data['kelas'] = Kelas::get();
        $data['ujian'] = Ujian::find( $id);

        return view('admin.updateView.updateUjian', $data);
    }

    public function hasilUjian($idujian, $idkelas){
        $data['title'] = 'Edit Ujian';
        $data['siswa'] = Siswa::with('kelas')
                        ->where('id_kelas', $idkelas)
                        ->get();
        $data['ujian'] = Ujian::find($idujian);
        $data['idujian'] = $idujian;
        
        return view('guru.hasilUjian', $data);
    }

    public static function countNilai($idujian, $idsiswa) {

        $countSoal = SoalUjian::where('id_ujian', $idujian)->count();
        $correctAnswers = HasilUjian::join('tb_soal', 'id_soal', '=', 'tb_soal.id')
        ->where('tb_hasil_ujian.id_ujian', $idujian)
        ->where('id_siswa', $idsiswa)
        ->whereColumn('jawaban', '=', 'kunci_jawaban')
        ->count();

        $totalNilai = ( 100 / $countSoal ) * $correctAnswers;

        return $totalNilai;

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

    public function update(UjianRequest $request, $id)
    {
        $data = [
            'nama_ujian' => $request->nama_ujian,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'tgl_mulai' => $request->tgl_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'endtime' => $request->waktu,
            'waktu' => $request->waktu
        ];

        Ujian::find($id)->update($data);
        return $this->updateSuccess('ujian');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ujian::find($id)->delete();
        return $this->deleteSuccess('ujian');
    }
}
