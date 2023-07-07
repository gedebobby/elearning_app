<?php

namespace App\Traits;

trait Message
{

    public function successMsg()
    {
       $html = "<div class='alert alert-success alert-dismissible' role='alert'>
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>×</span>
       </button>
       <h6><i class='fas fa-check'></i><b> Success!</b></h6>
       {{session('success')}}
     </div>";

     return $html;
    }
    
    public function getData($data)
    {
        return response()->json([
            'data'=>$data]);
    }

    public function addSuccess()
    {

       
        return back()->with('success', 'Berhasil Tambah Data');
        
        // elseif($method=='update'){
        //     return redirect()->with(['success' => 'Data Berhasil Diubah!']);
        // }
        // if ($method == 'store') {
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Data Berhasil Disimpan'
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Data Berhasil Diupdate'
        //     ]);
        // }
    }

    public function updateSuccess($url)
    {
        $url = '/'. $url;
        return redirect($url)->with('success', 'Data Berhasil Diupdate');
    }

    public function deleteSuccess($url)
    {
       $url = '/' . $url;
       return redirect($url)->with('success', 'Data Berhasil Dihapus');
    }
}
