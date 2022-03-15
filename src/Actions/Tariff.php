<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\BaseTypes\TariffParamsByCode;
use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;

/**
 * Class Tariff
 * @package CdekSDK2\Actions
 * @link https://api-docs.cdek.ru/63345430.html
 */
class Tariff extends Action
{
    /**
     * URL для запросов к API
     * @var string
     */
    public const URL = '/calculator/tariff';

    /**
     * @param TariffParamsByCode $tariffParamsByCode
     * @return ApiResponse
     * @throws RequestException
     */
    public function one(TariffParamsByCode $tariffParamsByCode): ApiResponse
    {
        $params = $this->serializer->toArray($tariffParamsByCode);
        return $this->post($params);
    }
}
