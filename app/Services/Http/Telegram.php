<?php

namespace App\Services\Http;

use GuzzleHttp\Client;

class Telegram
{
    private string $botToken;

    public function __construct(private Client $httpClient)
    {
        $this->botToken = '5050062512:AAFDl8kVeBf6PEJDONn0QgG3qzP8YdqfN-Y';
    }

    public function sendMessage(string $message)
    {
        $this->httpClient->get("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
            'query' => [
                'chat_id' => -616980295,
                'parse_mode' => 'Markdown',
                'text' => $message
            ]
        ]);
    }
}
