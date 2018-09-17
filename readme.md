# Yii Authentication Bridge

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/Phauthentic/authentication-yii/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-yii/)
[![Code Quality](https://img.shields.io/scrutinizer/g/Phauthentic/authentication-yii/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-yii/)

This package will allow you to lookup user credentials with your Yii application using the [Phautentic Authentication](https://github.com/Phauthentic/authentication) library.

## How to use it

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
