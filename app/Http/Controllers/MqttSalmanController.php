<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Salman\Mqtt\Facades\Mqtt;

class MqttSalmanController extends Controller
{
    // publishing topic
    public function SendMsgViaMqtt($topic, $message)
    {
        $output = Mqtt::ConnectAndPublish("topic-baru", "aku-adalah-pesan");

        if ($output === true)
        {
            return true;
        }

        return false;
    }

    //subscribing topic
    public function SubscribetoTopic($topic)
    {
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        });
    }
}
