<?php
/**
 *  TestSms.php
 *
 * @author szm19920426@gmail.com
 * $Id: TestSms.php 2017-08-17 上午10:08 $
 */

namespace ShaoZeMing\LaravelCrypt\Test;
use PHPUnit\Framework\TestCase;
use ShaoZeMing\Crypt\CryptService;


class CryptTest extends TestCase
{
    protected $instance;

    public function setUp()
    {

        $file =  dirname(__DIR__) .'/config/crypt.php';
        $config = include($file);
        $this->instance = new CryptService($config);
    }


    public function testPushManager()
    {
        $this->assertInstanceOf(CryptService::class, $this->instance);
    }


    public function testPush()
    {
        echo PHP_EOL." 测试中....".PHP_EOL;
        try {
            $sign =  $this->instance->sign(['test1'=>1223,'test2'=>'234']);
            $check = $this->instance->signCheck(['test1'=>1223,'test2'=>'234'],$sign);
            print_r($sign.PHP_EOL);
            print_r($check);



            $payload =  $this->instance->encrypt(['test1'=>1223,'test2'=>'234']);
            print_r($payload.PHP_EOL);
            $data = $this->instance->decrypt($payload);
            print_r($data);
            echo PHP_EOL;
            return $sign;

        } catch (\Exception $e) {
            $err = "Error : 错误：" . $e->getMessage();
            echo $err.PHP_EOL;

        }
    }
}
