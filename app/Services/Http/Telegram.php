<?php

namespace App\Services\Http;

use GuzzleHttp\Client;

class Telegram
{
    private string $botToken;

    public function __construct(private Client $httpClient)
    {
        $this->botToken = env('TELEGRAM_BOT_TOKEN');
    }

    public function sendMessage(string $message)
    {
        $this->httpClient->get("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
            'query' => [
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'parse_mode' => 'Markdown',
                'text' => $message
            ]
        ]);
    }
}
