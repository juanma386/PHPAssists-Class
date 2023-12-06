<?php
/**
 * PHPAssists BankAccount API Test
 *
 * This class defines the possible Functions for the PHPAssists BankAccount API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\BankAccount;

class BankAccountTest extends TestCase 
{
    private string $account_id          = '1';
    private string $bank                = 'Bank of XYZ';
    private int    $last_4_digits_cbu   = 7890;
    private float  $current_balance     = 5000.00;

    public function testGetters()
    {
        $bankAccount = new BankAccount(
            $this->account_id,
            $this->bank,
            $this->last_4_digits_cbu,
            $this->current_balance
        );

        // Pruebas para los getters con los valores establecidos
        $this->assertEquals($this->account_id, $bankAccount->getId());
        $this->assertEquals($this->bank, $bankAccount->getBank());
        $this->assertEquals($this->last_4_digits_cbu, $bankAccount->getLast4DigitsCBU());
        $this->assertEquals($this->current_balance, $bankAccount->getCurrentBalance());
    }

    public function testSetBank()
    {
        $bankAccount = new BankAccount(
            $this->account_id,
            $this->bank,
            $this->last_4_digits_cbu,
            $this->current_balance
        );

        // Prueba para setBank() con un valor válido
        $bankAccount->setBank('Bank of ABC');
        $this->assertEquals('Bank of ABC', $bankAccount->getBank());

        // Prueba para setBank() con un valor inválido (null)
        $bankAccount->setBank(null);
        $this->assertNull($bankAccount->getBank());
    }

    public function testSetLast4DigitsCBU()
    {
        $bankAccount = new BankAccount(
            $this->account_id,
            $this->bank,
            $this->last_4_digits_cbu,
            $this->current_balance
        );

        // Prueba para setLast4DigitsCBU() con un valor válido
        $bankAccount->setLast4DigitsCBU((int) 1234);
        $this->assertEquals((int)1234, $bankAccount->getLast4DigitsCBU());

        // Prueba para setLast4DigitsCBU() con un valor inválido (cadena vacía)
        $bankAccount->setLast4DigitsCBU(null);
        $this->assertNull($bankAccount->getLast4DigitsCBU());
    }

    public function testSetCurrentBalance()
    {
        $bankAccount = new BankAccount(
            $this->account_id,
            $this->bank,
            $this->last_4_digits_cbu,
            $this->current_balance
        );

        // Prueba para setCurrentBalance() con un valor válido
        $bankAccount->setCurrentBalance(10000.00);
        $this->assertEquals(10000.00, $bankAccount->getCurrentBalance());

        // Prueba para setCurrentBalance() con un valor inválido (cero)
        $bankAccount->setCurrentBalance(0);
        $this->assertEquals(0, $bankAccount->getCurrentBalance());
    }

    public function testValidateLast4DigitsCBU()
    {
        $bankAccount = new BankAccount(
            $this->account_id,
            $this->bank,
            $this->last_4_digits_cbu,
            $this->current_balance
        );

        // Prueba para validateLast4DigitsCBU() con un valor válido
        $this->assertTrue($bankAccount->validateLast4DigitsCBU());

        // Prueba para validateLast4DigitsCBU() con un valor inválido
        $bankAccount->setLast4DigitsCBU((int)123); // Establece un valor inválido de 3 dígitos
        $this->assertFalse($bankAccount->validateLast4DigitsCBU());
    }
}
?>
