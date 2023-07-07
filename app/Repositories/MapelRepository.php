<?php

namespace App\Repositories;

use App\Models\Mapel;
use App\Repositories\Interfaces\MapelRepositoryInterface;
use finfo;

class MapelRepository implements MapelRepositoryInterface {


    public function getDataMapel()
    {
        $mapel = Mapel::get();
        return $mapel;
    }

    public function storeDataMapel($data)
    {
        $mapel = [
            'mapel' => $data['mapel']
        ];

        Mapel::create($mapel);
    }

    public function getMapelById($id)
    {
        return Mapel::find($id);
    }

    public function updateDataMapel($data, $id)  
    {
        $mapel = [
            'mapel' => $data['mapel']
        ];

        Mapel::where('id', $id)->update($mapel);
    }

    public function deleteDataMapel($id)
    {
        Mapel::find($id)->delete();
       
    }

}