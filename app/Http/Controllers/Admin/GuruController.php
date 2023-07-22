<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\GuruRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuruRequest;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\MapelGuru;
use App\Traits\Message;

class GuruController extends Controller

{
    use Message;
    protected $guruRepository;

    public function __construct(GuruRepositoryInterface $guruRepository)
    {
        $this->guruRepository = $guruRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['guru'] = $this->guruRepository->getDataGuru();
        $data['title'] = 'Guru';
        return view('admin.guru', $data);
    }

    public function dashboard(){
        $data['guru'] = $this->guruRepository->getDataGuru();
        $data['title'] = 'Dashboard Guru';
        return view('guru.dashboard', $data);
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
    public function store(GuruRequest $request)
    {
        $this->guruRepository->storeDataGuru($request);

        return $this->addSuccess();
    }

    public function storeGuruMapel(Request $request){

        for ($i=0; $i < count($request->id_mapel); $i++) { 
            $data[] = array(
                'id_guru' => $request->id_guru,
                'id_mapel' => $request->id_mapel[$i]
            );
        }
        MapelGuru::insert($data);
        return $this->addSuccess();
    }

    public function show($id)
    {
        $data['title'] = 'Edit Guru';
        $data['guru'] = $this->guruRepository->getGurubyId($id);
        return view('Admin.updateView.updateGuru', $data);
    }

    public function showSetGuruMapel($id){
        $data['title'] = 'Set Guru Mata Pelajaran';
        $data['guru'] = $this->guruRepository->getGurubyId($id);
        $data['mapel'] = Mapel::all();
        return view('Admin.updateView.setGuruMapel', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(GuruRequest $request, $id)
    {
        $this->guruRepository->updateDataGuru($request, $id);
        return $this->updateSuccess('guru');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->guruRepository->deleteDataGuru($id);
        return $this->deleteSuccess('guru');
    }
}
