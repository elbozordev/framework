<?php
declare(strict_types=1);

use Dotenv\Dotenv;

try {
    require_once dirname(__DIR__).'/vendor/autoload.php';
    require_once dirname(__DIR__).'/App/Config/Core.php';


    /**
     * Настройки окружения
     * .env-файле.
     * ENV=development / production
     */
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $app = new \App\Core\Engine\Application();
    $app->start();

} catch (Exception $e) {
    if (ob_get_level() > 0) {
        ob_end_clean();
    }

    sendJsonErrorResponse(500, 'Internal Server Error', [
        'exceptionMessage' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);

    exit;
}