<?php namespace OpenCode\NameCom\Provider;

use OpenCode\NameCom\Api;
use OpenCode\NameCom\Console\CheckDomainAvailability;
use OpenCode\NameCom\Console\EnableWhoisPrivacy;
use OpenCode\NameCom\Console\RegisterDomain;
use Pckg\Framework\Config;
use Pckg\Framework\Provider;

/**
 * Class NameCom
 * @package OpenCode\NameCom\Provider
 */
class NameCom extends Provider
{

    /**
     * @return array|\Closure[]
     */
    public function services()
    {
        return [
            Api::class => function (Config $config) {
                $config = config('openCode.nameCom.auth', []);

                if (!$config) {
                    throw new \Exception('Name.Com config is not present.');
                }

                return new Api($config['endpoint'], $config['username'], $config['password']);
            }
        ];
    }

    /**
     * @return array|string[]
     */
    public function consoles()
    {
        return [
            CheckDomainAvailability::class,
            RegisterDomain::class,
            EnableWhoisPrivacy::class,
        ];
    }

}