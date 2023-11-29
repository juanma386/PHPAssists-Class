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
namespace PHPAssists\Shared\Abstracts;

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * Abstract class AbstractBankAccount
 *
 * This abstract class defines essential properties and methods for handling bank accounts within the PHPAssists framework.
 */
abstract class AbstractBankAccount extends ClassInvocationProcessor {
    // Properties representing bank account information
    private $id = null;
    private $bank = null;
    private $last_4_digits_cbu = null;
    private $current_balance = null;

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

    /**
     * Retrieves the ID of the bank account.
     *
     * @return ?string The bank account ID or null if not set.
     */
    abstract public function getId(): ?string;

    /**
     * Retrieves the bank associated with the account.
     *
     * @return ?string The bank name or null if not set.
     */
    abstract public function getBank(): ?string;

    /**
     * Retrieves the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @return ?string The last 4 digits of CBU or null if not set.
     */
    abstract public function getLast4DigitsCBU(): ?string;

    /**
     * Retrieves the current balance in the account.
     *
     * @return ?float The current balance or null if not set.
     */
    abstract public function getCurrentBalance(): ?float;

    /**
     * Sets the ID of the bank account.
     *
     * @param ?string $id The bank account ID.
     *
     * @return void
     */
    abstract public function setId(?string $id): void;

    /**
     * Sets the bank associated with the account.
     *
     * @param ?string $bank The bank name.
     *
     * @return void
     */
    abstract public function setBank(?string $bank): void;

    /**
     * Sets the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @param ?int $last_4_digits_cbu The last 4 digits of CBU.
     *
     * @return void
     */
    abstract public function setLast4DigitsCBU(?int $last_4_digits_cbu): void;

    /**
     * Sets the current balance in the account.
     *
     * @param ?float $current_balance The current balance.
     *
     * @return void
     */
    abstract public function setCurrentBalance(?float $current_balance): void;

    /**
     * Validates the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @return bool True if the last 4 digits are valid, false otherwise.
     */
    abstract public function validateLast4DigitsCBU(): bool;
}
?>
