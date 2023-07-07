<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function login(){
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }

    public function authenticate(LoginRequest $request){

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $check = UserModel::where([
            'username' => $data['username'],
            'password' => $data['password']])->first();

            
        if ($check) {
            $siswa = Siswa::where('nis', $check->username)->first();
            $guru = Guru::where('nip', $check->username)->first();
            // $request->session()->regenerate();
            $request->session()->put('role', $check->role);
            $request->session()->put('userID', $check->username);
            $request->session()->put('name', $check->name);
            $request->session()->put('idUser', $check->id);
            

            if (Session('role') == 'admin') {
                return redirect()->intended('admin');
            } elseif (Session('role') == 'guru') {
                $request->session()->put('id_guru', $guru->id);
                return redirect()->intended('dashboardguru');
            } elseif (Session('role') == 'siswa') {
                $request->session()->put('id_kelas', $siswa->id_kelas);
                $request->session()->put('id_siswa', $siswa->id);
                return redirect()->intended('student');
            }
        } else {
            return back()->with('msg', 'Username/NIK atau Password Salah');
        }

    }

    public function logout(){
        if (Session::has('role')) {
            Session::pull('role');
            return redirect('/');
        }
    }


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
    public function show($id)
    {
        //
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
