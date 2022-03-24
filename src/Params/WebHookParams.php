<?php

declare(strict_types=1);

namespace CdekSDK2\Params;

use CdekSDK2\Types\Base;

/**
 * Class WebHookParams
 * @package CdekSDK2\Params
 */
class WebHookParams extends Base
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
