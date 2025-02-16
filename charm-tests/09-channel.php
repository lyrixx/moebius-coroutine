<?php
require(__DIR__.'/../vendor/autoload.php');

use Moebius\Coroutine as Co;
use Moebius\Coroutine\Channel;

$channel = new Channel('string');

Co::go(function() use ($channel) {
    for ($i = 0; $i < 3; $i++) {
        echo $channel->receive();
    }
});

Co::go(function() use ($channel) {
    $channel->send("A");
    Co::sleep(0.1);
    $channel->send("B");
    Co::sleep(0.1);
    $channel->send("C");
    Co::sleep(0.1);
    echo "\n";
});
