<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\IntakeParams;

/**
 * Class Intakes
 * @package CdekSDK2\Actions
 */
class Intakes extends ActionsWithDelete
{
    /**
     * URL для запросов к API
     * @var string
     */
    public const URL = '/intakes';

    /**
     * Создание вызова курьера
     * @param IntakeParams $intake
     * @return ApiResponse
     * @throws \CdekSDK2\Exceptions\RequestException
     */
    public function add(IntakeParams $intake): ApiResponse
    {
        $params = $this->serializer->toArray($intake);
        return $this->post($params);
    }
}
