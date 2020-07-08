<?php namespace OpenCode\NameCom;

use GuzzleHttp\RequestOptions;
use OpenCode\NameCom\Endpoint\Domain;

class Api extends \Pckg\Api\Api
{

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * Api constructor.
     *
     * @param $endpoint
     * @param $apiKey
     */
    public function __construct(string $endpoint, string $username, string $password)
    {
        $this->endpoint = $endpoint;

        $this->requestOptions = [
            RequestOptions::AUTH => [
                $username,
                $password,
            ],
            RequestOptions::TIMEOUT => 15,
            RequestOptions::VERIFY => false,
        ];
    }

    /**
     * @return Domain
     */
    public function domain()
    {
        return new Domain($this);
    }

}