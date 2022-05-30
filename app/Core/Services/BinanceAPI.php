<?php

namespace App\Core\Services;
use App\Core\Traits\ConsumesExternalServices;

/*
 * Service class for requests to the smart-contract middleware layer
 */
class BinanceAPI
{
    use ConsumesExternalServices;

    protected string $binance_api_url;
    protected string $binance_api_key;


    public function __construct()
    {
        $this->binance_api_url = env("BINANCE_API_URL","https://api-testnet.bscscan.com");
        $this->binance_api_key = env("BINANCE_API_KEY","");
    }

    /**
     * Returns the total tokens in the contract
     * @return string
     */
    public function txReceiptStatus(String $txhash)
    {
        $queryParams = array(
            'module' => 'transaction',
            'action' => 'gettxreceiptstatus',
            'txhash' => $txhash,
            'apikey' => $this->binance_api_key
        );

        return $this->makeRequest('GET', $this->binance_api_url, 'api', $queryParams, null, null);
    }

}
