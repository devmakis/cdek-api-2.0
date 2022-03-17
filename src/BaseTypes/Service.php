<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class Service
 * @package CdekSDK2\BaseTypes
 */
class Service extends Base
{
    /** @var string Страхование */
    public const INSURANCE = 'INSURANCE';
    /** @var string Забор в городе отправителе */
    public const TAKE_SENDER = 'TAKE_SENDER';
    /** @var string Доставка в городе получателе */
    public const DELIV_RECEIVER = 'DELIV_RECEIVER';
    /** @var string Примерка на дому */
    public const TRYING_ON = 'TRYING_ON';
    /** @var string Частичная доставка */
    public const PART_DELIV = 'PART_DELIV';
    /** @var string Осмотр вложения */
    public const INSPECTION_CARGO = 'INSPECTION_CARGO';
    /** @var string Реверс */
    public const REVERSE = 'REVERSE';
    /** @var string Опасный груз */
    public const DANGER_CARGO = 'DANGER_CARGO';
    /** @var string Ожидание более 15 мин. у получателя */
    public const WAIT_FOR_RECEIVER = 'WAIT_FOR_RECEIVER';
    /** @var string Ожидание более 15 мин. у отправителя */
    public const WAIT_FOR_SENDER = 'WAIT_FOR_SENDER';
    /** @var string Повторная поездка */
    public const REPEATED_DELIVERY = 'REPEATED_DELIVERY';
    /** @var string Смс уведомление */
    public const SMS = 'SMS';
    /** @var string Подъем на этаж ручной */
    public const GET_UP_FLOOR_BY_HAND = 'GET_UP_FLOOR_BY_HAND';
    /** @var string Подъем на этаж лифтом */
    public const GET_UP_FLOOR_BY_ELEVATOR = 'GET_UP_FLOOR_BY_ELEVATOR';
    /** @var string Прозвон */
    public const CALL = 'CALL';
    /** @var string Тепловой режим */
    public const THERMAL_MODE = 'THERMAL_MODE';
    /** @var string Пакет курьерский А2 */
    public const COURIER_PACKAGE_A2 = 'COURIER_PACKAGE_A2';
    /** @var string Сейф пакет А2 */
    public const SECURE_PACKAGE_A2 = 'SECURE_PACKAGE_A2';
    /** @var string Сейф пакет А3 */
    public const SECURE_PACKAGE_A3 = 'SECURE_PACKAGE_A3';
    /** @var string Сейф пакет А4 */
    public const SECURE_PACKAGE_A4 = 'SECURE_PACKAGE_A4';
    /** @var string Сейф пакет А5 */
    public const SECURE_PACKAGE_A5 = 'SECURE_PACKAGE_A5';
    /** @var string Уведомление о создании заказа в СДЭК */
    public const NOTIFY_ORDER_CREATED = 'NOTIFY_ORDER_CREATED';
    /** @var string Уведомление о приеме заказа на доставку */
    public const NOTIFY_ORDER_DELIVERY = 'NOTIFY_ORDER_DELIVERY';
    /** @var string Коробка XS (0,5 кг 17х12х9 см) */
    public const CARTON_BOX_XS = 'CARTON_BOX_XS';
    /** @var string Коробка S (2 кг 21х20х11 см) */
    public const CARTON_BOX_S = 'CARTON_BOX_S';
    /** @var string Коробка M (5 кг 33х25х15 см) */
    public const CARTON_BOX_M = 'CARTON_BOX_M';
    /** @var string Коробка L (12 кг 34х33х26 см) */
    public const CARTON_BOX_L = 'CARTON_BOX_L';
    /** @var string Коробка (0,5 кг 17х12х10 см) */
    public const CARTON_BOX_500GR = 'CARTON_BOX_500GR';
    /** @var string Коробка (1 кг 24х17х10 см) */
    public const CARTON_BOX_1KG = 'CARTON_BOX_1KG';
    /** @var string Коробка (2 кг 34х24х10 см) */
    public const CARTON_BOX_2KG = 'CARTON_BOX_2KG';
    /** @var string Коробка (3 кг 24х24х21 см) */
    public const CARTON_BOX_3KG = 'CARTON_BOX_3KG';
    /** @var string Коробка (5 кг 40х24х21 см) */
    public const CARTON_BOX_5KG = 'CARTON_BOX_5KG';
    /** @var string Коробка (10 кг 40х35х28 см) */
    public const CARTON_BOX_10KG = 'CARTON_BOX_10KG';
    /** @var string Коробка (15 кг 60х35х29 см) */
    public const CARTON_BOX_15KG = 'CARTON_BOX_15KG';
    /** @var string Коробка (20 кг 47х40х43 см) */
    public const CARTON_BOX_20KG = 'CARTON_BOX_20KG';
    /** @var string Коробка (30 кг 69х39х42 см) */
    public const CARTON_BOX_30KG = 'CARTON_BOX_30KG';
    /** @var string Воздушно-пузырчатая пленка */
    public const BUBBLE_WRAP = 'BUBBLE_WRAP';
    /** @var string Макулатурная бумага */
    public const WASTE_PAPER = 'WASTE_PAPER';
    /** @var string Прессованный картон "филлер" (55х14х2,3 см) */
    public const CARTON_FILLER = 'CARTON_FILLER';
    /** @var string Запрет осмотра вложения */
    public const BAN_ATTACHMENT_INSPECTION = 'BAN_ATTACHMENT_INSPECTION';

    /**
     * Тип дополнительной услуги, код из справочника доп. услуг
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Параметр дополнительной услуги
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $parameter;

    /**
     * Сумма услуги (в валюте договора)
     * @Type("float")
     * @var float
     */
    public $sum;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'      => 'required|alpha',
            'parameter' => 'alpha',
            'sum'       => 'numeric'
        ];
    }
}
