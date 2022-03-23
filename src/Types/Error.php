<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use JMS\Serializer\Annotation\Type;

class Error extends Base
{
    /**
     * Код ошибки
     * @Type("string")
     * @var string
     */
    public $code;

    /**
     * Описание ошибки
     * @Type("string")
     * @var string
     */
    public $message;

    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code'    => 'required',
            'message' => 'required',
        ];
    }
}
