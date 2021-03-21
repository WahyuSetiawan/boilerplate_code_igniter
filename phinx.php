<?php

include "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => $_ENV["database_hostname"],
                'name' => $_ENV["database_database"],
                'user' => $_ENV["database_user"],
                'pass' => $_ENV["database_password"],
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => $_ENV["database_hostname"],
                'name' => $_ENV["database_database"],
                'user' => $_ENV["database_user"],
                'pass' => $_ENV["database_password"],
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => 'mysql',
                'host' => $_ENV["database_hostname"],
                'name' => $_ENV["database_database"],
                'user' => $_ENV["database_user"],
                'pass' => $_ENV["database_password"],
                'port' => '3306',
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
