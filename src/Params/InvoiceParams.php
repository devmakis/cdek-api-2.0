<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\Types\PrintOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

class InvoiceParams extends BaseParams
{
    /**
     * Список заказов
     * @Type("array<CdekSDK2\Types\PrintOrder>")
     * @var PrintOrder[]
     */
    public $orders;

    /**
     * Число копий одной квитанции на листе.
     * Рекомендовано указывать не менее 2, одна приклеивается на груз, вторая остается у отправителя
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $copy_count = 2;

    /**
     * Форма квитанции. Может принимать значения:
     * tpl_china - квитанция на китайском
     * tpl_armenia - квитанция на армянском
     * По умолчанию будет выбрана форма в зависимости от типа заказа
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $type;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'orders'     => [
                'required',
                'array',
                function ($value) {
                    return $value instanceof PrintOrder && $value->validate();
                }
            ],
            'copy_count' => 'integer',
            'type'       => 'alpha_dash'
        ];
    }
}
