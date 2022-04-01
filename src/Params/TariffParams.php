<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\BaseValidation;
use CdekSDK2\Types\Location;
use CdekSDK2\Types\Package;
use CdekSDK2\Types\Service;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class TariffParams extends BaseValidation
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
     * @Type("CdekSDK2\Types\Location")
     * @var Location
     */
    public $from_location;

    /**
     * Адрес получения
     * @Type("CdekSDK2\Types\Location")
     * @var Location
     */
    public $to_location;

    /**
     * Список информации по местам (упаковкам)
     * @Type("array<CdekSDK2\Types\Package>")
     * @var Package[]
     */
    public $packages;

    /**
     * Дополнительные услуги
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\Types\Service>")
     * @var \CdekSDK2\Types\Service[]
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
                    return $value instanceof Location && $value->validate();
                }
            ],
            'to_location'   => [
                'required',
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
            'services'      => [
                'array',
                function ($value) {
                    if (!is_array($value) || empty($value)) {
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
