<?php
/**
 * PHPAssists BankAccount API
 *
 * This class defines the possible abstractions for the PHPAssists BankAccount API.
 * It represents a template for managing bank account information.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssists\Shared\Entities\Abstracts;

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * Abstract class AbstractBankAccount
 *
 * This abstract class defines essential properties and methods for handling bank accounts within the PHPAssists framework.
 */
abstract class AbstractBankAccount extends ClassInvocationProcessor {

    // Database-related properties
    protected $table = 'bank_accounts';
    protected $primaryKey = 'account_id';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['bank', 'last_4_digits_cbu', 'current_balance'];

    /**
     * Constructor for the AbstractBankAccount class.
     *
     * @param mixed $id The ID of the bank account.
     * @param mixed $bank The bank associated with the account.
     * @param mixed $last_4_digits_cbu The last 4 digits of CBU (Clave Bancaria Uniforme).
     * @param mixed $current_balance The current balance in the account.
     */
    public function __construct($id, $bank, $last_4_digits_cbu, $current_balance) {
        $this->setId($id);
        $this->setBank($bank);
        $this->setLast4DigitsCBU($last_4_digits_cbu);
        $this->setCurrentBalance($current_balance);
    }

   
}
?>
