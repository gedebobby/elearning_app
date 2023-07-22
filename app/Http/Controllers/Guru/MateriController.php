<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateriRequest;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Traits\Message;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{

    use Message;
    
    public function index()
    {
        $data['title'] = 'Materi';
        $data['materi'] = Materi::where('id_guru', Session('id_guru'))->with('mapel', 'kelas', 'guru')->get();
        $data['kelas'] = Kelas::get();
        $data['mapel'] = Guru::where('id', Session('id_guru'))->with(['tb_mapel_guru'])->get();
        return view('guru.materi', $data);
        // return Guru::where('id', Session('id_guru'))->with(['tb_mapel_guru'])->get();
    }

    public function showMateri()
    {
        $data['title'] = 'Detail Materi';
        return view('guru.detail-materi', $data);
    }

    public function download($file)
    {
        $path = 'materi_store/' . $file;
        return Storage::download($path);
    }

   
    public function create()
    {
        //
    }

    public function store(MateriRequest $request)
    {
        $file = $request->file('file_materi');
        if ($request->hasFile('file_materi')) {
            $data = [
                'nama_materi' => $request->nama_materi,
                'id_kelas' => $request->id_kelas,
                'id_mapel' => $request->id_mapel,
                'id_guru' => $request->id_guru,
                'file_name' => $file->getClientOriginalName(),
                'link_materi' => $request->link_materi
               ];

            Storage::putFileAs('materi_store', $file, $file->getClientOriginalName());

        } else {
            $data = [
                'nama_materi' => $request->nama_materi,
                'id_kelas' => $request->id_kelas,
                'id_mapel' => $request->id_mapel,
                'id_guru' => $request->id_guru,
                'link_materi' => $request->link_materi
               ];
        }

       Materi::create($data);

       return $this->addSuccess();
    }

    public function show($id)
    {
        // return Materi::with('mapel', 'kelas')->where('id_materi', $id)->get();
        $data['title'] = 'Edit Materi';
        $data['materi'] = Materi::find($id);
        $data['kelas'] = Kelas::get();
        $data['mapel'] = Guru::where('id', Session('id_guru'))->with(['tb_mapel_guru'])->get();
        return view('admin.updateView.updateMateri', $data);
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
        $file = $request->file('file_materi');
        $materi = Materi::find($id);
        if ($request->hasFile('file_materi')) {
            $data = [
                'nama_materi' => $request->nama_materi,
                'id_kelas' => $request->id_kelas,
                'id_mapel' => $request->id_mapel,
                // 'id_guru' => $request->id_guru,
                'file_name' => $file->getClientOriginalName(),
                'link_materi' => $request->link_materi
               ];
               Storage::move('materi_store/'.$materi->file_name, 'materi_deleted/'.$file->getClientOriginalName());
               Storage::putFileAs('materi_store', $file, $file->getClientOriginalName());
        } else {
            $data = [
                'nama_materi' => $request->nama_materi,
                'id_kelas' => $request->id_kelas,
                'id_mapel' => $request->id_mapel,
                'id_guru' => $request->id_guru,
                'link_materi' => $request->link_materi
               ];
        }
       
       Materi::where('id', $id)->update($data);

       return $this->updateSuccess('materi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materi::find($id)->delete();
        return $this->deleteSuccess('materi');
    }
}
