<?php 

namespace App\Repositories\Interfaces;

interface MapelRepositoryInterface {
    public function getDataMapel();
    public function storeDataMapel($data);
    public function getMapelByID($id);
    public function updateDataMapel($data,$id);
    public function deleteDataMapel($id);
    
    
}