Lumen Redis Provider
==============

重载 Illuminate redis 连接方法, 连接之前增加ping，检查redis服务器是可用

## Installation

You can install the package via composer:

```bash
composer require illuminate/redis
composer require liugj/lumen-redis-provider
```

You must add the Scout service provider and the package service provider in your `bootstrap/app.php` line 80 config:

```php
$app->register(Liugj\Providers\RedisServiceProvider::class);
```

