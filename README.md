# Translate  for laravel5.*  or  lumen

---
[![](https://travis-ci.org/ShaoZeMing/laravel-translate.svg?branch=master)](https://travis-ci.org/ShaoZeMing/laravel-translate) 
[![](https://img.shields.io/packagist/v/ShaoZeMing/laravel-translate.svg)](https://packagist.org/packages/shaozeming/laravel-translate) 
[![](https://img.shields.io/packagist/dt/ShaoZeMing/laravel-translate.svg)](https://packagist.org/packages/stichoza/shaozeming/laravel-translate)

## Installing

```shell
$ composer require shaozeming/laravel-translate -v
```
### Laravel



```php
// config/app.php

    'providers' => [
        //...
        ShaoZeMing\LaravelTranslate\TranslateServiceProvider::class,    //This is default in laravel 5.5
    ],
```

And publish the config file: 

```shell
$ php artisan vendor:publish --provider=ShaoZeMing\\LaravelTranslate\\TranslateServiceProvider
```

if you want to use facade mode, you can register a facade name what you want to use, for example `translate`: 

```php
// config/app.php

    'aliases' => [
        'Translate' => ShaoZeMing\LaravelTranslate\Facade\Translate::class,   //This is default in laravel 5.5
    ],
```

### lumen

- 在 bootstrap/app.php 中 82 行左右：
```
$app->register( ShaoZeMing\LaravelTranslate\TranslateServiceProvider::class);
```
将 `vendor/ShaoZeMing/laravel-translate/config/translate.php` 拷贝到项目根目录`/config`目录下，并将文件名改成`translate.php`。

### configuration 

```php
// config/translate.php

     //使用什么翻译驱动
       // 目前支持这几种: "baidu", "youdao","google"
       /*
        *  默认使用google  google使用的是免费接口爬取，目前能用，为了确保稳定，请配置一个备用服务，
        */
       'defaults' => [
           'driver' => 'google',   //默认使用google翻译
           'spare_driver' => 'baidu',  // 备用翻译api ,第一个翻译失败情况下，调用备用翻译服务，填写备用翻译api 需要在下面对应的drivers中配置你参数
           'from' => 'zh',   //原文本语言类型 ，目前支持：auto【自动检测】,en【英语】,zh【中文】，jp【日语】,ko【韩语】，fr【法语】，ru【俄文】，pt【西班牙】
           'to' => 'en',     //翻译文本 ：en【英语】,zh【中文】，jp【日语】,ko【韩语】，fr【法语】，ru【俄文】，pt【西班牙】
       ],
   
   
       'drivers' => [
           'baidu' => [
               'base_url' => 'http://api.fanyi.baidu.com/api/trans/vip/translate',
               //App id of the translation api
               'app_id' => '20180611000174972',
               //secret of the translation api
               'app_key' => 'cEXha7w4elaXO23NJ2Tt',
           ],
   
           'youdao' => [
               'base_url' => 'https://openapi.youdao.com/api',
               //App id of the translation api
               'app_id' => '',
               //secret of the translation api
               'app_key' => '',
           ],
   
           'google' => [
               'base_url' => 'http://translate.google.cn/translate_a/single',
               'app_id' => '',
               'app_key' => '',
           ],
       ],


```


## Usage


```php
use Translate;

//第1种
$result = Translate::translate('你知道我对你不仅仅是喜欢');
print_r($result);




```


Example:

```php
// 更换翻译服务商
$result = Translate::setDriver('baidu')->translate('你知道我对你不仅仅是喜欢');
print_r($result);

// 更换翻译语言 可选语言请看配置文件中可定义的几种
$from="en";
$to="zh";
$result = Translate::setFromAndTo($from,$to)->translate('I love you.');
print_r($result);

```

## License

MIT

