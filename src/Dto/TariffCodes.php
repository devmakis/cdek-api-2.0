<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class TariffCodes
 * @package CdekSDK2\Dto
 */
class TariffCodes
{
    /**
     * Список тарифов
     * @Type("array<CdekSDK2\Dto\TariffCode>")
     * @var TariffCode[]
     */
    public $tariff_codes;
}
