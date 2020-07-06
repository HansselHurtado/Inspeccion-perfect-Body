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
        $room->floor_id = "1";
        $room->save();

        $room = new Room();
        $room->name = "Admisiones";
        $room->floor_id = "1";
        $room->save();

        $room = new Room();
        $room->name = "UCI";
        $room->floor_id = "2";
        $room->save();

        $room = new Room();
        $room->name = "Cirugia";
        $room->floor_id = "2";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 301";
        $room->floor_id = "3";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 302";
        $room->floor_id = "3";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 401";
        $room->floor_id = "4";
        $room->save();

        $room = new Room();
        $room->name = "Habitacion 402";
        $room->floor_id = "4";
        $room->save();

        $room = new Room();
        $room->name = "Consultorio 501";
        $room->floor_id = "5";
        $room->save();

        $room = new Room();
        $room->name = "Cocina";
        $room->floor_id = "5";
        $room->save();
    }
    
}
