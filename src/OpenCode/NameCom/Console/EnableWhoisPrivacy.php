<?php namespace OpenCode\NameCom\Console;

use OpenCode\NameCom\Api;
use OpenCode\NameCom\Helper\NameComApi;
use Pckg\Framework\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class EnableWhoisPrivacy
 * @package OpenCode\NameCom\Console
 */
class EnableWhoisPrivacy extends Command
{

    use NameComApi;

    /**
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName('open-code:name-com:domain:enable-whois-privacy')->addArguments([
            'domain' => 'Enable whois privacy',
        ], InputArgument::REQUIRED)->setDescription('Enable whois privacy');
    }

    /**
     * 
     */
    public function handle()
    {
        $domain = $this->argument('domain');
        $privacy = $this->getNameComApi()->domain()->enableWhoisPrivacy($domain);
        d($privacy);
    }

}