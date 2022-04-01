<?php

/**
 * Copyright (c) 2020. CDEK-IT. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Chizhekov Viktor
 */

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\Barcodes;
use CdekSDK2\Client;
use CdekSDK2\Http\ApiResponse;
use CdekSDK2\Params\BarcodeParams;
use CdekSDK2\Types\PrintOrder;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class BarcodesTest extends TestCase
{
    /**
     * @var Barcodes
     */
    protected $barcodes;

    protected function setUp()
    {
        parent::setUp();
        $psr18Client = new Psr18Client();
        $client = new Client($psr18Client);
        $client->setTest(true);
        $this->barcodes = $client->barcodes();
        AnnotationReader::addGlobalIgnoredName('phan');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->barcodes = null;
    }

    public function testAdd()
    {
        /** @var BarcodeParams $barcode */
        $barcode = BarcodeParams::create([
            'orders'     => [
                PrintOrder::create([
                    'order_uuid' => 'fail-uuid'
                ]),
            ],
            'copy_count' => 1,
        ]);
        $this->assertTrue($barcode->validate());

        $response = $this->barcodes->create($barcode);
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGet()
    {
        $response = $this->barcodes->get('barcode');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDownload()
    {
        $response = $this->barcodes->download('barcode');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
