<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\Constants;
use JMS\Serializer\Annotation\Type;

class Relations
{
    /**
     * Тип сущности, связанной с заказом
     * @Type("string")
     * @var string
     */
    public $type;

    /**
     * @Type("string")
     * @var string
     */
    public $uuid;

    /**
     * @return bool
     */
    public function isWaybill(): bool
    {
        return $this->type === Constants::PRINT_TYPE_WAYBILL;
    }

    /**
     * @return bool
     */
    public function isBarcode(): bool
    {
        return $this->type === Constants::PRINT_TYPE_BARCODE;
    }
}
