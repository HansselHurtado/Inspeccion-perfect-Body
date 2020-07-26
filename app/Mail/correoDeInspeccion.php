<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correoDeInspeccion extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto = "Mensaje inspeccion";
    public $mensaje;
    public $elementos;
    public $habitacion;
    public $estado;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje,$elemento, $room, $state)
    {
        $this->mensaje = $mensaje; 
        $this->elementos = $elemento;
        $this->habitacion = $room;
        $this->estado = $state;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/email');
    }
}
