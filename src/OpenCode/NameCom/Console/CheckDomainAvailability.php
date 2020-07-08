<?php namespace OpenCode\NameCom\Console;

use OpenCode\NameCom\Api;
use OpenCode\NameCom\Helper\NameComApi;
use Pckg\Framework\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class CheckDomainAvailability extends Command
{

    use NameComApi;

    protected function configure()
    {
        $this->setName('open-code:name-com:domain:check-availability')->addArguments([
            'domain' => 'Domain name',
        ], InputArgument::REQUIRED)->setDescription('Check domain availability on Name.Com');
    }

    public function handle()
    {
        $domain = $this->argument('domain');
        $api = $this->getNameComApi();
        $availability = $api->domain()->checkAvailability($domain);
        d($availability);
    }

}