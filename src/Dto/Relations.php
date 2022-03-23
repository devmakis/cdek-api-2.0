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
     * Идентификатор сущности, связанной с заказом
     * @Type("string")
     * @var string
     */
    public $uuid;

    /**
     * Ссылка на скачивание печатной формы в статусе "Сформирован",
     * только для type = waybill, barcode
     * @Type("string")
     * @var string
     */
    public $url;

    /**
     * Номер заказа СДЭК
     * Может возвращаться для return_order, direct_order, reverse_order
     * @Type("string")
     * @var string
     */
    public $cdek_number;

    /**
     * Дата доставки, согласованная с получателем
     * Только для типа delivery
     * @Type("string")
     * @var string
     */
    public $date;

    /**
     * Время начала ожидания курьера (согласованное с получателем)
     * Только для типа delivery
     * @Type("string")
     * @var string
     */
    public $time_from;

    /**
     * Время окончания ожидания курьера (согласованное с получателем)
     * Только для типа delivery
     * @Type("string")
     * @var string
     */
    public $time_to;

    /**
     * @return bool
     */
    public function isReturnOrder(): bool
    {
        return $this->type === Constants::RELATION_RETURN_ORDER;
    }

    /**
     * @return bool
     */
    public function isDirectOrder(): bool
    {
        return $this->type === Constants::RELATION_DIRECT_ORDER;
    }

    /**
     * @return bool
     */
    public function isWaybill(): bool
    {
        return $this->type === Constants::RELATION_WAYBILL;
    }

    /**
     * @return bool
     */
    public function isBarcode(): bool
    {
        return $this->type === Constants::RELATION_BARCODE;
    }

    /**
     * @return bool
     */
    public function isReverseOrder(): bool
    {
        return $this->type === Constants::RELATION_REVERSE_ORDER;
    }

    /**
     * @return bool
     */
    public function isDelivery(): bool
    {
        return $this->type === Constants::RELATION_DELIVERY;
    }
}
