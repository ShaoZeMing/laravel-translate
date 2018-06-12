<?php
/**
 *  TestSms.php
 *
 * @author szm19920426@gmail.com
 * $Id: TestSms.php 2017-08-17 上午10:08 $
 */

namespace ShaoZeMing\LaravelTranslate\Test;
use PHPUnit\Framework\TestCase;
use ShaoZeMing\Translate\TranslateService;


class TranslateTest extends TestCase
{
    protected $instance;

    public function setUp()
    {

        $file =  dirname(__DIR__) .'/config/translate.php';
        $config = include($file);
        $this->instance = new TranslateService($config);
    }


    public function testPushManager()
    {
        $this->assertInstanceOf(TranslateService::class, $this->instance);
    }


    public function testPush()
    {
        echo PHP_EOL."翻译中....".PHP_EOL;
        try {
            $result =  $this->instance->translate('你知道我对你不仅仅是喜欢');
            print_r($result);
            return $result;
        } catch (\Exception $e) {
            $err = "Error : 错误：" . $e->getMessage();
            echo $err.PHP_EOL;

        }
    }
}
