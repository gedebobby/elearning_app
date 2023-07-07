<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\RuangKelas;
use App\Repositories\Interfaces\KelasRepositoryInterface;
use App\Traits\Message;

class KelasRepository implements KelasRepositoryInterface {

    use Message;

    public function getDataKelas()
    {
        $kelas = Kelas::get();
        return $kelas;
        // return Kelas::join('ruang_kelas', 'ruang_kelas.id_kelas', '=', 'tb_kelas.id')->where('id_kelas', 1)->get();
    }

    public function storeDataKelas($kelas)
    {
        $data = [
            'kelas' => $kelas['kelas']
        ];

        Kelas::create($data);
    }

    public function getKelasById($id)
    {
        return Kelas::find($id);
    }

    public function updateDataKelas($kelas, $id)
    {
        $data = [
            'kelas' => $kelas['kelas']
        ];

        Kelas::where('id', $id)->update($data);
    }

    public function deleteDataKelas($id)
    {
        return Kelas::find($id)->delete();
    }

}