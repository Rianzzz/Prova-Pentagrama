<?php

namespace App\Services;

use GuzzleHttp\Client;

class ViaCepService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buscaCep($cep)
    {
        $response = $this->client->get("https://viacep.com.br/ws/{$cep}/json/");
        return json_decode($response->getBody(), true);
    }
}
