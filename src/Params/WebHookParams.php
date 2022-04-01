<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class WebHookParams extends BaseValidation
{
    /**
     * Тип события
     * @Type("string")
     * @var string
     */
    public $type;

    /**
     * URL, на который клиент хочет получать вебхуки
     * @Type("string")
     * @var string
     */
    public $url;

    /**
     * WebHook constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'type' => 'required|alpha_dash',
            'url'  => 'required|url',
        ];
    }
}
