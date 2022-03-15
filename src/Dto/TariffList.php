<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class TariffList
 * @package CdekSDK2\Dto
 */
class TariffList
{
    /**
     * Список тарифов
     * @Type("array<CdekSDK2\Dto\Tariff>")
     * @var Tariff[]
     */
    public $items = [];
}
