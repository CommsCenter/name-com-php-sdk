<?php namespace OpenCode\NameCom\Helper;

use OpenCode\NameCom\Api;

/**
 * Trait NameComApi
 * @package OpenCode\NameCom\Helper
 */
trait NameComApi
{

    /**
     * @return Api
     */
    private function getNameComApi()
    {
        return resolve(Api::class);
    }

}