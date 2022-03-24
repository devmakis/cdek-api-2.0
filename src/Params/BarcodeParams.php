<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\Constants;
use CdekSDK2\Types\PrintOrder;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

class BarcodeParams extends BaseParams
{
    /**
     * Список заказов
     * @Type("array<CdekSDK2\Types\PrintOrder>")
     * @var PrintOrder[]
     */
    public $orders;

    /**
     * Число копий.
     * По умолчанию 1
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $copy_count = 1;

    /**
     * Формат печати. Может принимать значения: A4, A5, A6.
     * По умолчанию A4
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $format = Constants::PRINT_FORMAT_A4;

    /**
     * Язык печатной формы. Возможные языки в кодировке ISO - 639-3:
     * Русский - RUS
     * Английский - ENG
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $lang = 'RUS';

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'orders'     => [
                'required',
                'array',
                function ($value) {
                    return $value instanceof PrintOrder && $value->validate();
                }
            ],
            'copy_count' => 'integer',
            'format'     => 'alpha_num',
            'lang'       => 'alpha:3'
        ];
    }
}
