<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Threshold extends BaseValidation
{
    /**
     * Порог стоимости товара (действует по условию меньше или равно) в целых единицах валюты
     * @Type("int")
     * @var int
     */
    public $threshold;

    /**
     * Доп. сбор за доставку товаров, общая стоимость которых попадает в интервал
     * @Type("float")
     * @var float
     */
    public $sum;

    /**
     * Сумма НДС, включённая в доп. сбор за доставку
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
     * Threshold constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'threshold ' => 'required|integer',
            'sum '       => 'required|numeric',
            'vat_sum'    => 'numeric',
            'vat_rate'   => 'integer',
        ];
    }
}
