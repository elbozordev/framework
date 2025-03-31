<?php

function sendJsonErrorResponse(
    int $httpCode,
    string $publicMessage,
    mixed $internalErrorData = null
): void {
    http_response_code($httpCode);
    header('Content-Type: application/json; charset=UTF-8');

    $response = new stdClass();
    $response->code = $httpCode;
    $response->message = $publicMessage;

    // В dev-режиме можем добавить дополнительные данные, например стектрейс
    // или код ошибки. В prod — оставляем минимальный уровень детализации.
//    if (isDevEnvironment()) {
//        $response->debug = $internalErrorData;
//    }

    // JSON_THROW_ON_ERROR нужно оборачивать в try/catch,
    // чтобы избежать ошибок сериализации больших/неподдерживаемых данных
    try {
        echo json_encode($response, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    } catch (Throwable $jsonEx) {
        // fallback — если что-то пошло не так при сериализации
        echo json_encode([
            'code' => $jsonEx->getCode(),
            'message' => $jsonEx->getMessage()
        ]);
    }
}