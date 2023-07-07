<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KelasRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\KelasRepositoryInterface;
use App\Traits\Message;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    use Message;

    protected $kelasRepository;

    public function __construct(KelasRepositoryInterface $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data['title'] = 'Kelas';
        $data['kelas'] = $this->kelasRepository->getDataKelas();
        return view('admin.kelas')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        $this->kelasRepository->storeDataKelas($request);
        return $this->addSuccess('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Edit Kelas';
        $data['kelas'] = $this->kelasRepository->getKelasByID($id);
        return view('Admin.updateView.updateKelas', $data);
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
    public function update(KelasRequest $request, $id)
    {
        $this->kelasRepository->updateDataKelas($request, $id);
        return $this->updateSuccess('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->kelasRepository->deleteDataKelas($id);
        return $this->deleteSuccess('kelas');
    }
}
