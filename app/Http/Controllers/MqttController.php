<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\Message;

class MqttController extends Controller
{
    public function subscribe(Request $request)
    {
        $topic = $request->input('topic');

        $mqtt = MQTT::connection();
        // $mqtt->publish($topic, 'Berhasil');
        // MQTT::publish('topic', 'Berhasil');
        $mqtt->subscribe('nodemcu/data', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 1);
        $mqtt->loop(true);

        // return response()->json([
        //     'message' => 'Berlangganan pada topik ' . $topic,
        // ]);
    }

    public function publish(Request $request)
    {
        $topic = $request->input('topic');
        $payload = $request->input('payload');

        // MQTT::publish($topic, $payload);
        $mqtt = MQTT::connection();
        $mqtt->publish($topic, $payload);

        return response()->json([
            'message' => 'Pesan MQTT dipublikasikan pada topik ' . $topic,
        ]);
    }
}
