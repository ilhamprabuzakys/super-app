<?php

namespace App\Websockets\SocketHandler;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;

abstract class BaseSocketHandler implements MessageComponentInterface
{
   function onOpen(ConnectionInterface $conn)
   {
      dump('on opened');
   }
   function onClose(ConnectionInterface $conn)
   {
      dump('closed');
   }
   function onError(ConnectionInterface $conn, Exception $e)
   {
      dump($e);
      dump('on error');
   }
}
