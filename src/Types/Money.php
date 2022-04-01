<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Money extends BaseValidation
{
    /**
     * Сумма в валюте
     * @Type("float")
     * @var float
     */
    public $value;

    /**
     * Сумма НДС
     * @Type("float")
     * @var float|null
     */
    public $vat_sum;

    /**
     * Ставка НДС
     * @Type("int")
     * @var int|null
     */
    public $vat_rate;

    /**
     * Money constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'value'    => 'required|numeric',
            'vat_sum'  => 'numeric',
            'vat_rate' => 'integer',
        ];
    }
}
