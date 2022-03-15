<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\Type;

/**
 * Class OrderServices
 * @package CdekSDK2\BaseTypes
 */
class OrderServices extends Services
{
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
            'sum' => 'numeric'
        ];
    }
}
