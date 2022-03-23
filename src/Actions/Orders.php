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
        return $this->http_client->get(static::URL, [
            'cdek_number' => $cdekNumber
        ]);
    }
}
