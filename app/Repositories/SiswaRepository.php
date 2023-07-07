<?php

namespace App\Repositories;

use App\Models\Siswa;
use App\Models\UserModel;
use App\Repositories\Interfaces\SiswaRepositoryInterface;

class SiswaRepository implements SiswaRepositoryInterface {

    public function getDataSiswa()
    {
        return Siswa::with('kelas')->get();
    }

    public function storeDataSiswa($request)
    {
        $data = [
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'id_kelas' => $request->id_kelas
        ];

        $user = [
            'name' => $request->nama_siswa,
            'username' => $request->nis,
            'password' => '12345678',
            'role' => 'siswa'
        ];

        Siswa::create($data);
        UserModel::create($user);
    }

    public function getSiswaById($id)
    {
        return Siswa::find($id);
    }

    public function updateDataSiswa($request, $id)
    {
        $data = [
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'id_kelas' => $request->id_kelas
        ];

        Siswa::where('id', $id)->update($data);
    }

    public function deleteDataSiswa($id)
    {
        Siswa::find($id)->delete();
    }

}