<?php
/**
 * PHPAssists PaymentMethod API Test
 *
 * This class defines the possible Functions for the PHPAssists PaymentMethod API Test.
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
use PHPAssists\Shared\Entities\PaymentMethod;

class PaymentMethodTest extends TestCase
{
    private $payment_method_id = '1';
    private $method_name = 'Credit Card';

    public function testGetters()
    {
        $paymentMethod = new PaymentMethod($this->payment_method_id, $this->method_name);

        $this->assertEquals($this->payment_method_id, $paymentMethod->getId());
        $this->assertEquals($this->method_name, $paymentMethod->getMethodName());
    }

    public function testSetMethodName()
    {
        $paymentMethod = new PaymentMethod($this->payment_method_id, $this->method_name);

        // Prueba para setMethodName() con un valor válido
        $newMethodName = 'Debit Card';
        $paymentMethod->setMethodName($newMethodName);
        $this->assertEquals($newMethodName, $paymentMethod->getMethodName());

        // Prueba para setMethodName() con un valor inválido (null)
        $paymentMethod->setMethodName(null);
        $this->assertNull($paymentMethod->getMethodName());

        // Prueba para setMethodName() con un valor inválido (cadena vacía)
        $paymentMethod->setMethodName('');
        $this->assertNull($paymentMethod->getMethodName());
    }
}
