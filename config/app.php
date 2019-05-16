<?php
use Cake\Database\Driver\Mysql;
use Cake\Database\Connection;
use Cake\Cache\Engine\FileEngine;
use Cake\Error\ExceptionRenderer;
use Cake\Log\Engine\FileLog;

// @formatter:off
$debug = filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN);
return [
    'debug' => $debug ,
    'App' => [
        'namespace' => 'App',
        'encoding' => env('APP_ENCODING', 'UTF-8'),
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
        'defaultTimezone' => env('APP_DEFAULT_TIMEZONE', 'UTC'),
        'base' => false,
        'dir' => 'src',
        'webroot' => 'webroot',
        'wwwRoot' => WWW_ROOT,
        //'baseUrl' => env('SCRIPT_NAME'),
        'fullBaseUrl' => false,
        'imageBaseUrl' => 'img/',
        'cssBaseUrl' => 'css/',
        'jsBaseUrl' => 'js/',
        'paths' => [
            'plugins' => [ROOT . DS . 'plugins' . DS],
            'templates' => [APP . 'Template' . DS],
            'locales' => [APP . 'Locale' . DS],
        ],
    ],

    'Security' => [
        'salt' => env('SECURITY_SALT', 'f4d542285a6b752ac0056dbd91ca5161af20132ee8ae72245a155a98dc94f910'),
    ],

    'Asset' => [
        'timestamp' => true,
         'cacheTime' => '+1 year'
    ],

    'Cache' => [
        'default' => [
            'className' => FileEngine::class,
            'path' => CACHE,
            'mask'=> 0666,
            'url' => env('CACHE_DEFAULT_URL', null),
        ],

        '_cake_core_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_core_',
            'path' => CACHE . 'persistent/',
            'serialize' => true,
            'duration' => '+1 hours',
            'mask'=> 0666,
            'url' => env('CACHE_CAKECORE_URL', null),
        ],

        '_cake_model_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_model_',
            'path' => CACHE . 'models/',
            'serialize' => true,
            'duration' => '+1 hours',
            'mask'=> 0666,
            'url' => env('CACHE_CAKEMODEL_URL', null),
        ],

        '_cake_routes_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_routes_',
            'path' => CACHE,
            'serialize' => true,
            'duration' => '+1 hours',
            'mask'=> 0666,
            'url' => env('CACHE_CAKEROUTES_URL', null),
        ],
    ],

    'Error' => [
        'errorLevel' => E_ALL,
        'exceptionRenderer' => ExceptionRenderer::class,
        'skipLog' => [],
        'log' => true,
        'trace' => $debug,
    ],

    'EmailTransport' => [
        'default' => [
            'className' => 'Debug',
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],

    'Email' => [
        'default' => [
            'transport' => 'default',
            'from' => 'sendonly@example.com'
        ],
    ],

    'Datasources' => [
        'default' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'host' => 'localhost',
            'port' => '3306',
            'username' => 'cakephp',
            'password' => 'cakephp',
            'database' => 'cakephp_demo',
            'encoding' => 'utf8mb4',
            'timezone' => '+09:00',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => $debug,
            'quoteIdentifiers' => false,
            'url' => env('DATABASE_URL', null),
        ],

        'test' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'host' => 'localhost',
            'port' => '3306',
            'username' => 'cakephp',
            'password' => 'cakephp',
            'database' => 'cakephp_demo_test',
            'encoding' => 'utf8mb4',
            'timezone' => '+09:00',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => $debug,
            'quoteIdentifiers' => false,
            'url' => env('DATABASE_TEST_URL', null),
        ],
    ],

    'Log' => [
        'debug' => [
            'className' => FileLog::class,
            'path' => LOGS,
            'file' => 'info.' . date("Y.m.d"),
            'url' => env('LOG_DEBUG_URL', null),
            'scopes' => false,
            'levels' => ['notice', 'info', 'debug'],
            'mask'=> 0666,
            'size'=>0,
        ],
        'error' => [
            'className' => FileLog::class,
            'path' => LOGS,
            'file' => 'error.' . date("Y.m.d"),
            'url' => env('LOG_ERROR_URL', null),
            'scopes' => false,
            'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
            'mask'=> 0666,
            'size'=>0,
        ],
        'queries' => [
            'className' => FileLog::class,
            'path' => LOGS,
            'file' => 'queries.' . date("Y.m.d"),
            'url' => env('LOG_QUERIES_URL', null),
            'scopes' => ['queriesLog'],
            'mask'=> 0666,
            'size'=>0,
        ],
    ],

    'Session' => [
        'defaults' => 'php',
    ],
];
