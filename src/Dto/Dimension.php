<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class Dimension
 * @package CdekSDK2\BaseTypes
 */
class Dimension
{
    /**
     * Ширина (см)
     * @Type("float")
     * @var float
     */
    public $width;

    /**
     * Высота (см)
     * @Type("float")
     * @var float
     */
    public $height;

    /**
     * Глубина (см)
     * @Type("float")
     * @var float
     */
    public $depth;
}
