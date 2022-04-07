<?php

/**
 * Copyright © Amazing AG. All rights reserved.
 * See LICENSE file for license details.
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'amz_ambre',
    'title'       => 'CHANGE MY TITLE',
    'description' =>  '',
    'thumbnail'   => 'out/pictures/logo.png',
    'version'     => '0.0.1',
    'author'      => 'Amazing AG',
    'url'         => '',
    'email'       => '',
    'extend'      => [
        \OxidEsales\Eshop\Application\Model\User::class => \Amazing\AmbreModule\Model\User::class,
        \OxidEsales\Eshop\Application\Controller\StartController::class => \Amazing\AmbreModule\Controller\StartController::class
    ],
    'controllers' => [
        'oetmgreeting' => \Amazing\AmbreModule\Controller\GreetingController::class
    ],
    'templates'   => [
        'greetingtemplate.tpl' => 'amz/ambre/views/templates/greetingtemplate.tpl',
    ],
    'events' => [
        'onActivate' => '\Amazing\AmbreModule\Core\ModuleEvents::onActivate',
        'onDeactivate' => '\Amazing\AmbreModule\Core\ModuleEvents::onDeactivate'
    ],
    'blocks'      => [
        [
            //It is possible to replace blocks by theme, to do so add 'theme' => '<theme_name>' key/value in here
            'template' => 'page/shop/start.tpl',
            'block' => 'start_welcome_text',
            'file' => 'views/blocks/oetm_start_welcome_text.tpl'
        ]
    ],
    'settings' => [
        /** Main */
        [
            'group'       => 'oemoduletemplate_main',
            'name'        => 'oemoduletemplate_GreetingMode',
            'type'        => 'select',
            'constraints' => 'generic|personal',
            'value'       => 'generic'
        ],
    ],
];
