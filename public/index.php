<?php
declare(strict_types=1);

use Dotenv\Dotenv;

try {
    require_once dirname(__DIR__).'/App/Config/Core.php';
    require_once dirname(__DIR__).'/vendor/autoload.php';



    /**
     * Настройки окружения
     * .env-файле.
     * ENV=development / production
     */
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $env = $_ENV['APP_ENV'] ?: 'production';

    echo $env;

} catch (Exception $e) {
    echo $e->getMessage();
}