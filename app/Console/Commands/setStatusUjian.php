<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class setStatusUjian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:setStatusUjian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Status Ujian Automatic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // if( $ujian->tgl_mulai == Carbon::now()->format('Y-m-d') && 
        //     Carbon::now()->format('H:i:m') >= $ujian->endtime ||
        //     Carbon::now()->format('Y-m-d') > $ujian->tgl_mulai
        //     ){
        //         return back()->with('msg', 'Waktu sudah habis, tidak bisa kumpul ujian');
        // } 
        DB::table('tb_ujian')
        ->where(function ($query) {
            $query->where('endtime', '<=', Carbon::now()->format('H:i:m'))
                    ->where('tgl_mulai', '=', Carbon::now()->format('Y-m-d'));
        })
        ->orWhere(function ($query) {
            $query->where('endtime', '<=', Carbon::now()->format('H:i:m'))
                    ->where('tgl_mulai', '<', Carbon::now()->format('Y-m-d'));
        })->update(['status' => 1]);

        // return 0;
    }
}
