<?php
/**
 * Created by PhpStorm.
 * User: MAKis
 * Date: 22.03.2022
 * Time: 23:06
 */

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class Entity
 * @package CdekSDK2\Dto
 */
class Entity
{
    /**
     * Уникальный идентификатор
     * @Type("string")
     * @var string
     */
    public $uuid;
}
