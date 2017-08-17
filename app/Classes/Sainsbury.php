<?php

namespace App;

use JonnyW\PhantomJs\Client;

class Sainsbury {

    public $client;
    public $host = "http://www.sainsburys.co.uk/shop/gb/groceries/";
    // public $host = "";

    protected function initialize() {
        $this->client = Client::getInstance();
        $this->client->getEngine()->setPath('bin\\phantomjs.exe');
        $this->client->getEngine()->addOption("--proxy=127.0.0.1:8888");
    }

    public function run() {
        $this->initialize();

        $request = $this->client->getMessageFactory()->createRequest($this->host, 'GET');
        $response = $this->client->getMessageFactory()->createResponse();

        $this->client->send($request, $response);

        if($response->getStatus() === 200) {
            echo $response->getContent();
        }


    }
}