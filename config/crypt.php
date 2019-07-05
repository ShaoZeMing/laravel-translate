<?php


/**
 * 加密配置
 */

return[


    /**
     * 本项目的app_secret
     */
    'app_secret' =>env('XTHK_APP_SECRET','12345678912345678912345678912312'),

    /**
     * 加密规则,支持AES-128-CBC，AES-256-CBC
     */
    'cipher' => env('XTHK_CIPHER','AES-256-CBC'),


];
