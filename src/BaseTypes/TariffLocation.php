<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\Type;

/**
 * Class TariffLocation
 * @package CdekSDK2\BaseTypes
 */
class TariffLocation extends Base
{
    /**
     * Код населенного пункта СДЭК (метод "Список населенных пунктов")
     * @Type("int")
     * @var int
     */
    public $code;

    /**
     * Почтовый индекс
     * @Type("string")
     * @var string
     */
    public $postal_code;

    /**
     * Код страны в формате  ISO_3166-1_alpha-2
     * @example RU, DE, TR
     * @Type("string")
     * @var string
     */
    public $country_code;

    /**
     * Название города
     * @Type("string")
     * @var string
     */
    public $city;

    /**
     * Строка адреса
     * @Type("string")
     * @var string
     */
    public $address;

    /**
     * Location constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'         => 'integer',
            'postal_code'  => 'numeric',
            'country_code' => 'alpha:2'
        ];
    }
}
