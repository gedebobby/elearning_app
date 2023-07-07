<?php 

namespace App\Repositories\Interfaces;

interface GuruRepositoryInterface {
    public function getDataGuru();
    public function storeDataGuru($request);
    public function getGuruById($id);
    public function updateDataGuru($request, $id);  
    public function deleteDataGuru($id);
    
}