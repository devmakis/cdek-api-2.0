<?php

/**
 * Copyright (c) 2020. CDEK-IT. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Chizhekov Viktor
 */

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\Invoices;
use CdekSDK2\Client;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\InvoiceParams;
use CdekSDK2\Types\PrintOrder;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class InvoicesTest extends TestCase
{
    /**
     * @var Invoices
     */
    protected $invoices;

    protected function setUp()
    {
        parent::setUp();
        $psr18Client = new Psr18Client();
        $client = new Client($psr18Client);
        $client->setTest(true);
        $this->invoices = $client->invoice();
        AnnotationReader::addGlobalIgnoredName('phan');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->invoices = null;
    }

    public function testAdd()
    {
        /** @var InvoiceParams $invoice */
        $invoice = InvoiceParams::create([
            'orders'     => [
                PrintOrder::create([
                    'order_uuid' => 'fail-uuid'
                ]),
            ],
            'copy_count' => 1,
        ]);
        $this->assertTrue($invoice->validate());

        $response = $this->invoices->create($invoice);
        $this->assertInstanceOf(ApiResponse::class, $response);

        //$this->assertTrue($response->hasErrors());
        //$this->assertFalse($response->isOk());
    }

    public function testGet()
    {
        $response = $this->invoices->get('invoice');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDownload()
    {
        $response = $this->invoices->download('invoice');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
