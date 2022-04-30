# HostmasterUA Balance Extension for EPP Client
![Build Status](https://github.com/struzik-vladislav/epp-ext-hostmasterua-balance/actions/workflows/ci.yml/badge.svg?branch=master)
[![Latest Stable Version](https://img.shields.io/github/v/release/struzik-vladislav/epp-ext-hostmasterua-balance?sort=semver&style=flat-square)](https://packagist.org/packages/struzik-vladislav/epp-ext-hostmasterua-balance)
[![Total Downloads](https://img.shields.io/packagist/dt/struzik-vladislav/epp-ext-hostmasterua-balance?style=flat-square)](https://packagist.org/packages/struzik-vladislav/epp-ext-hostmasterua-balance/stats)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![StandWithUkraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

Balance extension who was provided by [HostmasterUA](https://hostmaster.ua/).

Extension for [struzik-vladislav/epp-client](https://github.com/struzik-vladislav/epp-client) library.

## Usage
```php
<?php

use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Request\Balance\InfoBalanceRequest;

// ...

$client->pushExtension(new BalanceExtension('http://hostmaster.ua/epp/balance-1.0', $logger));

// ...

$request = new InfoBalanceRequest($client);
$request->setContract('R12/999');
$response = $client->send($request);
```
