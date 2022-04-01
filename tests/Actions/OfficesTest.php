<?php

/**
 * Copyright (c) 2019. CDEK-IT. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Chizhekov Viktor
 */

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\Offices;
use CdekSDK2\Dto\PickupPointList;
use CdekSDK2\Client;
use CdekSDK2\Http\ApiResponse;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class OfficesTest extends TestCase
{
    /**
     * @var Offices
     */
    private $offices;

    protected function setUp()
    {
        parent::setUp();
        $client = new Client(new Psr18Client());
        $client->setTest(true);
        $this->offices = $client->offices();
        AnnotationReader::addGlobalIgnoredName('phan');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->offices = null;
    }

    public function testGet()
    {
        $response = $this->offices->get();
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetFiltered()
    {
        $client = new Client(new Psr18Client());
        $client->setTest(true);
        $this->offices = $client->offices();

        $response = $this->offices->getFiltered(['country_code' => 'AE']);
        $this->assertInstanceOf(ApiResponse::class, $response);

        /* @var PickupPointList $pickupPointList */
        $pickupPointList = $client->formatResponseInClass($response, PickupPointList::class);
        $this->assertEquals(2, $pickupPointList->getCount());

        $this->assertCount(2, $pickupPointList->filter(['type' => 'PVZ']));
    }

    public function testParseFilter()
    {
        $filter = [
            'type'      => 'PVZ',
            'city_code' => 1,
        ];
        $class = new \ReflectionClass(Offices::class);
        $method = $class->getMethod('parseFilter');
        $method->setAccessible(true);

        $response = $method->invokeArgs($this->offices, [$filter]);

        $this->assertIsString($response);
        $this->assertEquals(http_build_query($filter), $response);
    }

    public function testParseFilterEmptyFilter()
    {
        $filter = [];
        $class = new \ReflectionClass(Offices::class);
        $method = $class->getMethod('parseFilter');
        $method->setAccessible(true);

        $response = $method->invokeArgs($this->offices, [$filter]);

        $this->assertIsString($response);
        $this->assertEquals(http_build_query($filter), $response);
    }

    public function testParseFilterBadParam()
    {
        $filter = [
            'type_pvz' => 'PVZ',
            'unknown'  => 1,
        ];
        $class = new \ReflectionClass(Offices::class);
        $method = $class->getMethod('parseFilter');
        $method->setAccessible(true);

        $response = $method->invokeArgs($this->offices, [$filter]);

        $this->assertIsString($response);
        $this->assertEquals('', $response);
    }
}
