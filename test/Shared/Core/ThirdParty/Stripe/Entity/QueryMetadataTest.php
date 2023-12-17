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

    private QueryMetadata $queryMetadata;


    protected function setUp(): void {
        parent::setUp();
        $this->queryMetadata = new QueryMetadata();
    }
    public function testGenerateQueryStringMetadata(): void {
        $queryMetadata = $this->queryMetadata;

        $metadataValue = 'value';
        $metadataKey = 'key';
        $expectedResult = "metadata['key']: 'value'";
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);

        $metadataValue = null;
        $metadataKey = 'key';
        $expectedResult = null;
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);

        
        $metadataValue = null;
        $metadataKey = null;
        $expectedResult = null;
        $actualResult = $queryMetadata->generateQueryStringMetadata($metadataValue, $metadataKey);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testGetLastNumberWithValidLength() {
        $queryMetadata = $this->queryMetadata;
        $validLastNumber = 1234; 

        $result = $queryMetadata->getLastNumber($validLastNumber);

        $this->assertEquals('payment_method_details.card.last4:1234', $result);
    }

    public function testGetLastNumberWithInvalidLength() {
        $queryMetadata = $this->queryMetadata;
        $invalidLastNumber = 123; 

        $result = $queryMetadata->getLastNumber($invalidLastNumber);

        $this->assertNull($result);
    }

    // Custommer email

    public function testGetEmailCustomerWithValidEmail() {
        $customerSearch = $this->queryMetadata;
        $validEmail = 'test@example.com';

        $result = $customerSearch->getEmailCustommer($validEmail);

        $this->assertEquals("email:'$validEmail'", $result);
    }

    public function testGetEmailCustomerWithInvalidEmail() {
        $customerSearch = $this->queryMetadata;
        $invalidEmail = 'invalidemail'; // Este no es un correo electrónico válido

        $result = $customerSearch->getEmailCustommer($invalidEmail);

        $this->assertNull($result);
    }

    public function testBuildSearchQuery(): void {

        $queryMetadata = $this->queryMetadata;

        // Arrange
        $fields = [
            'currency' => 'eur',
            'status' => 'active',
            'amount' => '500',
        ];

        $expectedQuery = 'currency:"eur" AND status:"active" AND amount:"500"';

        // Act
        $searchQuery = $queryMetadata->buildSearchQuery($fields);

        // Assert
        $this->assertEquals($expectedQuery, $searchQuery);
    }

    public function testBuildSearchQueryWithArrayValue(): void {
        $queryMetadata = $this->queryMetadata;
        // Arrange
        $fields = [
            'currency' => 'eur',
            'status' => 'active',
            'amount' => ['500', '700'],
        ];

        $expectedQuery = 'currency:"eur" AND status:"active" AND amount:"500,700"';

        // Act
        $searchQuery = $queryMetadata->buildSearchQuery($fields);

        // Assert
        $this->assertEquals($expectedQuery, $searchQuery);
    }

    public function testBuildSearchQueryWithEscapeQuotes(): void {
        $queryMetadata = $this->queryMetadata;
        // Arrange
        $fields = [
            'description' => 'the story called "The Sky and the Sea."',
        ];

        $expectedQuery = 'description:"the story called \"The Sky and the Sea.\""';

        // Act
        $searchQuery = $queryMetadata->buildSearchQuery($fields);

        // Assert
        $this->assertEquals($expectedQuery, $searchQuery);
    }

}