# Balance Extension for EPP Client

Balance extension who was provided by Hostmaster LLC (https://hostmaster.ua/).

Extension for struzik-vladislav/epp-client library.

## Usage
```php
<?php

use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Request\Balance\Info;

// ...

$client->pushExtension(new BalanceExtension('http://hostmaster.ua/epp/balance-1.0', $logger));

// ...

$request = new Info($client);
$request->setContract('R12/999');
$response = $client->send($request);
```
