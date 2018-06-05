<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'mantenimiento' => [
            'class' => 'frontend\modules\mantenimiento\Mantenimiento',
        ],
        'procesos' => [
            'class' => 'frontend\modules\procesos\Procesos',
        ],
        'compras' => [
            'class' => 'frontend\modules\compras\Compras',
        ],
        'adecuacion' => [
            'class' => 'frontend\modules\adecuacion\Adecuacion',
        ],

        'proveduria' => [
           'class' => 'frontend\modules\proveduria\Proveduria',
        ],

        'reportes' => [
            'class' => 'frontend\modules\reportes\Reportes',
        ],

        'api' => [
            'class' => 'frontend\modules\api\Api',
        ],

        'vehiculos' => [
            'class' => 'frontend\modules\vehiculos\Vehiculos',
        ],

        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to
        // use your own export download action or custom translation
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ]
    ],

    'components' => [

        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\UserBm',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
