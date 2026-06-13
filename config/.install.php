<?php
/**
 * Этот файл является частью виджета веб-приложения RosGear.
 * 
 * Файл конфигурации установки виджета.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

return [
    'use'         => FRONTEND,
    'id'          => 'rg.wd.kcaptcha',
    'category'    => 'captcha',
    'name'        => 'KCaptcha',
    'description' => 'Protection against automatic spam',
    'namespace'   => 'Rg\Widget\KCaptcha',
    'path'        => '/rg/rg.wd.kcaptcha',
    'locales'     => ['ru_RU', 'en_GB'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'RG Workspace'],
        ['app', 'code' => 'RG CMS'],
        ['app', 'code' => 'RG CRM'],
    ]
];
