<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use App\Models\UserModel;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($iduser)
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = UserModel::find($iduser);

        $user = UserModel::select('username')->where('id', $iduser)->first();
        $data['guru'] = Guru::where('nip', $user->username)->with('tb_mapel_guru')->first();
        $data['siswa'] = Siswa::where('nis', $user->username)->with('kelas')->first();

        
        return view('admin.profile', $data); 
    //    return Guru::where('nip', $user->username)->with('tb_mapel_guru')->first();
        
    }

    public function changePassword(ProfileRequest $request){
        $user = UserModel::where('id', $request->iduser)->first();
        $url = 'profile/' . $request->iduser;

        if($user->password !== $request->oldPassword){
            return redirect($url)->with('failed', 'Password Lama Salah');
        }

        $data = [
            'password' => $request->newPassword
        ];

        UserModel::where('id', $user->id)->update($data);
        
        return $this->addSuccess($url);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
