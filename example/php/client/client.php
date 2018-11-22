<?php

require_once 'vendor/autoload.php';

use Example\ExampleClient;
use Example\EchoRequest;
use Example\EchoResponse;

function request(string $requestMessage)
{
    $client = new ExampleClient('grpc_go:50051', [
        'credentials' => Grpc\ChannelCredentials::createInsecure(),
    ]);
    $request = new EchoRequest();
    $request->setMessage($requestMessage);

    list($reply, $status) = $client->Echo($request)->wait();

    /** @var EchoResponse $reply */
    return $reply->getMessage();
}

echo request('World.')."\n";
