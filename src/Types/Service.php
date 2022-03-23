<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class Service
 * @package CdekSDK2\BaseTypes
 */
class Service extends Base
{
    /**
     * Тип дополнительной услуги, код из справочника доп. услуг
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Параметр дополнительной услуги
     * @SkipWhenEmpty
     * @Type("string")
     * @var string
     */
    public $parameter;

    /**
     * Сумма услуги (в валюте договора)
     * @Type("float")
     * @var float
     */
    public $sum;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'      => 'required|integer',
            'parameter' => 'alpha',
            'sum'       => 'numeric'
        ];
    }
}
