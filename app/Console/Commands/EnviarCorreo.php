<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Registro;
use Illuminate\Support\Facades\Mail; 
use App\Mail\correoDeInspeccion;
use Carbon\Carbon;

class EnviarCorreo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:correo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        /*$i=0;
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $registros = Registro::all();        
        foreach($registros as $registro){
            if($registro->state_id == 2 || $registro->state_id == 5 || $registro->state_id == 8 ){
                if($registro->fecha == $date){
                    $i++;
                }
            }
        }
        if($i>0){
            $mensaje = "Hay que revisar algunos pisos";
            Mail::to('hansselhurtado@gmail.com')->send(new correoDeInspeccion($mensaje));
        }*/
    }
}
