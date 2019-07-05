<?php

namespace ShaoZeMing\LaravelCrypt\Facade;



use Illuminate\Support\Facades\Facade;
use ShaoZeMing\Crypt\CryptService;


/**
 * Class Facade
 * @package Shaozeming\GeTui
 */
class Crypt extends Facade
{
    public static function getFacadeAccessor()
    {
        return CryptService::class;
    }
}
