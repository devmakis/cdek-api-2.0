<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

/**
 * Class Services
 * @package CdekSDK2\BaseTypes
 */
class Services extends Base
{
    /**
     * Тип дополнительной услуги, код из справочника доп. услуг
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Параметр дополнительной услуги
     * @Type("float")
     * @var float
     */
    public $parameter;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'      => 'required|alpha',
            'parameter' => 'alpha',
        ];
    }
}
