<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class TariffCode
 * @package CdekSDK2\Dto
 */
class TariffCode
{
    /**
     * Код тарифа (подробнее @see https://api-docs.cdek.ru/63345519.html)
     * @SkipWhenEmpty
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Код населенного пункта (справочник СДЭК)
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $tariff_name;

    /**
     * Описание тарифа на языке вывода
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $tariff_description;

    /**
     * Режим тарифа
     * @SkipWhenEmpty
     * @Type("int")
     * @var int
     */
    public $delivery_mode;

    /**
     * Стоимость доставки
     * @Type("float")
     * @var float
     */
    public $delivery_sum;

    /**
     * Минимальное время доставки (в рабочих днях)
     * @Type("int")
     * @var int
     */
    public $period_min;

    /**
     * Максимальное время доставки (в рабочих днях)
     * @Type("int")
     * @var int
     */
    public $period_max;

    /**
     * Расчетный вес (в граммах)
     * @SkipWhenEmpty
     * @Type("int")
     * @var int
     */
    public $weight_calc;

    /**
     * Дополнительные услуги
     * @SkipWhenEmpty()
     * @Type("array<CdekSDK2\Types\Service>")
     * @var \CdekSDK2\Types\Service[]
     */
    public $services;
}
