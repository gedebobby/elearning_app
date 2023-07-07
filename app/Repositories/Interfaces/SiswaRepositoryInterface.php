<?php 

namespace App\Repositories\Interfaces;

Interface SiswaRepositoryInterface {
    public function getDataSiswa();
    public function storeDataSiswa($request);
    public function getSiswaByID($id);
    public function updateDataSiswa($request, $id);
    public function deleteDataSiswa($id);

    
}