<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Location extends BaseValidation
{
    /**
     * Код страны в формате  ISO_3166-1_alpha-2
     * @example RU, DE, TR
     * @Type("string")
     * @var string
     */
    public $country_code;

    /**
     * Код региона (справочник СДЭК)
     * @Type("int")
     * @var int
     */
    public $region_code;

    /**
     * Название региона
     * @Type("string")
     * @var string
     */
    public $region;

    /**
     * Название района региона
     * @Type("string")
     * @var string
     */
    public $sub_region;

    /**
     * Код населенного пункта СДЭК (метод "Список населенных пунктов")
     * @Type("int")
     * @var int
     */
    public $code;

    /**
     * Код населенного пункта СДЭК (метод "Список населенных пунктов")
     * @Type("int")
     * @var int
     */
    public $city_code;

    /**
     * Название города
     * @Type("string")
     * @var string
     */
    public $city;

    /**
     * Уникальный идентификатор ФИАС
     * @Type("string")
     * @var string
     */
    public $fias_guid;

    /**
     * Код КЛАДР
     * @Type("string")
     * @var string
     */
    public $kladr_code;

    /**
     * Почтовый индекс
     * @Type("string")
     * @var string
     */
    public $postal_code;

    /**
     * Долгота
     * @Type("float")
     * @var float
     */
    public $longitude;

    /**
     * Широта
     * @Type("float")
     * @var float
     */
    public $latitude;

    /**
     * Строка адреса
     * @Type("string")
     * @var string
     */
    public $address;

    /**
     * Полный адрес с указанием страны, региона, города, и т.д.
     * @Type("string")
     * @var string
     */
    public $address_full;

    /**
     * Location constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'country_code' => 'alpha:2',
            'region_code'  => 'integer',
            'code'         => 'integer',
            'city_code'    => 'integer',
            'longitude'    => 'numeric',
            'latitude'     => 'numeric'
        ];
    }
}
