<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use JMS\Serializer\Annotation\Type;

/**
 * Class Response
 * @package CdekSDK2\Dto
 */
class Response
{
    /**
     * Информация о сущности, над которой выполняется запрос
     * (заказ, заявка, печатная форма, договоренность о доставке, подписка)
     * @Type("CdekSDK2\Dto\EntityDto")
     * @var EntityDto | OrderDto | InvoiceDto | BarcodeDto
     */
    public $entity;

    /**
     * Информация о запросах над сущностью
     * @Type("array<CdekSDK2\Dto\Request>")
     * @var Request[]
     */
    public $requests;

    /**
     * Связанные с заказом сущности
     * @Type("array<CdekSDK2\Dto\Relations>")
     * @var  Relations[]
     */
    public $related_entities;
}
