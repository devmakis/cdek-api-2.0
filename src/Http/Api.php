<?php

declare(strict_types=1);

namespace CdekSDK2\Http;

use CdekSDK2\Constants;
use CdekSDK2\Exceptions\AuthCacheFileException;
use CdekSDK2\Exceptions\AuthException;
use CdekSDK2\Exceptions\RequestException;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Uri;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerAwareTrait;

/**
 * Class Api
 * @package CdekSDK2\Http
 */
class Api
{
    use LoggerAwareTrait;

    private const AUTH_URL = '/oauth/token?parameters';

    /**
     * Аккаунт сервиса интеграции
     * @var string
     */
    private $account;

    /**
     * Секретный пароль сервиса интеграции
     * @var string
     */
    private $secure;

    /**
     * Тестовые настройки интеграции
     * @var bool
     */
    private $test = false;

    /**
     * @var string
     */
    private $token = '';

    /**
     * @var int
     */
    private $expire = 0;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $authCacheFile;

    /**
     * Api constructor.
     * @param ClientInterface $http
     * @param string|null $account
     * @param string|null $secure
     */
    public function __construct(ClientInterface $http, string $account = null, string $secure = null)
    {
        $this->account = $account ?? '';
        $this->secure = $secure ?? '';
        $this->client = $http;
    }

    /**
     * @param string $authCacheFile
     */
    public function setAuthCacheFile(string $authCacheFile): void
    {
        $this->authCacheFile = $authCacheFile;
    }

    /**
     *
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @param string $account
     */
    public function setAccount(string $account): void
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getSecure(): string
    {
        return $this->secure;
    }

    /**
     * @param string $secure
     */
    public function setSecure(string $secure): void
    {
        $this->secure = $secure;
    }

    /**
     * @return bool
     */
    public function isTest(): bool
    {
        return $this->test;
    }

    /**
     * @param bool $test
     */
    public function setTest(bool $test): void
    {
        $this->test = $test;
        if ($test) {
            $this->account = Constants::TEST_ACCOUNT;
            $this->secure = Constants::TEST_SECURE;
        }
    }

    /**
     * Авторизация клиента в сервисе Интеграции
     * @return bool
     * @throws AuthException
     * @throws RequestException
     */
    public function authorize(): bool
    {
        if ($this->token && $this->expire > 0 && !$this->isExpired()) {
            return true;
        }

        $tokenInfo = [];
        // Если данные авторизации кэшируются, то читаем из кэша
        if ($this->authCacheFile && file_exists($this->authCacheFile)) {
            $contents = file_get_contents($this->authCacheFile);
            $tokenInfo = json_decode($contents, true) ?: [];
            $this->setExpireByTokenInfo((array)$tokenInfo);
        }

        // Если срок действия токена не установлен или истек, то делаем запрос на авторизацию
        if (!$this->expire || $this->isExpired()) {
            $response = $this->post(self::AUTH_URL, [
                Constants::AUTH_KEY_TYPE      => Constants::AUTH_PARAM_CREDENTIAL,
                Constants::AUTH_KEY_CLIENT_ID => $this->account,
                Constants::AUTH_KEY_SECRET    => $this->secure,
            ]);

            if ($response->isOk()) {
                $tokenInfo = $this->decodeBody($response->getBody());
                if ($this->authCacheFile) {
                    // Кэшируем данные авторизации в файл
                    $contents = file_put_contents($this->authCacheFile, $response->getBody());
                    if ($contents === false) {
                        $error = error_get_last();
                        throw new AuthCacheFileException($error['message']);
                    } elseif ($contents === 0) {
                        throw new AuthCacheFileException('file_put_contents: number of bytes written to the file = 0');
                    }
                }
            }
        }

        if (empty($tokenInfo)) {
            throw new AuthException(Constants::AUTH_FAIL);
        }

        $this->token = $tokenInfo['access_token'] ?? '';
        $this->setExpireByTokenInfo((array)$tokenInfo);
        return true;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->expire < time();
    }

    /**
     * @return int
     */
    public function getExpire(): int
    {
        return $this->expire;
    }

    /**
     * @param int $timestamp
     */
    public function setExpire(int $timestamp): void
    {
        $this->expire = $timestamp;
    }

    /**
     * @param array $tokenInfo
     */
    private function setExpireByTokenInfo(array $tokenInfo): void
    {
        $this->expire = time() + ($tokenInfo['expires_in'] ?? 0) - 10;
    }

    /**
     * @param string $url
     * @param array $params
     * @return ApiResponse
     * @throws RequestException
     */
    public function post(string $url, array $params = []): ApiResponse
    {
        return $this->request('POST', $url, $params);
    }

    /**
     * @param string $url
     * @return ApiResponse
     * @throws RequestException
     */
    public function get(string $url): ApiResponse
    {
        return $this->request('GET', $url);
    }

    /**
     * @param string $url
     * @return ApiResponse
     * @throws RequestException
     */
    public function delete(string $url): ApiResponse
    {
        return $this->request('DELETE', $url);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $params
     * @return ApiResponse
     * @throws RequestException
     */
    protected function request(string $method, string $url, array $params = []): ApiResponse
    {
        $uri = new Uri(($this->test ? Constants::API_URL_TEST : Constants::API_URL) . $url);
        try {
            $headers = [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
            ];
            // Если авторизация
            if ($url === self::AUTH_URL) {
                $headers['Content-Type'] = 'application/x-www-form-urlencoded';
                $body = http_build_query($params);
            } else {
                $this->authorize();
                $body = (string)json_encode($params);
            }

            if ($this->token) {
                $headers['Authorization'] = 'Bearer ' . $this->token;
            }

            $request = new Request($method, $uri, $headers, $body);
            if ($this->logger) {
                $this->logger->debug('Request: {method} {uri} {headers} {body}', [
                    'method'  => $request->getMethod(),
                    'uri'     => $request->getUri()->getPath(),
                    'headers' => json_encode($request->getHeaders(), JSON_UNESCAPED_UNICODE),
                    'body'    => $request->getBody()
                ]);
            }
            $response = $this->client->sendRequest($request);
            return new ApiResponse($response, $this->logger);
        } catch (ClientExceptionInterface $e) {
            // Если запрос с токеном из кэша падает с ошибкой авторизации
            if ($this->authCacheFile && $e->getCode() === 401) {
                // Удаляем файл кэша, чтобы получить новый токен
                unlink($this->authCacheFile);
                // Повторяем запрос
                return $this->request($method, $url, $params);
            }

            if ($this->logger) {
                $this->logger->debug('CDEK API responded with an HTTP error code {error_code}', [
                    'exception'  => $e,
                    'error_code' => $e->getCode(),
                ]);
            }

            throw new RequestException($e->getMessage(), (int)$e->getCode());
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->debug('CDEK API responded with an HTTP error code {error_code}', [
                    'exception'  => $e,
                    'error_code' => $e->getCode(),
                ]);
            }

            throw new RequestException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Преобразовываем json в массив
     * @param string $body
     * @return array
     */
    private function decodeBody(string $body): array
    {
        $decodedBody = json_decode($body, true);
        return is_array($decodedBody) ? $decodedBody : [];
    }
}
