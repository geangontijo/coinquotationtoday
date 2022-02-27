<?php

namespace App\Services\Http;

use GuzzleHttp\Client;

class Bitcoin
{
    public function __construct(private Client $clientHttp)
    {
    }

    public function getCurrentQuotation(): float
    {
        $data = $this->clientHttp->get('https://www.mercadobitcoin.net/api/BTC/ticker/');

        $data = $data->getBody()->getContents();

        if (empty($data)) {
            throw new \DomainException("Error Processing Request");
        }

        $data = json_decode($data, true);
        return $data['ticker']['buy'];
    }
}
