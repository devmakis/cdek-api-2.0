<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class TariffParams
 * @package CdekSDK2\BaseTypes
 * @method static $this create(array $data = [])
 */
class TariffParams extends Base
{
    /**
     * Дата и время планируемой передачи заказа (по умолчанию - текущая)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $date;

    /**
     * Тип заказа:
     * 1 - "интернет-магазин"
     * 2 - "доставка"
     * По умолчанию - 1
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $type;

    /**
     * Валюта, в которой необходимо произвести расчет
     * По умолчанию - валюта договора
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $currency;

    /**
     * Код тарифа
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Язык вывода информации о тарифах
     * Возможные значения: rus, eng, zho
     * По умолчанию - rus
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $lang;

    /**
     * Адрес отправления
     * @Type("CdekSDK2\BaseTypes\Location")
     * @var Location
     */
    public $from_location;

    /**
     * Адрес получения
     * @Type("CdekSDK2\BaseTypes\Location")
     * @var Location
     */
    public $to_location;

    /**
     * Список информации по местам (упаковкам)
     * @Type("array<CdekSDK2\BaseTypes\Package>")
     * @var Package[]
     */
    public $packages;

    /**
     * Дополнительные услуги
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\BaseTypes\Service>")
     * @var Service[]
     */
    public $services;

    /**
     * TariffParams constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'type'          => 'integer',
            'currency'      => 'integer',
            'tariff_code'   => 'integer',
            'lang'          => 'alpha:3',
            'from_location' => [
                'required',
                function ($value) {
                    if ($value instanceof Location) {
                        return $value->validate();
                    }
                    return false;
                }
            ],
            'to_location'   => [
                'required',
                function ($value) {
                    if ($value instanceof Location) {
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
            'services'      => [
                'array',
                function ($value) {
                    if (!is_array($value)) {
                        return false;
                    }
                    $check = false;
                    foreach ($value as $item) {
                        if ($item instanceof Service) {
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
