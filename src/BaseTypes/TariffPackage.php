<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

/**
 * Class TariffPackage
 * @package CdekSDK2\BaseTypes
 */
class TariffPackage extends Package
{
    /**
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'weight' => 'required'
        ];
    }
}
