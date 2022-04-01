<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Error extends BaseValidation
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
