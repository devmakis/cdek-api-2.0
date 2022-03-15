<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

class Tariff
{
    /**
     * Код тарифа (подробнее @see https://api-docs.cdek.ru/63345519.html)
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Код населенного пункта (справочник СДЭК)
     * @Type("string")
     * @var string
     */
    public $tariff_name;

    /**
     * Описание тарифа на языке вывода
     * @Type("string")
     * @var string
     */
    public $tariff_description;

    /**
     * Режим тарифа
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
}
