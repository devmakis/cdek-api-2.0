<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\Types\PrintOrder;
use CdekSDK2\Types\Status;
use JMS\Serializer\Annotation\Type;

class BarcodeDto extends EntityDto
{
    /**
     * Список заказов
     * @Type("array<CdekSDK2\Types\PrintOrder>")
     * @var PrintOrder[]
     */
    public $orders;

    /**
     * ЧЧисло копий на листе
     * @Type("int")
     * @var int
     */
    public $copy_count;

    /**
     * Формат печати
     * @Type("string")
     * @var string
     */
    public $format;

    /**
     * Язык печатной формы в кодировке ISO - 639-3
     * @Type("string")
     * @var string
     */
    public $lang;

    /**
     * Ссылка на скачивание файла
     * @Type("string")
     * @var string
     */
    public $url;

    /**
     * Список статусов файла
     * @Type("array<CdekSDK2\Types\Status>")
     * @var Status[]
     */
    public $statuses;
}
