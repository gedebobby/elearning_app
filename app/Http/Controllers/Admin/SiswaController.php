<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\SiswaRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;

class SiswaController extends Controller
{
    protected $siswaRepository;
    use Message;

    public function __construct(SiswaRepositoryInterface $siswaRepository)
    {
        $this->siswaRepository = $siswaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['siswa'] = $this->siswaRepository->getDataSiswa();
        $data['kelas'] = Kelas::get();
        $data['title'] = 'Siswa';
        $data['msg'] = $this->successMsg();
        return view('admin.siswa', $data);
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
    public function store(SiswaRequest $request)
    {
        $this->siswaRepository->storeDataSiswa($request);

        return $this->addSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['siswa'] = $this->siswaRepository->getSiswaByID($id);
        $data['kelas'] = Kelas::get();
        return view('Admin.updateView.updateSiswa', $data);
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
    public function update(SiswaRequest $request, $id)
    {
        $this->siswaRepository->updateDataSiswa($request, $id);
        return $this->updateSuccess('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->siswaRepository->deleteDataSiswa($id);
        return $this->deleteSuccess('siswa');
    }
}
