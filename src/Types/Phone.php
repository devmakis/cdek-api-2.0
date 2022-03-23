<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use JMS\Serializer\Annotation\Type;

/**
 * Class Phone
 * Номер телефона (мобильный/городской):
 * @package CdekSDK2\BaseTypes
 */
class Phone extends Base
{

    /**
     * Номер телефона
     * Необходимо передавать в международном формате: код страны (для России +7) и сам номер (10 и более цифр)
     * @Type("string")
     * @var string
     */
    public $number;

    /**
     * Дополнительная информация (добавочный номер)
     * @Type("string")
     * @var string
     */
    public $additional;

    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'number' => 'required',
        ];
    }
}
