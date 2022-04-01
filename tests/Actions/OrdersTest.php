<?php

/**
 * Copyright (c) 2019. CDEK-IT. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Chizhekov Viktor
 */

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\Orders;
use CdekSDK2\Client;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\OrderParams;
use CdekSDK2\Types\Contact;
use CdekSDK2\Types\Item;
use CdekSDK2\Types\Location;
use CdekSDK2\Types\Money;
use CdekSDK2\Types\Package;
use CdekSDK2\Types\Phone;
use CdekSDK2\Types\Threshold;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class OrdersTest extends TestCase
{
    /**
     * @var Orders
     */
    protected $orders;

    protected function setUp()
    {
        parent::setUp();
        $psr18Client = new Psr18Client();
        $client = new Client($psr18Client);
        $client->setTest(true);
        $this->orders = $client->orders();
        AnnotationReader::addGlobalIgnoredName('phan');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->orders = null;
    }

    public function testAdd()
    {
        $order_number = uniqid('sdk-test', true);
        /** @var \CdekSDK2\Params\OrderParams $order */
        $order = OrderParams::create([
            'number'                      => $order_number,
            'tariff_code'                 => '11',
            'comment'                     => 'test comment',
            'sender'                      => Contact::create([
                'name'   => 'Иван Васильев',
                'phones' => [
                    Phone::create(['number' => '+79531234567'])
                ]
            ]),
            'recipient'                   => Contact::create([
                'name'   => 'Витька Балотоев',
                'email'  => 'vasja@cdek.it',
                'phones' => [
                    Phone::create(['number' => '+79531234567'])
                ]
            ]),
            'delivery_recipient_cost_adv' => [
                Threshold::create(['sum' => 200, 'threshold' => 1000]),
            ],
            'from_location'               => Location::create([
                'address' => 'Ленина 23-1',
                'code'    => 270
            ]),
            'to_location'                 => Location::create([
                'address' => 'Марата, 47-49',
                'code'    => 137
            ]),
            'packages'                    => [
                Package::create([
                    'number'  => $order_number,
                    'weight'  => 1000,
                    'length'  => 10.8,
                    'width'   => 11.0,
                    'height'  => 11.1,
                    'comment' => 'comment Package number',
                    'items'   => [
                        Item::create([
                            'name'     => 'item name',
                            'ware_key' => 'YUQT23DA8734',
                            'payment'  => Money::create([
                                'value' => 0,
                            ]),
                            'cost'     => 0,
                            'weight'   => 100,
                            'amount'   => 10,
                        ])
                    ]
                ])
            ],
        ]);

        $this->assertTrue($order->validate());

        $response = $this->orders->create($order);
        $this->assertInstanceOf(ApiResponse::class, $response);

        $this->assertTrue($response->isOk());
        $this->assertFalse($response->hasErrors());
    }

    public function testDelete()
    {
        $response = $this->orders->delete('orders');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGet()
    {
        $response = $this->orders->get('orders');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
