<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Message;
use PhpMqtt\Client\ConnectionSettings;


class MqttMessageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Message $message)
    {
         // Lakukan tindakan yang sesuai dengan pesan MQTT yang diterima
        // Contoh: Tampilkan pesan ke konsol
        echo "Pesan diterima: " . $message->getPayload() . "\n";
    }
}
