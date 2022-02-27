<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    private array $returnData = [
        'errors' => [
            'not implemented'
        ]
    ];
    protected array $data = [];
    private int $statusCode = Response::HTTP_NOT_IMPLEMENTED;

    protected function getResponse(): Response
    {
        $return = $this->returnData;
        $return['data'] = $this->data;
        return new JsonResponse($return, $this->statusCode);
    }

    public function setStatusCode(int $statusCode)
    {
        if ($statusCode > 199 && $statusCode < 300) {
            unset($this->returnData['errors']);
        }

        $this->statusCode = $statusCode;
    }
}
