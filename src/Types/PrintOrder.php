<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use JMS\Serializer\Annotation\Type;

class PrintOrder extends Base
{
    /**
     * Идентификатор заказа
     * @Type("string")
     * @var string
     */
    public $order_uuid;

    /**
     * Номер заказа СДЭК
     * @Type("int")
     * @var int
     */
    public $cdek_number;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'order_uuid'  => 'required_with:cdek_number|alpha_dash',
            'cdek_number' => 'required_with:order_uuid|integer',
        ];
    }
}
