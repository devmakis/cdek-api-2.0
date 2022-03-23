<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class Package
 * @package CdekSDK2\BaseTypes
 */
class Package extends Base
{
    /**
     * Уникальный номер упаковки в ИС СДЭК
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $package_id;

    /**
     * Номер упаковки (можно использовать порядковый номер упаковки заказа или номер заказа),
     * уникален в пределах заказа.
     * @Type("string")
     * @var string
     */
    public $number;

    /**
     * Общий вес (в граммах)
     * @Type("int")
     * @var int
     */
    public $weight;

    /**
     * Объемный вес (в граммах)
     * @SkipWhenEmpty
     * @Type("int")
     * @var int
     */
    public $weight_volume;

    /**
     * Расчетный вес (в граммах)
     * @SkipWhenEmpty
     * @Type("int")
     * @var int
     */
    public $weight_calc;

    /**
     * Габариты упаковки. Длина (в сантиметрах)
     * @Type("int")
     * @var int
     */
    public $length;

    /**
     * Габариты упаковки. Ширина (в сантиметрах)
     * @Type("int")
     * @var int
     */
    public $width;

    /**
     * Габариты упаковки. Высота (в сантиметрах)
     * @Type("int")
     * @var int
     */
    public $height;

    /**
     * Комментарий к упаковке
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $comment;

    /**
     * Позиции товаров в упаковке
     * @SkipWhenEmpty
     * @Type("array<CdekSDK2\Types\Item>")
     * @var Item[]
     */
    public $items;

    /**
     * Package constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'package_id'    => '',
            'number'        => '',
            'weight'        => 'numeric',
            'weight_volume' => 'numeric',
            'weight_calc'   => 'numeric',
            'length'        => 'numeric',
            'width'         => 'numeric',
            'height'        => 'numeric',
            'comment'       => '',
            'items'         => [
                'array',
                function ($value) {
                    if (!is_array($value) || empty($value)) {
                        return false;
                    }
                    $check = false;
                    foreach ($value as $item) {
                        if ($item instanceof Phone) {
                            $check = $item->validate();
                            if (!$check) {
                                return false;
                            }
                        }
                    }
                    return $check;
                }
            ],
        ];
    }
}
