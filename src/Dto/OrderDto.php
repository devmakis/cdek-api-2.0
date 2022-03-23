<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\Types\Money;
use CdekSDK2\Types\Package;
use CdekSDK2\Types\Seller;
use CdekSDK2\Types\Service;
use CdekSDK2\Types\Status;
use CdekSDK2\Types\Threshold;
use JMS\Serializer\Annotation\Type;

/**
 * Class OrderDto
 * @package CdekSDK2\Dto
 */
class OrderDto extends EntityDto
{
    /**
     * Признак возвратного заказа
     * @Type("bool")
     * @var bool
     */
    public $is_return;

    /**
     * Признак реверсного заказа
     * @Type("bool")
     * @var bool
     */
    public $is_reverse;

    /**
     * Тип заказа
     * @Type("int")
     * @var int
     */
    public $type;

    /**
     * Номер заказа в системе СДЭК
     * @Type("string")
     * @var string
     */
    public $cdek_number;

    /**
     * Номер заказа в ИС Клиента
     * @Type("string")
     * @var string
     */
    public $number;

    /**
     * Истинный режим заказа
     * @Type("string")
     * @var string
     */
    public $delivery_mode;

    /**
     * Код тарифа
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Комментарий к заказу
     * @Type("string")
     * @var string
     */
    public $comment;

    /**
     * Ключ разработчика
     * @Type("string")
     * @var string
     */
    public $developer_key;

    /**
     * Код ПВЗ для забора
     * @Type("string")
     * @var string
     */
    public $shipment_point;

    /**
     * Код ПВЗ СДЭК для доставки
     * @Type("string")
     * @var string
     */
    public $delivery_point;

    /**
     * Код валюты объявленной стоимости заказа
     * @Type("string")
     * @var string
     */
    public $items_cost_currency;

    /**
     * Код валюты наложенного платежа
     * @Type("string")
     * @var string
     */
    public $recipient_currency;

    /**
     * Дата инвойса
     * @Type("string")
     * @var string
     */
    public $date_invoice;

    /**
     * Грузоотправитель
     * @Type("string")
     * @var string
     */
    public $shipper_name;

    /**
     * Адрес грузоотправителя
     * @Type("string")
     * @var string
     */
    public $shipper_address;

    /**
     * Стоимость доставки, которую ИМ берет с получателя
     * @Type("CdekSDK2\Types\Money")
     * @var Money
     */
    public $delivery_recipient_cost;

    /**
     * Доп. сбор за доставку (которую ИМ берет с получателя) в зависимости от суммы заказа
     * @Type("array<CdekSDK2\Types\Threshold>")
     * @var Threshold[]
     */
    public $delivery_recipient_cost_adv;

    /**
     * Отправитель
     * @Type("CdekSDK2\Types\Contact")
     * @var \CdekSDK2\Types\Contact
     */
    public $sender;

    /**
     * Реквизиты реального продавца
     * @Type("CdekSDK2\Types\Seller")
     * @var Seller
     */
    public $seller;

    /**
     * Получатель
     * @Type("CdekSDK2\Types\Contact")
     * @var \CdekSDK2\Types\Contact
     */
    public $recipient;

    /**
     * Адрес отправления
     * @Type("CdekSDK2\Types\Location")
     * @var \CdekSDK2\Types\Location
     */
    public $from_location;

    /**
     * Адрес получения
     * @Type("CdekSDK2\Types\Location")
     * @var \CdekSDK2\Types\Location
     */
    public $to_location;

    /**
     * Дополнительные услуги
     * @Type("array<CdekSDK2\Types\Service>")
     * @var Service[]
     */
    public $services;

    /**
     * Список информации по местам
     * @Type("array<CdekSDK2\Types\Package>")
     * @var Package[]
     */
    public $packages;

    /**
     * Список статусов по заказу, отсортированных по дате и времени
     * @Type("array<CdekSDK2\Types\Statuses>")
     * @var Status[]
     */
    public $statuses;

    /**
     * Информация о вручении
     * @Type("CdekSDK2\Dto\DeliveryDetail")
     * @var DeliveryDetail
     */
    public $delivery_detail;
}
