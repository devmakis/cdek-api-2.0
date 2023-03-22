<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

class WebHookList implements IList
{
    /**
     * Список ПВЗ
     * @Type("array<CdekSDK2\Dto\WebHookDto>")
     * @var WebHookDto[]
     */
    public $items = [];
}
