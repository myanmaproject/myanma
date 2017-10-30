<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'tcpdf' => [
            'class' => 'cinghie\tcpdf\TCPDF',
        ],
        
          'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
        'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],

];
