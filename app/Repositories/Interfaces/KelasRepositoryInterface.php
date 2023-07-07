<?php 

namespace App\Repositories\Interfaces;

interface KelasRepositoryInterface {
    public function getDataKelas();
    public function storeDataKelas($kelas);
    public function getKelasById($id);
    public function updateDataKelas($kelas, $id);
    public function deleteDataKelas($id);
}