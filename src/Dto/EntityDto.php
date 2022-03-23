<?php
/**
 * Created by PhpStorm.
 * User: MAKis
 * Date: 22.03.2022
 * Time: 23:06
 */

namespace CdekSDK2\Dto;

use CdekSDK2\Types\Base;
use JMS\Serializer\Annotation\Type;

/**
 * Class Entity
 * @package CdekSDK2\Dto
 */
class EntityDto extends Base
{
    /**
     * Уникальный идентификатор
     * @Type("string")
     * @var string
     */
    public $uuid;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'uuid' => 'required|alpha_dash:36',
        ];
    }
}
