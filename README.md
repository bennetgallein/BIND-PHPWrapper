# BIND-PHPWrapper

This a PHP Library to communincate with the [Python REST API](https://github.com/bennetgallein/BIND-PythonAPI) for BIND DNS-Server.

## Installation
`composer require bennetgallein/bind-php-wrapper`

## Getting started

This library requires the Python API to be setup up correctly and working. If that is the case, follow these Instructions:
### create new BIND Instance:
```php
$bind = new BIND("192.168.1.104", 5000, false);
```
Parameters:
- IP (no default)
- Port (default: 5000)
- HTTPS (default: false)
Important: Only use http if you are in a safe local enviorment. Otherwise a Reverse Proxy is the way to go!

### List all Records for a Zone:
```php
$a = $bind->getZone("gallein2.de");
```
This returns a new `Zone` Object:
```php
$a->getDomain(); // returns the Domains name
$a->getRecords(); // returns an array of Record-Objects
```

The `Record` Object:
```php
foreach ($a->getRecords() as $record) {
    echo $record->getName(); // The name, like '@', 'wwww', 'test', 'test2', ...
    echo $record->getAnswer(); // the response the DNS Server will give
    echo $record->getRecordType(); // the Record Type, like 'A', 'AAAA', 'MX', ...
    echo $record->getTTL(); // The TTL (Time To Live) of the Entry.
}
```

### Update/set a Record:

```php
$res = $bind->addRecord("gallein2.de", "86400", "A", "192.168.1.1");
if ($res) {
    // yeah, success
} else {
    // no success
}
```

### Delete a Record:

```php
$res = bind->deleteRecord("gallein2.de", "86400", "A", "192.168.1.1");
if ($res) {
    // yeah, success
} else {
    // no success
}
```

## Contributions and Issues are open 