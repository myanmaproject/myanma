<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  
       
       'timeZone' => 'Asia/Bangkok',
     

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
