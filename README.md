# Instalation
Install package with composer

``$ composer require commscenter/name-com-php-sdk``

# Usage

## Standalone
Instantiate new ``OpenCode\NameCom\Api`` class and pass ``endpoint``, ``username`` and ``token``.

``$api = new \OpenCode\NameCom\Api('endpoint', 'username', 'token');``

## Pckg framework
Add provider ``OpenCode\NameCom\Provider\NameCom`` and auto resolve ``Api`` object.

`` $api = resolve(\OpenCode\NameCom\Provider\NameCom::class) ``

# Endpoints
# Domain
``$api->domain()->checkAvailability('yourdomain.com');``
``$api->domain()->register('yourdomain.com');``