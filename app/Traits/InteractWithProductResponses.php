<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

trait InteractWithProductResponses
{

     /**
     * Decode corresponsdingly the response
     * @return stdClass
     */
    public function decodeResponse($response)
    {
        $decodeResponse = json_decode($response);
        return $decodeResponse->data ?? $decodeResponse;

    }
    public function checkIfErrorResponse($response)
    {
        if(isset($response->error)){
            throw new \Exception("Something failed:{$response->error}");
        }
    }

    public function makeRequest($method, $requestUrl, $queryParams = [])
    {

        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,
        ]);

        $response = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        if (method_exists($this, 'checkIfErrorResponse')) {
            $this->checkIfErrorResponse($response);
        }

        return $response;
    }

}



