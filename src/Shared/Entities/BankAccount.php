<?php
/**
 * PHPAssists BankAccount API
 *
 * This class represents the BankAccount entity and implements functionalities defined in the InterfaceBankAccount.
 * It manages bank account information within the PHPAssists framework.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssosts
 * @subpackage PHPAssists\Shared\Core\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Entities;

use PHPAssists\Shared\Entities\Abstracts\AbstractBankAccount;
use PHPAssists\Shared\Entities\Interfaces\InterfaceBankAccount;

/**
 * Class BankAccount
 *
 * This class extends AbstractBankAccount and implements InterfaceBankAccount to manage bank account-related information.
 */
class BankAccount extends AbstractBankAccount implements InterfaceBankAccount {
    private $id                   = null;
    private $bank                 = null;
    private $last_4_digits_cbu    = null;
    private $current_balance      = null;

    protected $table              = 'bank_accounts'; 
    protected $primaryKey         = 'account_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['bank', 'last_4_digits_cbu', 'current_balance'];
  
    /**
     * Retrieves the ID of the bank account.
     *
     * @return ?string The bank account ID or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Retrieves the bank associated with the account.
     *
     * @return ?string The bank name or null if not set.
     */
    public function getBank() : ?string {
        return $this->bank;
    }

    /**
     * Retrieves the last 4 digits of the Clave Bancaria Uniforme (CBU).
     *
     * @return ?string The last 4 digits of CBU or null if not set.
     */
    public function getLast4DigitsCBU() : ?string {
        return $this->last_4_digits_cbu;
    }

    /**
     * Retrieves the current balance in the account.
     *
     * @return ?float The current balance or null if not set.
     */
    public function getCurrentBalance() : ? float {
        return $this->current_balance;
    }
    
    /**
     * Sets the ID of the bank account.
     *
     * @param ?string $id The bank account ID.
     *
     * @return void
     */
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the bank associated with the account.
     *
     * @param ?string $bank The bank name.
     *
     * @return void
     */
    public function setBank(?string $bank) : void {
        $this->bank = isset($bank) && !empty($bank) ? $bank : null;
    }

    /**
     * Sets the last 4 digits of the Clave Bancaria Uniforme (CBU).
     *
     * @param ?int $last_4_digits_cbu The last 4 digits of CBU.
     *
     * @return void
     */
    public function setLast4DigitsCBU(?int $last_4_digits_cbu) : void {
        $this->last_4_digits_cbu = isset($last_4_digits_cbu) && !empty($last_4_digits_cbu) && is_numeric($last_4_digits_cbu) ? $last_4_digits_cbu : null;
    }

    /**
     * Sets the current balance in the account.
     *
     * @param ?float $current_balance The current balance.
     *
     * @return void
     */
    public function setCurrentBalance(?float $current_balance) : void {
        $this->current_balance = isset($current_balance) && !empty($current_balance) && is_numeric($current_balance) ? $current_balance : null;
    }

    /**
     * Validates the last 4 digits of the Clave Bancaria Uniforme (CBU).
     *
     * @return bool True if the last 4 digits are valid, false otherwise.
     */
    public function validateLast4DigitsCBU() : bool {
        return isset($this->last_4_digits_cbu) && !empty($this->last_4_digits_cbu) && preg_match('/^\d{4}$/', $this->last_4_digits_cbu);
    }
}
?>
