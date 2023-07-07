<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MapelRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\MapelRepositoryInterface;
use App\Traits\Message;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    use Message;
    protected $mapelRepository;

    public function __construct(MapelRepositoryInterface $mapelRepository)
    {
        $this->mapelRepository = $mapelRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
        $data['mapel'] = $this->mapelRepository->getDataMapel();
        return view('admin.mapel', $data);
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
    public function store(MapelRequest $request)
    {
        $this->mapelRepository->storeDataMapel($request);
        // return $this->addSuccess('store');
        return back()->with('success', 'Berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Edit Mapel';
        $data['mapel'] = $this->mapelRepository->getMapelByID($id);
        return view('Admin.updateView.updateMapel', $data);
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
    public function update(MapelRequest $request, $id)
    {
        $this->mapelRepository->updateDataMapel($request, $id);
        return $this->updateSuccess('mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mapelRepository->deleteDataMapel($id);
        return $this->deleteSuccess('mapel');
    }
}
