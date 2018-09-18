# Yii Authentication Bridge

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/Phauthentic/authentication-yii/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-yii/)
[![Code Quality](https://img.shields.io/scrutinizer/g/Phauthentic/authentication-yii/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-yii/)

This package will allow you to lookup user credentials with your Yii application using the [Phautentic Authentication](https://github.com/Phauthentic/authentication) library.

## How to use it

Install it via composer.

```sh
composer require phauthentic/authentication-yii
```

### Using the Yii2 model resolver

All you need to do is to instantiate a model object and pass it to the resolver.

```php
$model = new Users();
$resolver = new YiiResolver($model);
```

You can pass a connection as well if you need to:

```php
$model = new Users();
$connection = Yii::$app->getDb();
$resolver = new YiiResolver($model, $connection);
```

For further information on how to configure identifiers and resolvers please check the documentation of [Phautentic Authentication](https://github.com/Phauthentic/authentication).

## Copyright & License

Licensed under the [MIT license](LICENSE.txt).

Copyright (c) [Phauthentic](https://github.com/Phauthentic/authentication)
