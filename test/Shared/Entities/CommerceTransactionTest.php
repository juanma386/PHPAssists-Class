<?php
/**
 * PHPAssists CommerceTransaction API Test
 *
 * This class defines the possible Functions for the PHPAssists CommerceTransaction API Test.
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
use PHPAssists\Shared\Entities\CommerceTransaction;

class CommerceTransactionTest extends TestCase
{
    private $commerce_transaction_id = '1';
    private $transaction_id = '123';
    private $commerce_name = 'Shop ABC';
    private $commerce_location = 'City XYZ';
    private $total_amount = 150.00;

    public function testGetters()
    {
        $commerceTransaction = new CommerceTransaction(
            $this->commerce_transaction_id,
            $this->transaction_id,
            $this->commerce_name,
            $this->commerce_location,
            $this->total_amount
        );

        // Pruebas para los getters con los valores establecidos
        $this->assertEquals($this->commerce_transaction_id, $commerceTransaction->getId());
        $this->assertEquals($this->transaction_id, $commerceTransaction->getTransactionId());
        $this->assertEquals($this->commerce_name, $commerceTransaction->getCommerceName());
        $this->assertEquals($this->commerce_location, $commerceTransaction->getCommerceLocation());
        $this->assertEquals($this->total_amount, $commerceTransaction->getTotalAmount());
    }

    public function testSetCommerceName()
    {
        $commerceTransaction = new CommerceTransaction(
            $this->commerce_transaction_id,
            $this->transaction_id,
            $this->commerce_name,
            $this->commerce_location,
            $this->total_amount
        );

        // Prueba para setCommerceName() con un valor válido
        $commerceTransaction->setCommerceName('Shop XYZ');
        $this->assertEquals('Shop XYZ', $commerceTransaction->getCommerceName());

        // Prueba para setCommerceName() con un valor inválido (null)
        $commerceTransaction->setCommerceName(null);
        $this->assertNull($commerceTransaction->getCommerceName());
    }

    public function testSetTotalAmount()
    {
        $commerceTransaction = new CommerceTransaction(
            $this->commerce_transaction_id,
            $this->transaction_id,
            $this->commerce_name,
            $this->commerce_location,
            $this->total_amount
        );

        // Prueba para setTotalAmount() con un valor válido
        $commerceTransaction->setTotalAmount(200.00);
        $this->assertEquals(200.00, $commerceTransaction->getTotalAmount());

        // Prueba para setTotalAmount() con un valor inválido (cero)
        $commerceTransaction->setTotalAmount(0);
        $this->assertEquals(0, $commerceTransaction->getTotalAmount());
    }
}
?>
