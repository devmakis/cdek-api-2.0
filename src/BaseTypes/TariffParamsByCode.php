<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

/**
 * Class Package
 * @package CdekSDK2\BaseTypes
 */
class TariffParamsByCode extends TariffParams
{
    /**
     * Код тарифа
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Дополнительные услуги
     * @Type("array<CdekSDK2\BaseTypes\Services>")
     * @var Services[]
     */
    public $services;

    /**
     * Package constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'packages' => [
                'array',
                function ($value) {
                    if (!is_array($value)) {
                        return false;
                    }

                    $check = false;
                    foreach ($value as $item) {
                        if ($item instanceof Services) {
                            $check = $item->validate();
                            if (!$check) {
                                return false;
                            }
                        }
                    }
                    return $check;
                }
            ],
        ];
    }
}
