<?php

namespace App\Http\Controllers;

use App\Services\Http\Bitcoin;
use App\Services\Http\Telegram;
use DateTimeImmutable;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function sendMessages(Client $clientHttp)
    {
        $bitcoinQuotation = new Bitcoin($clientHttp);
        $quotation = $bitcoinQuotation->getCurrentQuotation();

        $telegram = new Telegram($clientHttp);
        $telegram->sendMessage(
            "O bitcoin hoje está: " . 'R$' . number_format($quotation, 2, ',', '.')
        );

        $this->setStatusCode(Response::HTTP_OK);
        $this->data['quotations'] = [
            'bitcoin' => $quotation
        ];
        return $this->getResponse();
    }
}
