<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Consult
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $surgery;     //lo guarda como propiedad publica
                        

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($surgery)  //recibe lo q se elige en cirugia para un candidato 
    {
        $this->surgery = $surgery;    //guarda la información que se transmitirá junto al evento
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
