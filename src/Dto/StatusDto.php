<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

class StatusDto
{
    /**
     * Код статуса
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Название статуса
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * Дата и время установки статуса
     * @Type("string")
     * @var string
     */
    public $date_time;
}
