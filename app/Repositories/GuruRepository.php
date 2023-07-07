<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Models\UserModel;
use App\Repositories\Interfaces\GuruRepositoryInterface;

class GuruRepository implements GuruRepositoryInterface {

    public function getDataGuru()
    {
        return Guru::get();
    }

    public function storeDataGuru($request)
    {
        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip
        ];

        $user = [
           'name' => $request->nama_guru,
           'username' => $request->nip,
           'password' => '12345678',
           'role' => 'guru'
        ];

        Guru::create($data);
        UserModel::create($user);
    }

    public function getGuruById($id)
    {
       return Guru::find($id);
    }

    public function updateDataGuru($request, $id)
    {
        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip
        ];

        Guru::where('id', $id)->update($data);
    }
    
    public function deleteDataGuru($id)
    {
        Guru::find($id)->delete();
    }

}