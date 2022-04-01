<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\BaseValidation;
use CdekSDK2\Types\Contact;
use CdekSDK2\Types\Location;
use CdekSDK2\Types\Money;
use CdekSDK2\Types\Package;
use CdekSDK2\Types\Threshold;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class OrderParams extends BaseValidation
{
    /**
     * Тип заказа
     * @Type("int")
     * @var int
     */
    public $type = 1;

    /**
     * Номер заказа в ИС Клиента
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $number;

    /**
     * Код тарифа
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Комментарий к заказу
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $comment;

    /**
     * Ключ разработчика
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $developer_key;

    /**
     * Код ПВЗ для забора
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $shipment_point;

    /**
     * Код ПВЗ СДЭК для доставки
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $delivery_point;

    /**
     * Дата инвойса
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $date_invoice;

    /**
     * Грузоотправитель
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $shipper_name;

    /**
     * Адрес грузоотправителя
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $shipper_address;

    /**
     * Стоимость доставки, которую ИМ берет с получателя
     * @SkipWhenEmpty()
     * @Type("CdekSDK2\Types\Money")
     * @var Money
     */
    public $delivery_recipient_cost;

    /**
     * Доп. сбор за доставку (которую ИМ берет с получателя) в зависимости от суммы заказа
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\Types\Threshold>")
     * @var Threshold[]
     */
    public $delivery_recipient_cost_adv;

    /**
     * Отправитель
     * @SkipWhenEmpty()
     * @Type("CdekSDK2\Types\Contact")
     * @var Contact
     */
    public $sender;

    /**
     * Реквизиты реального продавца
     * @SkipWhenEmpty()
     * @Type("CdekSDK2\Types\Seller")
     * @var \CdekSDK2\Types\Seller
     */
    public $seller;

    /**
     * Получатель
     * @Type("CdekSDK2\Types\Contact")
     * @var Contact
     */
    public $recipient;

    /**
     * Адрес отправления
     * @Type("CdekSDK2\Types\Location")
     * @var Location
     */
    public $from_location;

    /**
     * Адрес получения
     * @SkipWhenEmpty()
     * @Type("CdekSDK2\Types\Location")
     * @var Location
     */
    public $to_location;

    /**
     * Дополнительные услуги
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\Types\Service>")
     * @var \CdekSDK2\Types\Service[]
     */
    public $services;

    /**
     * Список информации по местам
     * @Type("array<CdekSDK2\Types\Package>")
     * @var Package[]
     */
    public $packages;

    /**
     * Необходимость сформировать печатную форму по заказу
     * может принимать значения:
     * barcode - ШК мест (число копий - 1)
     * waybill - квитанция (число копий - 2)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $print;

    /**
     * Order constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'tariff_code'   => 'required|numeric',
            'services'      => 'array',
            'sender'        => [
                function ($value) {
                    return $value instanceof Contact && $value->validate();
                }
            ],
            'recipient'     => [
                'required',
                function ($value) {
                    return $value instanceof Contact && $value->validate();
                }
            ],
            'from_location' => [
                'required',
                function ($value) {
                    return $value instanceof Location && $value->validate();
                }
            ],
            'to_location'   => [
                function ($value) {
                    return $value instanceof Location && $value->validate();
                }
            ],
            'packages'      => [
                'required',
                'array',
                function ($value) {
                    if (!is_array($value) || empty($value)) {
                        return false;
                    }
                    $check = false;
                    foreach ($value as $item) {
                        if ($item instanceof Package) {
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
