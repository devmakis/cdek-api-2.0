<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Item extends BaseValidation
{
    /**
     * Наименование товара (может также содержать описание товара: размер, цвет)
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * Идентификатор/артикул товара
     * @Type("string")
     * @var string
     */
    public $ware_key;

    /**
     * Оплата за товар при получении
     * @Type("CdekSDK2\Types\Money")
     * @var Money
     */
    public $payment;

    /**
     * Объявленная стоимость товара (за единицу товара в указанной валюте, значение >=0).
     * С данного значения рассчитывается страховка
     * @Type("float")
     * @var float
     */
    public $cost;

    /**
     * Вес (за единицу товара, в граммах)
     * @Type("int")
     * @var int
     */
    public $weight;

    /**
     * Вес брутто (только для международных заказов)
     * @Type("int")
     * @var int
     */
    public $weight_gross;

    /**
     * Количество единиц товара
     * @Type("int")
     * @var int
     */
    public $amount;

    /**
     * Количество врученных единиц товара (в штуках)
     * @Type("int")
     * @var int
     */
    public $delivery_amount;

    /**
     * Наименование на иностранном языке
     * @Type("string")
     * @var string
     */
    public $name_i18n;

    /**
     * Бренд на иностранном языке
     * @Type("string")
     * @var string
     */
    public $brand;

    /**
     * Код страны в формате ISO_3166-1_alpha-2
     * @Type("string")
     * @var string
     */
    public $country_code;

    /**
     * Код материала
     * @Type("int")
     * @var int
     */
    public $material;

    /**
     * Содержит ли радиочастотные модули (wifi/gsm)
     * @Type("bool")
     * @var bool
     */
    public $wifi_gsm;

    /**
     * Ссылка на сайт интернет-магазина с описанием товара
     * @Type("string")
     * @var string
     */
    public $url;

    /**
     * Item constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'name'         => 'required',
            'ware_key'     => 'required',
            'payment'      => [
                'required',
                function ($value) {
                    return $value instanceof Money && $value->validate();
                }
            ],
            'cost'         => 'required|numeric',
            'weight'       => 'required|numeric',
            'amount'       => 'required|integer',
            'weight_gross' => 'numeric',
            'country_code' => 'alpha:2',
            'url'          => 'url',
        ];
    }
}
