<?php

declare(strict_types=1);

namespace CdekSDK2\Types;

use CdekSDK2\BaseValidation;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * @method static $this create(array $data = [])
 */
class Contact extends BaseValidation
{
    /**
     * Название компании
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $company;

    /**
     * ФИО контактного лица
     * @Type("string")
     * @var string
     */
    public $name;

    /**
     * Электронный адрес
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $email;

    /**
     * Список телефонов
     * @Type("array<CdekSDK2\Types\Phone>")
     * @var Phone[]
     */
    public $phones;

    /**
     * Серия паспорта получателя(только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $passport_series;

    /**
     * Номер паспорта получателя (только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $passport_number;

    /**
     * Дата выдачи паспорта получателя (только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $passport_date_of_issue;

    /**
     * Орган выдачи паспорта получателя (только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $passport_organization;

    /**
     * Дата рождения получателя (только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $passport_date_of_birth;

    /**
     * ИНН получателя (только для международных заказов)
     * @SkipWhenEmpty()
     * @Type("string")
     * @var string
     */
    public $tin;

    /**
     * Contact constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'name'   => 'required',
            'email'  => 'email',
            'phones' => [
                'required',
                'array',
                function ($value) {
                    return parent::validateObjectsArray($value, Phone::class);
                }
            ]
        ];
    }
}
