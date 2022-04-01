<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Status extends BaseValidation
{
    /**
     * Код статуса
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Название статуса
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * Дата и время установки статуса (формат yyyy-MM-dd'T'HH:mm:ssZ)
     * @Type("string")
     * @var string
     */
    public $date_time;

    /**
     * Дополнительный код статуса
     * @Type("string")
     * @var string
     */
    public $reason_code;

    /**
     * Наименование места возникновения статуса
     * @Type("string")
     * @var string
     */
    public $city;

    /**
     * Код населенного пункта возникновения статуса
     * @Type("int")
     * @var int
     */
    public $city_code;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'      => 'required',
            'name'      => 'required',
            'date_time' => 'required'
        ];
    }
}
