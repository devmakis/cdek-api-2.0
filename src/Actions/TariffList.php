<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\TariffParams;

/**
 * Class TariffList
 * @package CdekSDK2\Actions
 * @link https://api-docs.cdek.ru/63345519.html
 */
class TariffList extends Action
{
    /**
     * URL для запросов к API
     * @var string
     */
    public const URL = '/calculator/tarifflist';

    /**
     * @param \CdekSDK2\Params\TariffParams $tariffParams
     * @return ApiResponse
     * @throws RequestException
     */
    public function getByParams(TariffParams $tariffParams): ApiResponse
    {
        $params = $this->serializer->toArray($tariffParams);
        return $this->post($params);
    }
}
