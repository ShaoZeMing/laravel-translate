# Crypt  for laravel5.*  or  lumen

---
[![](https://travis-ci.org/ShaoZeMing/laravel-crypt.svg?branch=master)](https://travis-ci.org/ShaoZeMing/laravel-crypt) 
[![](https://img.shields.io/packagist/v/ShaoZeMing/laravel-crypt.svg)](https://packagist.org/packages/shaozeming/laravel-crypt) 
[![](https://img.shields.io/packagist/dt/ShaoZeMing/laravel-crypt.svg)](https://packagist.org/packages/shaozeming/laravel-crypt)

## Installing

```shell
$ composer require shaozeming/laravel-crypt -v
```
### Laravel



```php
// config/app.php

    'providers' => [
        //...
        ShaoZeMing\LaravelCrypt\CryptServiceProvider::class,    //This is default in laravel 5.5
    ],
```

And publish the config file: 

```shell
$ php artisan vendor:publish --provider=ShaoZeMing\\LaravelCrypt\\CryptServiceProvider
```

if you want to use facade mode, you can register a facade name what you want to use, for example `crypt`: 

```php
// config/app.php

    'aliases' => [
        'MingCrypt' => ShaoZeMing\LaravelCrypt\Facade\Crypt::class,   //This is default in laravel 5.5
    ],
```

### lumen

- 在 bootstrap/app.php 中 82 行左右：
```
$app->register( ShaoZeMing\LaravelCrypt\CryptServiceProvider::class);
```
将 `vendor/ShaoZeMing/laravel-crypt/config/crypt.php` 拷贝到项目根目录`/config`目录下，并将文件名改成`crypt.php`。

### configuration 

```php
// config/crypt.php

    
    /**
     * 本项目的app_secret
     */
    'app_secret' =>env('XTHK_APP_SECRET','12345678912345678912345678912312'),

    /**
     * 加密规则,支持AES-128-CBC，AES-256-CBC
     */
    'cipher' => env('XTHK_CIPHER','AES-256-CBC'),


```


## Usage


```php
use Crypt;

//第1种
$result = Crypt::crypt('你知道我对你不仅仅是喜欢');
print_r($result);




```


Example:

```php
// 更换翻译服务商
$result = Crypt::setDriver('baidu')->crypt('你知道我对你不仅仅是喜欢');
print_r($result);

// 更换翻译语言 可选语言请看配置文件中可定义的几种
$from="en";
$to="zh";
$result = Crypt::setFromAndTo($from,$to)->crypt('I love you.');
print_r($result);

```

## License

MIT

