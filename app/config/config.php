<?php

return new \Phalcon\Config(
    array(
        'database' => array(
            'adapter' => 'Mysql',
            'host' => '123.56.107.130',
            'username' => 'root',
            'password' => '000000=',
            'dbname'      => 'invo',
            'charset' => 'utf8', //数据库字符集 utf8
        ),
        'server' => array(

            'redis' => array(
                'ip' => '10.10.101.33',
                'port' => '6379',
                'auth' => 'redis'
            ),
        ),
        'application' => array(
            'modelsDir' =>  'app/models/', //用于指示代码生成器models目录在哪里
            'controllersDir' =>  'app/controllers/',//用于指示代码生成器controllersDir目录在哪里
            'viewsDir' =>  'app/views/',//用于指示代码生成器controllersDir目录在哪里
            'cacheDir' =>  'app/cache/',
            'pluginsDir' => 'app/plugins/',
            'formsDir' => 'app/forms/',
            'libraryDir' => 'app/library/',
            'baseUri' => '/',
            'cryptKey' => '#ldjB$=dp?.ak//j1V$a!d#d',// 只支持16, 24 或 32位
            //是否debug模式
            'debug' => true,
            //高级调试模式开关。
            'SeniorDebug' => false,
        ),
    ));
