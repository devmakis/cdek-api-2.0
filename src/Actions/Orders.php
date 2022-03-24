<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\OrderParams;

/**
 * Class Orders
 * @package CdekSDK2\Actions
 */
class Orders extends ActionsWithDelete
{
    /**
     * URL для запросов к API
     * @var string
     */
    public const URL = '/orders';

    /**
     * Создание заказа
     * @param OrderParams $order
     * @return ApiResponse
     * @throws \CdekSDK2\Exceptions\RequestException
     */
    public function create(OrderParams $order): ApiResponse
    {
        $params = $this->serializer->toArray($order);
        return $this->post($params);
    }

    /**
     * Получить данные по номеру заказа в ИС СДЕК
     * @param string $cdekNumber
     * @return ApiResponse
     * @throws RequestException
     */
    public function getByCdekNumber(string $cdekNumber): ApiResponse
    {
        $query = $cdekNumber ? http_build_query([
            'cdek_number' => $cdekNumber
        ]) : '';
        return $this->http_client->get(static::URL . ($query ? "?$query" : ''));
    }

    /**
     * Получить данные по номеру заказа в ИС Клиента
     * @param string $imNumber
     * @return ApiResponse
     * @throws RequestException
     */
    public function getByImNumber(string $imNumber): ApiResponse
    {
        $query = $imNumber ? http_build_query([
            'im_number' => $imNumber
        ]) : '';
        return $this->http_client->get(static::URL . ($query ? "?$query" : ''));
    }
}
