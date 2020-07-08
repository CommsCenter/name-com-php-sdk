<?php namespace OpenCode\NameCom\Endpoint;

use GuzzleHttp\RequestOptions;
use Pckg\Api\Endpoint;

/**
 * Class Domain
 * @package OpenCode\NameCom\Endpoint
 */
class Domain extends Endpoint
{

    public const URL_CREATE_DOMAIN = 'domains';

    public const URL_CHECK_AVAILABILITY = 'domains:checkAvailability';

    public const URL_PURCHASE_PRIVACY = 'domains/{domainName}:purchasePrivacy';

    public const URL_ENABLE_WHOIS_PRIVACY = 'domains/{domainName}:enableWhoisPrivacy';

    /**
     * CheckAvailability will check a list of domains to see if they are purchaseable. A Maximum of 50 domains can be specified.
     *
     * @param string $domain
     * @return array|mixed|null
     */
    public function checkAvailability(string $domain)
    {
        return $this->postAndDataResponse([], static::URL_CHECK_AVAILABILITY, 'results', [
            RequestOptions::JSON => [
                'domainNames' => [$domain],
            ]
        ])->data();
    }

    /**
     * CreateDomain purchases a new domain. Domains that are not regularly priced require the purchase_price field to be specified.
     *
     * @param string $domain
     * @param null $price
     * @return array|mixed|null
     */
    public function register(string $domain, $price = null)
    {
        return $this->postAndDataResponse([], static::URL_CREATE_DOMAIN, 'domain', [
            RequestOptions::JSON => [
                'domain' => [
                    'domainName' => $domain,
                    'purchase_price' => $price,
                ],
            ],
        ])->data();
    }

    /**
     * PurchasePrivacy will add Whois Privacy protection to a domain or will an renew existing subscription.
     *
     * @param string $domain
     * @return array|mixed|null
     */
    public function purchasePrivacy(string $domain)
    {
        return $this->postAndDataResponse([], str_replace('{domainName}', $domain, static::URL_PURCHASE_PRIVACY), true)->data();
    }

    /**
     * EnableWhoisPrivacy enables the domain to be private
     *
     * @param string $domain
     * @return array|mixed|null
     */
    public function enableWhoisPrivacy(string $domain)
    {
        return $this->postAndDataResponse([], str_replace('{domainName}', $domain, static::URL_ENABLE_WHOIS_PRIVACY), true)->data();
    }

    /**
     * SetContacts will set the contacts for the Domain.
     */
    public function setContacts()
    {
        $data = [
            'contacts' => [
                'registrant' => [
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'address1' => '123 Main St.',
                    'city' => 'Denver',
                    'state' => 'CO',
                    'country' => 'US',
                    'phone' => '+1.3035551212',
                ],
                'admin' => [
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'address1' => '123 Main St.',
                    'city' => 'Denver',
                    'state' => 'CO',
                    'country' => 'US',
                    'phone' => '+1.3035551212',
                ],
                'tech' => [
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'address1' => '123 Main St.',
                    'city' => 'Denver',
                    'state' => 'CO',
                    'country' => 'US',
                    'phone' => '+1.3035551212',
                ],
                'billing' => [
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'address1' => '123 Main St.',
                    'city' => 'Denver',
                    'state' => 'CO',
                    'country' => 'US',
                    'phone' => '+1.3035551212',
                ],
            ],
        ];
    }

}