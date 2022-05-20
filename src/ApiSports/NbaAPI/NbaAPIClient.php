<?php

namespace ApiSports\NbaAPI;

use Illuminate\Support\Facades\Http;
use ApiSports\NbaAPI\Exceptions\ApiRequestException;

class NbaAPIClient {

    /* @var $client Client */
    // protected $client;
    protected $apiKey;
    
    public function __construct()
    {
        // $options = [
        //     'base_uri'  => 'https://api-nba-v1.p.rapidapi.com/seasons',
        // ];
        // $this->client = new Client($options);
        $this->apiKey = config('nba-api.api_key');
        if(empty($this->apiKey)) throw new \InvalidArgumentException('No API key set');
    }

    protected function call($url, $hasData = false)
    {
        $query = [
            'api_token' => $this->apiKey,
            'per_page' => $this->perPage,
            'page' => $this->page
        ];

        $response = $this->client->get($url, ['query' => $query]);

        $body = json_decode($response->getBody()->getContents());

        /*
        if(property_exists($body, 'error'))
        {
            if(is_object($body->error))
            {
                throw new ApiRequestException($body->error->message, $body->error->code);
            }
            else
            {
                throw new ApiRequestException($body->error, 500);
            }

            return $response;
        }

        if($hasData && $this->withoutData)
        {
            return $body->data;
        }
        */

        return $body;
    }

    protected function callData($url)
    {
        return $this->call($url, true);
    }
}
