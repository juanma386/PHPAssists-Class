<?php
/**
 * PHPAssists ProductPrice API Test
 *
 * This class defines the possible Functions for the PHPAssists ProductPrice API Test.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\ProductPrice;

class ProductPriceTest extends TestCase
{
    private ?string $product_price_id   = '1';
    private ?string $transaction_id     = '100';
    private ?string $product_id         = '200';
    private ?float  $product_cost       = 50.00;

    public function testGetters()
    {
        $productPrice = new ProductPrice(
            $this->product_price_id,
            $this->transaction_id,
            $this->product_id,
            $this->product_cost
        );

        // Pruebas para los getters con los valores establecidos
        $this->assertEquals($this->product_price_id, $productPrice->getId());
        $this->assertEquals($this->transaction_id, $productPrice->getTransactionId());
        $this->assertEquals($this->product_id, $productPrice->getProductId());
        $this->assertEquals($this->product_cost, $productPrice->getProductCost());
    }

    public function testSetTransactionId()
    {
        $productPrice = new ProductPrice(
            $this->product_price_id,
            $this->transaction_id,
            $this->product_id,
            $this->product_cost
        );

        // Prueba para setTransactionId() con un valor válido
        $productPrice->setTransactionId('150');
        $this->assertEquals('150', $productPrice->getTransactionId());

        // Prueba para setTransactionId() con un valor inválido (null)
        $productPrice->setTransactionId(null);
        $this->assertNull($productPrice->getTransactionId());
    }

    public function testSetProductId()
    {
        $productPrice = new ProductPrice(
            $this->product_price_id,
            $this->transaction_id,
            $this->product_id,
            $this->product_cost
        );

        // Prueba para setProductId() con un valor válido
        $productPrice->setProductId('300');
        $this->assertEquals('300', $productPrice->getProductId());

        // Prueba para setProductId() con un valor inválido (cadena vacía)
        $productPrice->setProductId('');
        $this->assertNull($productPrice->getProductId());
    }

    public function testSetProductCost()
    {
        $productPrice = new ProductPrice(
            $this->product_price_id,
            $this->transaction_id,
            $this->product_id,
            $this->product_cost
        );

        // Prueba para setProductCost() con un valor válido
        $productPrice->setProductCost(75.00);
        $this->assertEquals(75.00, $productPrice->getProductCost());

        // Prueba para setProductCost() con un valor inválido (cero)
        $productPrice->setProductCost(0);
        $this->assertEquals(0, $productPrice->getProductCost());
    }
}
?>
