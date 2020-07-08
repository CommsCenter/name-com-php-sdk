<?php namespace OpenCode\NameCom\Console;

use OpenCode\NameCom\Api;
use OpenCode\NameCom\Helper\NameComApi;
use Pckg\Framework\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class RegisterDomain
 * @package OpenCode\NameCom\Console
 */
class RegisterDomain extends Command
{

    use NameComApi;

    /**
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName('open-code:name-com:domain:register')->addArguments([
            'domain' => 'Domain name',
        ], InputArgument::REQUIRED)->addOptions(['price' => 'Purchase price'], InputOption::VALUE_REQUIRED)
            ->setDescription('Check domain availability on Name.Com');
    }

    /**
     *
     */
    public function handle()
    {
        $domain = $this->argument('domain');
        $price = $this->argument('price');
        $api = $this->getNameComApi();
        $registered = $api->domain()->register($domain, $price);
        d($registered);
    }

}