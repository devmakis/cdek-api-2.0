<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use DateTime;

/**
 * Class Package
 * @package CdekSDK2\BaseTypes
 */
class TariffParams extends Base
{
    /**
     * Дата и время планируемой передачи заказа (по умолчанию - текущая)
     * @Type("DateTime")
     * @var DateTime
     */
    public $date;

    /**
     * Тип заказа:
     * 1 - "интернет-магазин"
     * 2 - "доставка"
     * По умолчанию - 1
     * @Type("int")
     * @var int
     */
    public $type;

    /**
     * Валюта, в которой необходимо произвести расчет
     * По умолчанию - валюта договора
     * @Type("int")
     * @var int
     */
    public $currency;

    /**
     * Язык вывода информации о тарифах
     * Возможные значения: rus, eng, zho
     * По умолчанию - rus
     * @Type("string")
     * @var string
     */
    public $lang;

    /**
     * Адрес отправления
     * @Type("CdekSDK2\BaseTypes\TariffLocation")
     * @var TariffLocation
     */
    public $from_location;

    /**
     * Адрес получения
     * @Type("CdekSDK2\BaseTypes\TariffLocation")
     * @var TariffLocation
     */
    public $to_location;

    /**
     * Список информации по местам (упаковкам)
     * @Type("array<CdekSDK2\BaseTypes\TariffPackage>")
     * @var TariffPackage[]
     */
    public $packages;

    /**
     * Package constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'from_location' => [
                'required',
                function ($value) {
                    if ($value instanceof TariffLocation) {
                        return $value->validate();
                    }
                    return false;
                }
            ],
            'to_location'   => [
                'required',
                function ($value) {
                    if ($value instanceof TariffLocation) {
                        return $value->validate();
                    }
                    return false;
                }
            ],
            'packages'      => [
                'required',
                'array',
                function ($value) {
                    if (!is_array($value)) {
                        return false;
                    }

                    $check = false;
                    foreach ($value as $item) {
                        if ($item instanceof TariffPackage) {
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
