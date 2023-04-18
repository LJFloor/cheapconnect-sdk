# Installation

```sh
composer require ljfloor/cheapconnect-sdk
```

# Initialization
```php
// You can find your api key at https://account.cheapconnect.net/sms.php
$cheapconnect = new \CheapConnectSdk\Client('API KEY HERE');
```
# Usage
```php
$cheapconnect->SendSmsMessage('31612345678', '31612345678', 'Hello, world')
```
```php
$cheapconnect->TrySendSmsMessage('31612345678', '31612345678', 'Hello, world')
// True or False
```