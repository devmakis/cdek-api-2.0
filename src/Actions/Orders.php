<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

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
    public function add(OrderParams $order): ApiResponse
    {
        $params = $this->serializer->toArray($order);
        return $this->post($params);
    }
}
