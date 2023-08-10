<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTugasRequest;
use App\Models\HasilUjian;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\SoalUjian;
use App\Models\TabelTugas;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Models\UserModel;
use App\Traits\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = '';
        $data['checkPass'] = true;
        $user = UserModel::where('id', Session('idUser'))->first();
        if ($user->password == "12345678") {
            $data['checkPass'] = false;
        } else {
        }
        return view('siswa.dashboard', $data);
    }

    public function showMapel()
    {
        $data['title'] = 'MATERI';
        $data['mapel'] = Mapel::get();
        return view('siswa.materiSiswa', $data);
    }

    public function showMateri($id)
    {
        $data['title'] = 'MATERI';
        $data['mapel'] = Mapel::get();
        $data['materi'] = Materi::where('id_kelas', Session('id_kelas'))->with('mapel', 'kelas', 'guru')->where('id_mapel', $id)->get();
        return view('siswa.detailMateriSiswa', $data); 
        // return Materi::where('id_kelas', Session('id_kelas'))->with('mapel', 'kelas', 'guru')->where('id_mapel', $id)->get();
    }

    public function showTugas(){
        $data['title'] = 'TUGAS';
        $data['tugas'] = Tugas::where('id_kelas', Session('id_kelas'))->with('mapel')->get();
        // $tugas = Tugas::where('id_kelas', Session('id_kelas'))->with('mapel')->get();
        // $data['cekTugas'] = TabelTugas::where('id_siswa', Session('id_siswa'))
        //                     ->where('id_tugas')
        return view('siswa.tugasSiswa', $data); 

    }

    public function showDetailTugas($id){

        $data['title'] = 'TUGAS';
        $data['tugas'] = Tugas::where('id', $id)->with('mapel')->first();
        return view('siswa.detailTugas', $data);
        // return TabelTugas::where('id_siswa', Session('id_siswa'))->get();
        
    }

    public static function cekAssignment($idtugas, $idsiswa) {
        return TabelTugas::where('id_tugas', $idtugas)
        ->where('id_siswa', $idsiswa)                    
        ->count();
    }

    public static function getNilai($idtugas, $idsiswa){
        return TabelTugas::where('id_tugas', $idtugas)
        ->where('id_siswa', $idsiswa)                    
        ->first();
    }

    public function showUjian(){
        $data['title'] = 'UJIAN';
        $data['ujian'] = Ujian::where('id_kelas', Session('id_kelas'))->with('mapel')->get();
        return view('siswa.ujianSiswa', $data);
    }

    public static function cekStatusUjian($idujian){
        
        $ujian = Ujian::where('id', $idujian)->first();
        $hasilUjian = HasilUjian::where('id_ujian', $idujian)
                    ->where('id_siswa', Session('id_siswa'))->count();
        
        if($hasilUjian > 0){
            return 'submited';
        }  else {
            // cek ujian
        if (
            Carbon::now()->format('Y-m-d') < $ujian->tgl_mulai ||
            Carbon::now()->format('Y-m-d') == $ujian->tgl_mulai &&
            Carbon::now()->format('H:i:m') < $ujian->waktu_mulai
            ) {
            return 'ujian-belum-mulai';
        }
        if(
            $ujian->tgl_mulai == Carbon::now()->format('Y-m-d') && 
            Carbon::now()->format('H:i:m') > $ujian->waktu_mulai && 
            Carbon::now()->format('H:i:m') <= $ujian->endtime)
        {
            return 'ujian-dibuka';

        }
        // cek selesai ujian
        if( $ujian->tgl_mulai == Carbon::now()->format('Y-m-d') && 
            Carbon::now()->format('H:i:m') >= $ujian->endtime ||
            Carbon::now()->format('Y-m-d') > $ujian->tgl_mulai
            )
        {
            return 'ujian-selesai';
        }
    }
        
    }

    public function showSoal($idujian) {
        $data['title'] = 'UJIAN SISWA';
        $data['soal'] = SoalUjian::where('id_ujian', $idujian)->get();
        $data['ujian'] = Ujian::where('id', $idujian)->first();
        $data['idujian'] = $idujian;
        return view('siswa.ujianSiswaDetail', $data);
    }

    
    public function create()
    {
        //
    }

    public function storeTugas(StoreTugasRequest $request)
    {
        $file = $request->file('file_name');

        if ($request->hasFile('file_name')) {

            $data = [
                'id_tugas' => $request->id_tugas,
                'id_siswa' => $request->id_siswa,
                'id_guru' => $request->id_guru,
                'file_name' => $file->getClientOriginalName(),
                'status' => '1'
            ];

            Storage::putFileAs('tugas_store', $file, $file->getClientOriginalName());
        }

        TabelTugas::create($data);
        return $this->addSuccess();
    }

    public function storeUjian(Request $request){

        if ($request->jawaban == null) {
            return back()->with('msg', 'Jawaban anda kosong!');
         }

        foreach ($request->jawaban as $key => $value) {
            $data[] = array(
                'id_soal' => $request->id_soal[$key],
                'id_ujian' => $request->id_ujian[$key],
                'id_siswa' => $request->id_siswa[$key],
                'jawaban' => $request->jawaban[$key]
                ); 
        }

        $ujian = Ujian::where('id', $request->idujian)->first();
        if( $ujian->tgl_mulai == Carbon::now()->format('Y-m-d') && 
            Carbon::now()->format('H:i:m') >= $ujian->endtime ||
            Carbon::now()->format('Y-m-d') > $ujian->tgl_mulai
            ){
                return back()->with('msg', 'Waktu sudah habis, tidak bisa kumpul ujian');
        } else {

            HasilUjian::insert($data);
            return redirect('student/ujian')->with('msg', 'Ujian Telah Dikerjakan');
        }

    }

    public function hasilUjian($idujian){

        $countSoal = SoalUjian::where('id_ujian', $idujian)->count();
        $correctAnswers = HasilUjian::join('tb_soal', 'id_soal', '=', 'tb_soal.id')
        ->where('tb_hasil_ujian.id_ujian', $idujian)
        ->where('id_siswa', Session('id_siswa'))
        ->whereColumn('jawaban', '=', 'kunci_jawaban')
        ->count();

        $totalNilai = ( 100 / $countSoal ) * $correctAnswers;

        return $totalNilai;
        $data['title'] = 'UJIAN SISWA';
        // $data['soal'] = SoalUjian::where('id_ujian', $idujian)->get();
        return view('siswa.hasilUjianSiswa', $data);
    }

    public function checkAssigned($idujian) {
        $hasilUjian = HasilUjian::where('id_ujian', $idujian)
                    ->where('id_siswa', Session('id_siswa'))->count();
        
        if($hasilUjian > 0){
            return 'submited';
        }
    }

    public function show($id)
    {
        //
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
