<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Habitaciones
        $room = new Room();
        $room->name = "Consultorio";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "1";
        $room->save();

        $room = new Room();
        $room->name = "Admisiones";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "1";
        $room->save();

        $room = new Room();
        $room->name = "UCI";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "2";
        $room->save();

        $room = new Room();
        $room->name = "Cirugia";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "2";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 301";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "3";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 302";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "3";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 401";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "4";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 402";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "4";
        $room->save();

        $room = new Room();
        $room->name = "Consultorio 501";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "5";
        $room->save();

        $room = new Room();
        $room->name = "Cocina";
        $room->estado_de_inspeccion = "1";
        $room->floor_id = "5";
        $room->save();
    }
    
}
