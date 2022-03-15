<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

/**
 * Class Package
 * @package CdekSDK2\BaseTypes
 */
class OrderPackage extends Package
{
    /**
     * Номер упаковки
     * @Type("string")
     * @var string
     */
    public $number;

    /**
     * Объемный вес (в граммах)
     * @Type("int")
     * @var int
     */
    public $weight_volume;

    /**
     * Расчетный вес (в граммах)
     * @Type("int")
     * @var int
     */
    public $weight_calc;

    /**
     * Комментарий к упаковке
     * @Type("string")
     * @var string
     */
    public $comment;

    /**
     * Позиции товаров в упаковке
     * @Type("array<CdekSDK2\BaseTypes\Item>")
     * @var Item[]
     */
    public $items;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'number' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width'  => 'required',
            'height' => 'required',
            'items'  => [
                'required',
                'array',
                function ($value) {
                    foreach ($value as $item) {
                        if ($item instanceof Item) {
                            $item->validate();
                        }
                    }
                }
            ],
        ];
    }
}
