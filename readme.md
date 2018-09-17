# Yii Authentication Bridge

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
