<?php

namespace App\Core\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    /**
     * Send a request to any service
     * @return string
     */
    public function makeRequest($method, $baseUri, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $hasFile = false)
    {
        $client = new Client([
            'base_uri' => $baseUri,
        ]);

        $bodyType = 'form_params';

        if ($hasFile) {
            $bodyType = 'multipart';
            $multipart = [];

            foreach ($formParams as $name => $contents) {
                $multipart[] = [
                    'name' => $name,
                    'contents' => $contents
                ];
            }
        }

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,
            $bodyType => $hasFile ? $multipart : $formParams,
            'headers' => $headers,
        ]);

        $response = $response->getBody()->getContents();

        return $response;
    }
}
