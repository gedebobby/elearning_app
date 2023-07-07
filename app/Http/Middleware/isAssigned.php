<?php

namespace App\Http\Middleware;

use App\Models\HasilUjian;
use Closure;
use Illuminate\Http\Request;

class isAssigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $hasilUjian = HasilUjian::where('id_ujian', $request->idujian)
                    ->where('id_siswa', Session('id_siswa'))->count();
        
        if($hasilUjian > 0){
            return back();
        }
        
        return $next($request);
    }
}
