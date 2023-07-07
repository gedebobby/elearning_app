<?php

namespace App\Console\Commands;

use App\Models\Siswa;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class setStatusTugas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:setStatusTugas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Set Status Tugas';

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
        DB::table('tb_tugas')
        ->where('batas_tgl', '<=', Carbon::now()->format('Y-m-d'))
        ->where('batas_waktu', '<=', Carbon::now()->format('H:i:m'))->update(['status' => 0]);
        // return 0;
    }
}
