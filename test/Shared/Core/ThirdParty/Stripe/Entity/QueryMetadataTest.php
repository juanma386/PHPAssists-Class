<?php
namespace PHPAssistsTest\Shared\Core\ThirdParty\Stripe\Entity;
/**
 * PHPAssists Stripe API Test
 *
 * This class defines the possible Functions for the PHPAssists Stripe API Test.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\ThirdParty\Stripe\Entity
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\ThirdParty\Stripe\Entity\QueryMetadata;

class QueryMetadataTest extends TestCase {
    public function testGenerateQueryStringMetadata(): void {
        $queryMetadata = new QueryMetadata();

        // Caso de prueba 1: metadataValue y metadataKey son válidos
        $metadataValue = 'value';
        $metadataKey = 'key';
        $expectedResult = "metadata['key']: 'value'";
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);

        // Caso de prueba 2: metadataValue o metadataKey son nulos
        $metadataValue = null;
        $metadataKey = 'key';
        $expectedResult = null;
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);

        // Caso de prueba 3: metadataValue y metadataKey son nulos
        $metadataValue = null;
        $metadataKey = null;
        $expectedResult = null;
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testGetLastNumberWithValidLength() {
        $queryMetadata = new QueryMetadata();
        $validLastNumber = 1234; // Número válido con 4 dígitos

        $result = $queryMetadata->getLastNumber($validLastNumber);

        $this->assertEquals('payment_method_details.card.last4:1234', $result);
    }

    public function testGetLastNumberWithInvalidLength() {
        $queryMetadata = new QueryMetadata();
        $invalidLastNumber = 123; // Número inválido con menos de 4 dígitos

        $result = $queryMetadata->getLastNumber($invalidLastNumber);

        $this->assertNull($result);
    }
}