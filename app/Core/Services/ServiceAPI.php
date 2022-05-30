<?php

namespace App\Core\Services;
use App\Core\Traits\ConsumesExternalServices;
use App\Core\Traits\SpatieLogsActivity;
use App\Models\ExchangeEvent;
use App\Models\User;
use App\Core\Services\BinanceAPI;

/*
 * Service class for requests to the smart-contract middleware layer
 */
class ServiceAPI
{
    use ConsumesExternalServices;
    use SpatieLogsActivity;


    protected string $services_api_url;
    protected string $services_api_jwt_token;
    protected array $headers;
    protected $binanceAPI;

    public function __construct()
    {
        $this->services_api_url = env("SERVICES_API_URL","http://localhost:8080");
        $this->services_api_jwt_token = env("SERVICES_API_JWT_TOKEN","");
        $this->headers = array(
            'Authorization' => 'Bearer '.$this->services_api_jwt_token,
            'Accept' => 'application/json'
        );
        $this->binanceAPI = new BinanceAPI();
    }

    public function logEvent($properties)
    {
        activity()
            ->event(debug_backtrace()[1]['function'])
            ->causedBy(auth()->user())
            ->withProperties(json_decode($properties))
            ->useLog('ServiceAPI')
            ->log(debug_backtrace()[1]['function']);
    }

    /*************************************************************************
     *
     * CRYPTO METHODS
     *
     *************************************************************************/

    /**
     * Returns the total tokens in the contract
     * @return string
     */
    public function cryptoTotalTokens()
    {
        return $this->makeRequest('GET', $this->services_api_url, 'crypto/total-tokens', null, null, null);
    }

    /**
     * Returns the balance of a given wallet address
     * @return string
     */
    public function cryptoWalletBalance(User $user)
    {
        return $this->makeRequest('GET', $this->services_api_url, "crypto/wallet-balance/$user->uuid", null, null, null);
    }

    /**
     * Returns a stored wallet
     * @return string
     */
    public function cryptoGetStoredWallet(User $user)
    {
        $formParams = array(
            'target' => $user->uuid
        );

        $request = $this->makeRequest('POST', $this->services_api_url, "crypto/get-stored-wallet", null, $formParams, $this->headers);

        return $request;
    }


    /**
     * Creates a new wallet and persists the wallet in database
     * @return string
     */
    public function cryptoCreateWallet(User $user)
    {

        $formParams = array(
            'user_uuid' => $user->uuid
        );

        $request = $this->makeRequest('POST', $this->services_api_url, "crypto/create-wallet", null, $formParams, $this->headers);

        $this->logEvent($request);

        return $request;
    }

    /**
     * Creates a new wallet and persists the wallet in database
     * @return string
     */
    public function cryptoTransfer(User $source, User $target, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'source' => $source->uuid,
            'target' => $target->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "crypto/transfer", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /**
     * Creates a new wallet and persists the wallet in database
     * @return string
     */
    public function cryptoTransferUserToVatios(User $source, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'source' => $source->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "crypto/transfer-user-to-vatios", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /**
     * Creates a new wallet and persists the wallet in database
     * @return string
     */
    public function cryptoTransferVatiosToUser(User $target, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'target' => $target->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "crypto/transfer-vatios-to-user", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /**
     * Mints new tokens into a given wallet
     * @return string
     */
    public function cryptoMint(User $target, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'target' => $target->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "crypto/mint", null, $formParams, $this->headers);

        //passar os logs para o recebimento de webhooks
        $this->logEvent($tx);

        return $tx;
    }

    /**
     * Burns existing tokens from a given wallet
     * @return string
     */
    public function cryptoBurn(User $target, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'target' => $target->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "crypto/burn", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /*************************************************************************
     *
     * ENERGY METHODS
     *
     *************************************************************************/

    /**
     * Returns the energy balance of a user

     * @return string
     */
    public function energySurplusBalance(User $user)
    {
        return $this->makeRequest('GET', $this->services_api_url, "energy/surplus-balance/$user->uuid", null, null, null);
    }

    /**
     * Transfers a given amount of energy between user and vatios
     * @return string
     */
    public function energyExchange(User $source, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'source' => $source->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "energy/exchange", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /*************************************************************************
     *
     * FIAT METHODS
     *
     *************************************************************************/

    /**
     * Creates a new wallet and persists the wallet in database
     * @return string
     */
    public function fiatTransfer(User $source, User $target, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'source' => $source->uuid,
            'target' => $target->uuid,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "fiat/transfer", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

    /**
     * Withdraw a given amount of fiat
     * @return string
     */
    public function fiatWithdraw(User $source, $bank_data, int $amount, ExchangeEvent $event)
    {
        $formParams = array(
            'source' => $source->uuid,
            'bank_data' => $bank_data,
            'amount' => $amount,
            'event'  => $event->uuid
        );

        $tx = $this->makeRequest('POST', $this->services_api_url, "fiat/withdraw", null, $formParams, $this->headers);

        $this->logEvent($tx);

        return $tx;
    }

}
