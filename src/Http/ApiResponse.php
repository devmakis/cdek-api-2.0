<?php

declare(strict_types=1);

namespace CdekSDK2\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class ApiResponse
 * @package CdekSDK2\Http
 */
class ApiResponse
{
    /**
     * Тело ответа
     * @var string
     */
    private $body;

    /**
     * Массив ошибок
     * @var array
     */
    private $errors = [];

    /**
     * HTTP-статус ответа
     * @var int
     */
    private $status;

    /**
     * ApiResponse constructor.
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null, ?LoggerInterface $logger = null)
    {
        if ($response === null) {
            $this->status = 500;
            $this->body = '';

            $this->errors[] = [
                'code'    => 'internal_error',
                'message' => 'Internal Server Error'
            ];
        } else {
            $this->status = $response->getStatusCode();
            $this->body = (string)$response->getBody();

            if ($logger) {
                $logger->debug('Response: {status} {uri} {headers} {body}', [
                    'status' => $response->getStatusCode(),
                    'body'   => $this->body
                ]);
            }

            if ($this->status > 199) {
                $decodeBody = json_decode($this->body, true);

                if (isset($decodeBody['requests']) && is_array($decodeBody['requests'])) {
                    foreach ($decodeBody['requests'] as $request) {
                        if (isset($request['errors']) && is_array($request['errors'])) {
                            $this->errors = $request['errors'];
                        }
                    }
                }

                if (isset($decodeBody['error'])) {
                    $this->errors[] = [
                        'code'    => $decodeBody['error'],
                        'message' => $decodeBody['error_description'] ?? $decodeBody['message'] ?? 'unknown_error'
                    ];
                }
            }
        }
    }

    /**
     * Проверка корректности выполненного запроса
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->status >= 200 && $this->status <= 299;
    }

    /**
     * Проверка наличия ошибок в запросе
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}
