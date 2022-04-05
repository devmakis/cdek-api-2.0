<?php

declare(strict_types=1);

namespace CdekSDK2;

use Rakit\Validation\Validator;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

/**
 * Class BaseParams
 * @package CdekSDK2\Params
 */
class BaseValidation
{
    /**
     * Правила для валидаций
     * @Serializer\Exclude()
     * @var array
     */
    protected $rules = [];

    /**
     * Ошибки валидации
     * @Serializer\Exclude()
     * @Type("array")
     * @var array
     */
    protected $validationErrors = [];

    /**
     * Base конструктор
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        foreach ($param as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Валидация правил
     * @return bool
     * @psalm-suppress UndefinedDocblockClass
     */
    public function validate(): bool
    {
        $validator = new Validator();
        $validation = $validator->validate(get_object_vars($this), $this->rules);
        if ($validation->fails()) {
            $this->validationErrors[] = $validation->errors()->all();
        }
        return $validation->passes();
    }

    /**
     * @param $array
     * @param $class
     * @return bool
     */
    public static function validateObjectsArray($array, $class): bool
    {
        if (!is_array($array) || empty($array)) {
            return false;
        }
        $check = false;
        foreach ($array as $item) {
            if ($item instanceof $class) {
                $check = $item->validate();
                if (!$check) {
                    return false;
                }
            }
        }
        return $check;
    }

    /**
     * Создание объекта из массива
     * @param array $data
     * @return \CdekSDK2\BaseValidation
     */
    public static function create(array $data = []): self
    {
        return new static($data);
    }
}
