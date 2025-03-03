<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Seller extends BaseValidation
{
    /**
     * Наименование истинного продавца
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * ИНН истинного продавца
     * @SkipWhenEmpty()
     * @Type("int")
     * @var int
     */
    public $inn;

    /**
     * Телефон истинного продавца
     * @Type("string")
     * @var string
     */
    public $phone;

    /**
     * Код формы собственности
     * @Type("int")
     * @var int
     */
    public $ownership_form;

    /**
     * Адрес истинного продавца.
     * Используется при печати инвойсов для отображения адреса настоящего продавца товара, либо торгового названия.
     * Только для международных заказов
     * @Type("string")
     * @var string
     */
    public $address;
}
