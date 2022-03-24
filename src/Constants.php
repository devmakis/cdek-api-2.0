<?php

declare(strict_types=1);

namespace CdekSDK2;

/**
 * Class Constants
 * @package CdekSDK2
 */
class Constants
{
    /**
     * Хук: статусы
     * @var string
     */
    public const HOOK_TYPE_STATUS = 'ORDER_STATUS';

    /**
     * Хук: печатные формы
     * @var string
     */
    public const HOOK_PRINT_STATUS = 'PRINT_FORM';

    /**
     * Хук: задел на будущее
     * @var string
     */
    public const HOOK_TYPE_OTHER = 'ANYTHING_OTHER';

    /**
     * Ошибка авторизации
     * @var string
     */
    public const AUTH_FAIL = 'Authentication is failed, please check your account and secure';

    /**
     * Страхование
     * @var string
     */
    public const SERVICE_INSURANCE = 'INSURANCE';

    /**
     * Доставка в выходной день
     * @var string
     */
    public const SERVICE_WEEKEND_DELIVERY = 'DELIV_WEEKEND';

    /**
     * Опасный груз.
     * @var string
     */
    public const SERVICE_DANGEROUS_GOODS = 'DANGER_CARGO';

    /**
     * Ожидание более 15 мин. у получателя
     * @var string
     */
    public const SERVICE_WAIT_FOR_RECEIVER = 'WAIT_FOR_RECEIVER';

    /**
     * Ожидание более 15 мин. у отправителя
     * @var string
     */
    public const SERVICE_WAIT_FOR_SENDER = 'WAIT_FOR_SENDER';

    /**
     * Повторная поездка
     * @var string
     */
    public const SERVICE_REPEATED_DELIVERY = 'REPEATED_DELIVERY';

    /**
     * Подъем на этаж ручной
     * @var string
     */
    public const SERVICE_GET_UP_FLOOR_BY_HAND = 'GET_UP_FLOOR_BY_HAND';

    /**
     * Подъем на этаж лифтом
     * @var string
     */
    public const SERVICE_GET_UP_FLOOR_BY_ELEVATOR = 'GET_UP_FLOOR_BY_ELEVATOR';

    /**
     * Прозвон
     * @var string
     */
    public const SERVICE_CALL = 'CALL';

    /**
     * Тепловой режим
     * @var string
     */
    public const SERVICE_THERMAL_MODE = 'THERMAL_MODE';

    /**
     * Пакет курьерский А2
     * @var string
     */
    public const SERVICE_COURIER_PACKAGE_A2 = 'COURIER_PACKAGE_A2';

    /**
     * Сейф пакет А2
     * @var string
     */
    public const SERVICE_SECURE_PACKAGE_A2 = 'SECURE_PACKAGE_A2';

    /**
     * Сейф пакет А3
     * @var string
     */
    public const SERVICE_SECURE_PACKAGE_A3 = 'SECURE_PACKAGE_A3';

    /**
     * Сейф пакет А4
     * @var string
     */
    public const SERVICE_SECURE_PACKAGE_A4 = 'SECURE_PACKAGE_A4';

    /**
     * Сейф пакет А5
     * @var string
     */
    public const SERVICE_SECURE_PACKAGE_A5 = 'SECURE_PACKAGE_A5';

    /**
     * Уведомление о создании заказа в СДЭК
     * @var string
     */
    public const SERVICE_NOTIFY_ORDER_CREATED = 'NOTIFY_ORDER_CREATED';

    /**
     * Уведомление о приеме заказа на доставку
     * @var string
     */
    public const SERVICE_NOTIFY_ORDER_DELIVERY = 'NOTIFY_ORDER_DELIVERY';

    /**
     * Коробка XS (0,5 кг 17х12х9 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_XS = 'CARTON_BOX_XS';

    /**
     * Коробка S (2 кг 21х20х11 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_S = 'CARTON_BOX_S';

    /**
     * Коробка M (5 кг 33х25х15 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_M = 'CARTON_BOX_M';

    /**
     * Коробка L (12 кг 34х33х26 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_L = 'CARTON_BOX_L';

    /**
     * Коробка (0,5 кг 17х12х10 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_500GR = 'CARTON_BOX_500GR';

    /**
     * Коробка (1 кг 24х17х10 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_1KG = 'CARTON_BOX_1KG';

    /**
     * Коробка (2 кг 34х24х10 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_2KG = 'CARTON_BOX_2KG';

    /**
     * Коробка (3 кг 24х24х21 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_3KG = 'CARTON_BOX_3KG';

    /**
     * Коробка (5 кг 40х24х21 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_5KG = 'CARTON_BOX_5KG';

    /** @var string Коробка (10 кг 40х35х28 см) */
    public const SERVICE_CARTON_BOX_10KG = 'CARTON_BOX_10KG';

    /**
     * Коробка (15 кг 60х35х29 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_15KG = 'CARTON_BOX_15KG';

    /**
     * Коробка (20 кг 47х40х43 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_20KG = 'CARTON_BOX_20KG';

    /**
     * Коробка (30 кг 69х39х42 см)
     * @var string
     */
    public const SERVICE_CARTON_BOX_30KG = 'CARTON_BOX_30KG';

    /**
     * Воздушно-пузырчатая пленка
     * @var string
     */
    public const SERVICE_BUBBLE_WRAP = 'BUBBLE_WRAP';

    /**
     * Макулатурная бумага
     * @var string
     */
    public const SERVICE_WASTE_PAPER = 'WASTE_PAPER';

    /**
     * Прессованный картон "филлер" (55х14х2,3 см)
     * @var string
     */
    public const SERVICE_CARTON_FILLER = 'CARTON_FILLER';

    /**
     * Запрет осмотра вложения
     * @var string
     */
    public const SERVICE_BAN_ATTACHMENT_INSPECTION = 'BAN_ATTACHMENT_INSPECTION';

    /**
     * Смс уведомление
     * @var string
     */
    public const SERVICE_SMS_NOTIFICATION = 'SMS';

    /**
     * Забор в городе отправителе.
     * @var string
     */
    public const SERVICE_PICKUP = 'TAKE_SENDER';

    /**
     * Доставка в городе получателе.
     * @var string
     */
    public const SERVICE_DELIVERY_TO_DOOR = 'DELIV_RECEIVER';

    /**
     * Упаковка 1 310*215*280мм
     * @var string
     */
    public const SERVICE_PACKAGE_1 = 'PACKAGE_1';

    /**
     * Примерка на дому.
     * @var string
     */
    public const SERVICE_TRY_AT_HOME = 'TRYING_ON';

    /**
     * Частичная доставка.
     * @var string
     */
    public const SERVICE_PARTIAL_DELIVERY = 'PART_DELIV';

    /**
     * Осмотр вложения.
     * @var string
     */
    public const SERVICE_CARGO_CHECK = 'INSPECTION_CARGO';

    /**
     * Реверс.
     * @var string
     */
    public const SERVICE_REVERSE = 'REVERSE';

    /**
     * Статус: Принят
     * @var string
     */
    public const STATUS_ACCEPTED = 'ACCEPTED';

    /**
     * Статус: Создан
     * @var string
     */
    public const STATUS_CREATED = 'CREATED';

    /**
     * Статус: Сформирован
     * @var string
     */
    public const STATUS_READY = 'READY';

    /**
     * Статус: Формируется
     * @var string
     */
    public const STATUS_PROCESSING = 'PROCESSING';

    /**
     * Статус: Удален
     * @var string
     */
    public const STATUS_REMOVED = 'REMOVED';

    /**
     * Статус: Некорректный запрос
     * @var string
     */
    public const STATUS_INVALID = 'INVALID';

    /**
     * Статус: Принят на склад отправителя
     * @var string
     */
    public const STATUS_TAKEIN = 'RECEIVED_AT_SENDER_WAREHOUSE';

    /**
     * Статус: Выдан на отправку в городе отправителе
     * @var string
     */
    public const STATUS_READY_FOR_SHIPMENT_IN_SENDER_CITY = 'READY_FOR_SHIPMENT_IN_SENDER_CITY';

    /**
     * Статус: Возвращен на склад отправителя
     * @var string
     */
    public const STATUS_RETURNED_TO_SENDER_CITY_WAREHOUSE = 'RETURNED_TO_SENDER_CITY_WAREHOUSE';

    /**
     * Статус: Сдан перевозчику в городе отправителе
     * @var string
     */
    public const STATUS_TAKEN_BY_TRANSPORTER_FROM_SENDER_CITY = 'TAKEN_BY_TRANSPORTER_FROM_SENDER_CITY';

    /**
     * Статус: Отправлен в г. транзит
     * @var string
     */
    public const STATUS_SENT_TO_TRANSIT_CITY = 'SENT_TO_TRANSIT_CITY';

    /**
     * Статус: Встречен в г. транзите
     * @var string
     */
    public const STATUS_ACCEPTED_IN_TRANSIT_CITY = 'ACCEPTED_IN_TRANSIT_CITY';

    /**
     * Статус: Принят на склад транзита
     * @var string
     */
    public const STATUS_ACCEPTED_AT_TRANSIT_WAREHOUSE = 'ACCEPTED_AT_TRANSIT_WAREHOUSE';

    /**
     * Статус: Возвращен на склад транзита
     * @var string
     */
    public const STATUS_RETURNED_TO_TRANSIT_WAREHOUSE = 'RETURNED_TO_TRANSIT_WAREHOUSE';

    /**
     * Статус: Выдан на отправку в г. транзите
     * @var string
     */
    public const STATUS_READY_FOR_SHIPMENT_IN_TRANSIT_CITY = 'READY_FOR_SHIPMENT_IN_TRANSIT_CITY';

    /**
     * Статус: Сдан перевозчику в г. транзите
     * @var string
     */
    public const STATUS_TAKEN_BY_TRANSPORTER_FROM_TRANSIT_CITY = 'TAKEN_BY_TRANSPORTER_FROM_TRANSIT_CITY';

    /**
     * Статус: Отправлен в г. получатель
     * @var string
     */
    public const STATUS_SENT_TO_RECIPIENT_CITY = 'SENT_TO_RECIPIENT_CITY';

    /**
     * Статус: Встречен в г. получателе
     * @var string
     */
    public const STATUS_ARRIVED_AT_RECIPIENT_CITY = 'ARRIVED_AT_RECIPIENT_CITY';

    /**
     * Статус: Принят на склад доставки
     * @var string
     */
    public const STATUS_ACCEPTED_AT_RECIPIENT_CITY_WAREHOUSE = 'ACCEPTED_AT_RECIPIENT_CITY_WAREHOUSE';

    /**
     * Статус: Принят на склад до востребования
     * @var string
     */
    public const STATUS_ACCEPTED_AT_PICK_UP_POINT = 'ACCEPTED_AT_PICK_UP_POINT';

    /**
     * Статус: Выдан на доставку
     * @var string
     */
    public const STATUS_TAKEN_BY_COURIER = 'TAKEN_BY_COURIER';

    /**
     * Статус: Возвращен на склад доставки
     * @var string
     */
    public const STATUS_RETURNED_TO_RECIPIENT_CITY_WAREHOUSE = 'RETURNED_TO_RECIPIENT_CITY_WAREHOUSE';

    /**
     * Статус: Вручен
     * @var string
     */
    public const STATUS_DELIVERED = 'DELIVERED';

    /**
     * Статус: Не вручен
     * @var string
     */
    public const STATUS_NOT_DELIVERED = 'NOT_DELIVERED';

    /**
     * Параметр типа аутентификации
     * @var string
     */
    public const AUTH_PARAM_CREDENTIAL = 'client_credentials';

    /**
     * Ключ авторизации: тип аутентификации, доступное значение: client_credentials
     * @var string
     */
    public const AUTH_KEY_TYPE = 'grant_type';

    /**
     * Ключ авторизации: идентификатор клиента, равен Account
     * @var string
     */
    public const AUTH_KEY_CLIENT_ID = 'client_id';

    /**
     * Ключ авторизации: секретный ключ клиента, равен Secure password
     * @var string
     */
    public const AUTH_KEY_SECRET = 'client_secret';

    /**
     * Настройки таймаута для запросов
     * @var int
     */
    public const CONNECTION_TIMEOUT = 10;

    /**
     * Адрес сервиса интеграции
     * @var string
     */
    public const API_URL = 'https://api.cdek.ru/v2';

    /**
     * Адрес сервиса интеграции для тестов
     * @var string
     */
    public const API_URL_TEST = 'https://api.edu.cdek.ru/v2';

    /**
     * Аккаунт для тестовой среды
     * @var string
     */
    public const TEST_ACCOUNT = 'EMscd6r9JnFiQ3bLoyjJY6eM78JrJceI';

    /**
     * Секретный ключ для тестовой среды
     * @var string
     */
    public const TEST_SECURE = 'PjLZkKBHEiLK3YsjtNrt3TGNG0ahs3kG';

    /**
     * Тип связанной сущности: возвратный заказ
     * (возвращается для прямого, если заказ не вручен и по нему уже был сформирован возвратный заказ)
     * @var string
     */
    public const RELATION_RETURN_ORDER = 'return_order';

    /**
     * Тип связанной сущности: прямой заказ
     * (возвращается для возвратного)
     * @var string
     */
    public const RELATION_DIRECT_ORDER = 'direct_order';

    /**
     * Тип связанной сущности: квитанция к заказу
     * (возвращается для заказа, по которому есть сформированная квитанция)
     * @var string
     */
    public const RELATION_WAYBILL = 'waybill';

    /**
     * Тип связанной сущности: ШК-место к заказу
     * (возвращается для заказа, по которому есть сформированный ШК места)
     * @var string
     */
    public const RELATION_BARCODE = 'barcode';

    /**
     * Тип связанной сущности: реверсный заказ
     * (возвращается для прямого заказа, если подключен реверс)
     * @var string
     */
    public const RELATION_REVERSE_ORDER = 'reverse_order';

    /**
     * Тип связанной сущности: актуальная договоренность о доставке
     * @var string
     */
    public const RELATION_DELIVERY = 'delivery';

    /**
     * Код материала товара: Полиэстер
     * @var int
     */
    public const MATERIAL_POLYESTER = 1;

    /**
     * Код материала товара: Нейлон
     * @var int
     */
    public const MATERIAL_NYLON = 2;

    /**
     * Код материала товара: Флис
     * @var int
     */
    public const MATERIAL_FLEECE = 3;

    /**
     * Код материала товара: Хлопок
     * @var int
     */
    public const MATERIAL_COTTON = 4;

    /**
     * Код материала товара: Текстиль
     * @var int
     */
    public const MATERIAL_TEXTILES = 5;

    /**
     * Код материала товара: Лён
     * @var int
     */
    public const MATERIAL_FLAX = 6;

    /**
     * Код материала товара: Вискоза
     * @var int
     */
    public const MATERIAL_VISCOSE = 7;

    /**
     * Код материала товара: Шелк
     * @var int
     */
    public const MATERIAL_SILK = 8;

    /**
     * Код материала товара: Шерсть
     * @var int
     */
    public const MATERIAL_WOOL = 9;

    /**
     * Код материала товара: Кашемир
     * @var int
     */
    public const MATERIAL_CASHMERE = 10;

    /**
     * Код материала товара: Кожа
     * @var int
     */
    public const MATERIAL_LEATHER = 11;

    /**
     * Код материала товара: Кожзам
     * @var int
     */
    public const MATERIAL_LEATHERETTE = 12;

    /**
     * Код материала товара: Искусственный мех
     * @var int
     */
    public const MATERIAL_FAUX_FUR = 13;

    /**
     * Код материала товара: Замша
     * @var int
     */
    public const MATERIAL_SUEDE = 14;

    /**
     * Код материала товара: Полиуретан
     * @var int
     */
    public const MATERIAL_POLYURETHANE = 15;

    /**
     * Код материала товара: Спандекс
     * @var int
     */
    public const MATERIAL_SPANDEX = 16;

    /**
     * Код материала товара: Резина
     * @var int
     */
    public const MATERIAL_RUBBER = 17;

    /**
     * Код режима доставки: дверь-дверь
     * @var int
     */
    public const DELIVERY_MODE_CODE_DOOR_DOOR = 1;

    /**
     * Режим доставки: дверь-дверь
     * @var int
     */
    public const DELIVERY_MODE_NAME_DOOR_DOOR = 'дверь-дверь';

    /**
     * Код режима доставки: дверь-склад
     * @var int
     */
    public const DELIVERY_MODE_CODE_DOOR_WAREHOUSE = 2;

    /**
     * Режим доставки: дверь-склад
     * @var int
     */
    public const DELIVERY_MODE_NAME_DOOR_WAREHOUSE = 'дверь-склад';

    /**
     * Код режима доставки: склад-дверь
     * @var int
     */
    public const DELIVERY_MODE_CODE_WAREHOUSE_DOOR = 3;

    /**
     * Режим доставки: склад-дверь
     * @var int
     */
    public const DELIVERY_MODE_NAME_WAREHOUSE_DOOR = 'склад-дверь';

    /**
     * Код режима доставки: склад-склад
     * @var int
     */
    public const DELIVERY_MODE_CODE_WAREHOUSE_WAREHOUSE = 4;

    /**
     * Код режима доставки: склад-склад
     * @var int
     */
    public const DELIVERY_MODE_NAME_WAREHOUSE_WAREHOUSE = 'склад-склад';

    /**
     * Код режима доставки: дверь-постамат
     * @var int
     */
    public const DELIVERY_MODE_CODE_DOOR_POSTAMAT = 5;

    /**
     * Режим доставки: дверь-постамат
     * @var int
     */
    public const DELIVERY_MODE_NAME_DOOR_POSTAMAT = 'дверь-постамат';

    /**
     * Код режима доставки: склад-постамат
     * @var int
     */
    public const DELIVERY_MODE_CODE_WAREHOUSE_POSTAMAT = 6;

    /**
     * Код режима доставки: склад-постамат
     * @var int
     */
    public const DELIVERY_MODE_NAME_WAREHOUSE_POSTAMAT = 'склад-постамат';

    /**
     * Код тарифа "Магистральный экспресс склад-склад"
     * @var int
     */
    public const TARIFF_CODE_TRUNK_EXPRESS_WAREHOUSE_WAREHOUSE = 62;

    /**
     * Код тарифа "Магистральный экспресс дверь-дверь"
     * @var int
     */
    public const TARIFF_CODE_TRUNK_EXPRESS_DOOR_DOOR = 121;

    /**
     * Код тарифа "Магистральный экспресс склад-дверь"
     * @var int
     */
    public const TARIFF_CODE_TRUNK_EXPRESS_WAREHOUSE_DOOR = 122;

    /**
     * Код тарифа "Магистральный экспресс дверь-склад"
     * @var int
     */
    public const TARIFF_CODE_TRUNK_EXPRESS_DOOR_WAREHOUSE = 123;

    /**
     * Код ошибки "Место с указанным номером уже существует"
     * @var string
     */
    public const ERROR_CODE_VALIDATE_PACKAGE_NUMBER_HAS_ALREASY_USED = 'error_validate_package_number_has_alreasy_used';

    /**
     * Формат печати: A4
     * @var string
     */
    public const PRINT_FORMAT_A4 = 'A4';

    /**
     * Формат печати: A5
     * @var string
     */
    public const PRINT_FORMAT_A5 = 'A5';

    /**
     * Формат печати: A6
     * @var string
     */
    public const PRINT_FORMAT_A6 = 'A6';
}
