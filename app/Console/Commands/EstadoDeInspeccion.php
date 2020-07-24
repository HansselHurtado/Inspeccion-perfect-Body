<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Room;

class EstadoDeInspeccion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambiar el estado de la inspeccion a las habitaciones';

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
        $rooms = Room::all();
        foreach ($rooms as $room) {
            $room->estado_de_inspeccion = 1;
            $room->save();
        }
    }
}
