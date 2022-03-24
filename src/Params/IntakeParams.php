<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\Types\Base;
use CdekSDK2\Types\Contact;
use CdekSDK2\Types\Location;
use CdekSDK2\Types\Status;

/**
 * Class Intake
 * @package CdekSDK2\BaseTypes
 */
class IntakeParams extends Base
{
    /**
     * Номер заказа СДЭК
     * @Type("int")
     * @var int
     */
    public $cdek_number;

    /**
     * Идентификатор заказа
     * @Type("string")
     * @var string
     */
    public $order_uuid;

    /**
     * Дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD)
     * @Type("string")
     * @var string
     */
    public $intake_date;

    /**
     * Время начала ожидания курьера (время в формате ISO 8601: hh:mm)
     * @Type("string")
     * @var string
     */
    public $intake_time_from;

    /**
     * Время окончания ожидания курьера (время в формате ISO 8601: hh:mm)
     * @Type("string")
     * @var string
     */
    public $intake_time_to;

    /**
     * Время начала обеда, должно входить в диапазон [intake_time_to;intake_time_to]
     * @Type("string")
     * @var string
     */
    public $lunch_time_from;

    /**
     * Время окончания обеда, должно входить в диапазон [intake_time_to;intake_time_to]
     * @Type("string")
     * @var string
     */
    public $lunch_time_to;

    /**
     * Описание груза
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * Общий вес (в граммах)
     * @Type("int")
     * @var int
     */
    public $weight;

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
     * Комментарий к заявке для курьера
     * @Type("string")
     * @var string
     */
    public $comment;

    /**
     * Отправитель
     * @Type("CdekSDK2\Types\Contact")
     * @var Contact
     */
    public $sender;

    /**
     * Адрес отправителя (забора)
     * @Type("CdekSDK2\Types\Location")
     * @var Location
     */
    public $from_location;

    /**
     * Необходим прозвон отправителя
     * @Type("bool")
     * @var bool
     */
    public $need_call = false;

    /**
     * Intake constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'intake_date'      => 'required|date:Y-m-d',
            'intake_time_from' => 'required|date:H:i',
            'intake_time_to'   => 'required|date:H:i',
            'weight'           => 'numeric',
            'sender'           => [
                '',
                function ($value) {
                    return $value instanceof Contact && $value->validate();
                }
            ],
            'from_location'    => [
                'required_with:cdek_number',
                function ($value) {
                    return $value instanceof Location && $value->validate();
                }
            ],
            'length'           => 'numeric',
            'width'            => 'numeric',
            'height'           => 'numeric',
        ];
    }
}
