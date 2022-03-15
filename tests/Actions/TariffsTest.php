<?php

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\TariffList;
use CdekSDK2\BaseTypes\TariffLocation;
use CdekSDK2\BaseTypes\TariffPackage;
use CdekSDK2\BaseTypes\TariffParams;
use CdekSDK2\Client;
use CdekSDK2\Http\ApiResponse;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class TariffsTest extends TestCase
{
    /**
     * @var TariffList
     */
    private $tariffList;

    protected function setUp()
    {
        parent::setUp();
        $client = new Client(new Psr18Client());
        $client->setTest(true);

        $this->tariffList = $client->tariffList();
        AnnotationReader::addGlobalIgnoredName('phan');

        /** @phan-suppress-next-line PhanDeprecatedFunction */
        AnnotationRegistry::registerLoader('class_exists');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->tariffList = null;
    }

    public function testAll()
    {
        /** @var \CdekSDK2\BaseTypes\TariffParams $tariffParams */
        $tariffParams = TariffParams::create([
            'from_location' => TariffLocation::create([

            ]),
            'to_location'   => TariffLocation::create([]),
            'packages'      => TariffPackage::create([]),
        ]);

        $this->assertTrue($tariffParams->validate());
        $response = $this->tariffList->all($tariffParams);
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertFalse($response->hasErrors());
    }

    public function testGet()
    {
        $response = $this->tariffList->get('tarifflist');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
