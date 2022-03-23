<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\Types\PrintOrder;
use JMS\Serializer\Annotation\Type;

class InvoiceDto extends EntityDto
{
    /**
     * Список заказов
     * @Type("array<CdekSDK2\Types\PrintOrder>")
     * @var PrintOrder[]
     */
    public $orders;

    /**
     * Число копий одной квитанции на листе
     * @Type("int")
     * @var int
     */
    public $copy_count;

    /**
     * Шаблон для квитанции
     * @Type("string")
     * @var string
     */
    public $type;

    /**
     * Ссылка на скачивание файла
     * @Type("string")
     * @var string
     */
    public $url;

    /**
     * Список статусов квитанции
     * @Type("array<CdekSDK2\Dto\StatusDto>")
     * @var StatusDto[]
     */
    public $statuses;
}
