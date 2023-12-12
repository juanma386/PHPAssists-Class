<?php
namespace PHPAssistsTest\Shared\Core\ThirdParty\Stripe\Entity;
/**
 * PHPAssists Stripe API Test
 *
 * This class defines the possible Functions for the PHPAssists Stripe API Test.
 *
 * @link       https://hexome.com.ar
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
use PHPAssists\Shared\Core\ThirdParty\Stripe\StripeChecker;
use PHPAssists\Shared\Core\ThirdParty\Stripe\Entity\StripeEntity;

class StripeEntityTest extends TestCase
{
    private ? StripeEntity $stripe;
    private ? StripeChecker $checker;
    private ?string $stripe_api_key;

    protected function setUp(): void {
        parent::setUp();
        $this->stripe_api_key = "sk_test_CGGvfNiIPwLXiDwaOfZ3oX6Y";
        $this->stripe = new StripeEntity($this->stripe_api_key);
        $this->checker = new StripeChecker();
    }

    public function testClassExists() : void
    {
        $this->assertInstanceOf(StripeChecker::class, $this->checker);
    }

    public function testVerifyIdInCSV()
    {
        // Crear un archivo CSV de prueba para esta prueba
        $filePath = 'test_file.csv';
        $paymentIntentId = 'example_payment_id';

        // Contenido de prueba en el archivo CSV
        $csvContent = [
            ['example_payment_id', 'info1', 'info2'],
            ['another_id', 'info3', 'info4'],
        ];

        // Escribir contenido en el archivo CSV
        $file = fopen($filePath, 'w');
        foreach ($csvContent as $fields) {
            fputcsv($file, $fields);
        }
        fclose($file);

        // Crear una instancia de StripeEntity y ejecutar el método a probar
        $stripeEntity = new StripeEntity($this->stripe_api_key);
        $result = $stripeEntity->verifyIdInCSV($paymentIntentId, $filePath);

        // Verificar que el resultado sea verdadero ya que $paymentIntentId está en el archivo CSV
        $this->assertTrue($result);

        // Eliminar el archivo CSV de prueba después de la prueba
        unlink($filePath);
    }

    // Agregar más pruebas para otros métodos de la clase StripeEntity según sea necesario
}
