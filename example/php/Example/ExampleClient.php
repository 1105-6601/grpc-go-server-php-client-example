<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Example;

/**
 */
class ExampleClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Example\EchoRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Echo(\Example\EchoRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/example.Example/Echo',
        $argument,
        ['\Example\EchoResponse', 'decode'],
        $metadata, $options);
    }

}
