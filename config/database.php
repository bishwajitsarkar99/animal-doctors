<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_second' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_second', '127.0.0.1'),
            'port' => env('DB_PORT_second', '3306'),
            'database' => env('DB_DATABASE_second', 'forge'),
            'username' => env('DB_USERNAME_second', 'forge'),
            'password' => env('DB_PASSWORD_second', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'mysql_third' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_third', '127.0.0.1'),
            'port' => env('DB_PORT_third', '3306'),
            'database' => env('DB_DATABASE_third', 'second_db_name'),
            'username' => env('DB_USERNAME_third', 'second_user'),
            'password' => env('DB_PASSWORD_third', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_four' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_four', '127.0.0.1'),
            'port' => env('DB_PORT_four', '3306'),
            'database' => env('DB_DATABASE_four', 'second_db_name'),
            'username' => env('DB_USERNAME_four', 'second_user'),
            'password' => env('DB_PASSWORD_four', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_five' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_five', '127.0.0.1'),
            'port' => env('DB_PORT_five', '3306'),
            'database' => env('DB_DATABASE_five', 'second_db_name'),
            'username' => env('DB_USERNAME_five', 'second_user'),
            'password' => env('DB_PASSWORD_five', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_six' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_six', '127.0.0.1'),
            'port' => env('DB_PORT_six', '3306'),
            'database' => env('DB_DATABASE_six', 'second_db_name'),
            'username' => env('DB_USERNAME_six', 'second_user'),
            'password' => env('DB_PASSWORD_six', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_seven' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_seven', '127.0.0.1'),
            'port' => env('DB_PORT_seven', '3306'),
            'database' => env('DB_DATABASE_seven', 'second_db_name'),
            'username' => env('DB_USERNAME_seven', 'second_user'),
            'password' => env('DB_PASSWORD_seven', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_eight' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_eight', '127.0.0.1'),
            'port' => env('DB_PORT_eight', '3306'),
            'database' => env('DB_DATABASE_eight', 'second_db_name'),
            'username' => env('DB_USERNAME_eight', 'second_user'),
            'password' => env('DB_PASSWORD_eight', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_nine' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_nine', '127.0.0.1'),
            'port' => env('DB_PORT_nine', '3306'),
            'database' => env('DB_DATABASE_nine', 'second_db_name'),
            'username' => env('DB_USERNAME_nine', 'second_user'),
            'password' => env('DB_PASSWORD_nine', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_ten' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_ten', '127.0.0.1'),
            'port' => env('DB_PORT_ten', '3306'),
            'database' => env('DB_DATABASE_ten', 'second_db_name'),
            'username' => env('DB_USERNAME_ten', 'second_user'),
            'password' => env('DB_PASSWORD_ten', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_eleven' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_eleven', '127.0.0.1'),
            'port' => env('DB_PORT_eleven', '3306'),
            'database' => env('DB_DATABASE_eleven', 'second_db_name'),
            'username' => env('DB_USERNAME_eleven', 'second_user'),
            'password' => env('DB_PASSWORD_eleven', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twelve' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twelve', '127.0.0.1'),
            'port' => env('DB_PORT_twelve', '3306'),
            'database' => env('DB_DATABASE_twelve', 'second_db_name'),
            'username' => env('DB_USERNAME_twelve', 'second_user'),
            'password' => env('DB_PASSWORD_twelve', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_thirteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_thirteen', '127.0.0.1'),
            'port' => env('DB_PORT_thirteen', '3306'),
            'database' => env('DB_DATABASE_thirteen', 'second_db_name'),
            'username' => env('DB_USERNAME_thirteen', 'second_user'),
            'password' => env('DB_PASSWORD_thirteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_fourteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_fourteen', '127.0.0.1'),
            'port' => env('DB_PORT_fourteen', '3306'),
            'database' => env('DB_DATABASE_fourteen', 'second_db_name'),
            'username' => env('DB_USERNAME_fourteen', 'second_user'),
            'password' => env('DB_PASSWORD_fourteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_fifteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_fifteen', '127.0.0.1'),
            'port' => env('DB_PORT_fifteen', '3306'),
            'database' => env('DB_DATABASE_fifteen', 'second_db_name'),
            'username' => env('DB_USERNAME_fifteen', 'second_user'),
            'password' => env('DB_PASSWORD_fifteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_sixteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_sixteen', '127.0.0.1'),
            'port' => env('DB_PORT_sixteen', '3306'),
            'database' => env('DB_DATABASE_sixteen', 'second_db_name'),
            'username' => env('DB_USERNAME_sixteen', 'second_user'),
            'password' => env('DB_PASSWORD_sixteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_seventeen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_seventeen', '127.0.0.1'),
            'port' => env('DB_PORT_seventeen', '3306'),
            'database' => env('DB_DATABASE_seventeen', 'second_db_name'),
            'username' => env('DB_USERNAME_seventeen', 'second_user'),
            'password' => env('DB_PASSWORD_seventeen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_eighteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_eighteen', '127.0.0.1'),
            'port' => env('DB_PORT_eighteen', '3306'),
            'database' => env('DB_DATABASE_eighteen', 'second_db_name'),
            'username' => env('DB_USERNAME_eighteen', 'second_user'),
            'password' => env('DB_PASSWORD_eighteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_nineteen' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_nineteen', '127.0.0.1'),
            'port' => env('DB_PORT_nineteen', '3306'),
            'database' => env('DB_DATABASE_nineteen', 'second_db_name'),
            'username' => env('DB_USERNAME_nineteen', 'second_user'),
            'password' => env('DB_PASSWORD_nineteen', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty', '127.0.0.1'),
            'port' => env('DB_PORT_twenty', '3306'),
            'database' => env('DB_DATABASE_twenty', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty', 'second_user'),
            'password' => env('DB_PASSWORD_twenty', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_one' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_one', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_one', '3306'),
            'database' => env('DB_DATABASE_twenty_one', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_one', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_one', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_two' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_two', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_two', '3306'),
            'database' => env('DB_DATABASE_twenty_two', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_two', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_two', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_three' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_three', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_three', '3306'),
            'database' => env('DB_DATABASE_twenty_three', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_three', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_three', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_four' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_four', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_four', '3306'),
            'database' => env('DB_DATABASE_twenty_four', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_four', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_four', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_five' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_five', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_five', '3306'),
            'database' => env('DB_DATABASE_twenty_five', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_five', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_five', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_six' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_six', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_six', '3306'),
            'database' => env('DB_DATABASE_twenty_six', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_six', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_six', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'mysql_twenty_seven' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_twenty_seven', '127.0.0.1'),
            'port' => env('DB_PORT_twenty_seven', '3306'),
            'database' => env('DB_DATABASE_twenty_seven', 'second_db_name'),
            'username' => env('DB_USERNAME_twenty_seven', 'second_user'),
            'password' => env('DB_PASSWORD_twenty_seven', 'second_password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA_2'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'predis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
