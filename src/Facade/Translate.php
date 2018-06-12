<?php

namespace ShaoZeMing\LaravelTranslate\Facade;



use Illuminate\Support\Facades\Facade;
use ShaoZeMing\Translate\TranslateService;


/**
 * Class Facade
 * @package Shaozeming\GeTui
 */
class Translate extends Facade
{
    public static function getFacadeAccessor()
    {
        return TranslateService::class;
    }
}