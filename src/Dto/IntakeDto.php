<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\Types\Contact;
use CdekSDK2\Types\Location;
use CdekSDK2\Types\Status;

/**
 * Class IntakeDto
 * @package CdekSDK2\Dto
 */
class IntakeDto extends EntityDto
{
    /**
     * Дата ожидания курьера (дата в формате ISO 8601: YYYY-MM-DD)
     * @Type("string")
     * @var string
     */
    public $intake_date;

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
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\Types\Status>")
     * @var Status[]
     */
    public $statuses;
}
