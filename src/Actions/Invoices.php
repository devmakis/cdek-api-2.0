<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\InvoiceParams;

/**
 * Class Invoices
 * @package CdekSDK2\Actions
 */
class Invoices extends Action
{
    /**
     * URL для запросов к API на формирование квитанции
     * @var string
     */
    public const URL = '/print/orders';

    /**
     * Запрос на формирование квитанции к заказу
     * @param InvoiceParams $invoice
     * @return ApiResponse
     * @throws RequestException
     */
    public function create(InvoiceParams $invoice): ApiResponse
    {
        $params = $this->serializer->toArray($invoice);
        return $this->post($params);
    }

    /**
     * Запрос на получение данных печатной формы
     * @param string $uuid
     * @return ApiResponse
     * @throws RequestException
     */
    public function download(string $uuid): ApiResponse
    {
        return $this->http_client->get($this->slug($uuid) . '.pdf');
    }
}
