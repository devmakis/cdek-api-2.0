<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\Type;

/**
 * Class Location
 * @package CdekSDK2\BaseTypes
 */
class Location extends Base
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
            'country_code' => 'required|alpha:2',
            'region_code'  => 'required|integer',
            'region'       => 'required',
            'city_code'    => 'required|integer',
            'city'         => 'required',
            'postal_code'  => 'required',
            'longitude'    => 'required|numeric',
            'latitude'     => 'required|numeric',
            'address'      => 'required',
            'address_full' => 'required'
        ];
    }
}
