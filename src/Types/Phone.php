<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Phone extends BaseValidation
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
