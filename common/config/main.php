<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'dateFormat' => 'php:d M Y',
            'datetimeFormat' => 'php:D d M Y h:i a',
            'decimalSeparator' => '.',
            'thousandSeparator' => ', ',
            'currencyCode' => 'RM',
        ],
        'mailqueue' => [
            'class' => 'nterms\mailqueue\MailQueue',
            'table' => '{{%mail_queue}}',
            'mailsPerRound' => 10,
            'maxAttempts' => 3,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
