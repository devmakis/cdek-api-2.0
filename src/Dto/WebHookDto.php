<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class WebHookDto
 * @package CdekSDK2\Params
 */
class WebHookDto extends EntityDto
{
    /**
     * Тип события
     * @Type("string")
     * @var string
     */
    public $type;

    /**
     * URL, на который клиент хочет получать вебхуки
     * @Type("string")
     * @var string
     */
    public $url;
}
