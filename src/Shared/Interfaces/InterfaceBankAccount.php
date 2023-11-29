<?php

/**
 * PHPAssists Interfaces
 *
 * This class defines the possible Functions for the PHPAssists BankAccount API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssosts
 * @subpackage PHPAssists\Shared\Core\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Interfaces;

/**
 * Interface InterfaceBankAccount
 *
 * This interface defines the required methods for managing bank accounts within the PHPAssists framework.
 */
interface InterfaceBankAccount {
    /**
     * Retrieves the ID of the bank account.
     *
     * @return ?string The bank account ID or null if not set.
     */
    public function getId(): ?string;

    /**
     * Retrieves the bank associated with the account.
     *
     * @return ?string The bank name or null if not set.
     */
    public function getBank(): ?string;

    /**
     * Retrieves the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @return ?string The last 4 digits of CBU or null if not set.
     */
    public function getLast4DigitsCBU(): ?string;

    /**
     * Retrieves the current balance in the account.
     *
     * @return ?float The current balance or null if not set.
     */
    public function getCurrentBalance(): ?float;

    /**
     * Sets the ID of the bank account.
     *
     * @param ?string $id The bank account ID.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the bank associated with the account.
     *
     * @param ?string $bank The bank name.
     *
     * @return void
     */
    public function setBank(?string $bank): void;

    /**
     * Sets the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @param ?int $last_4_digits_cbu The last 4 digits of CBU.
     *
     * @return void
     */
    public function setLast4DigitsCBU(?int $last_4_digits_cbu): void;

    /**
     * Sets the current balance in the account.
     *
     * @param ?float $current_balance The current balance.
     *
     * @return void
     */
    public function setCurrentBalance(?float $current_balance): void;

    /**
     * Validates the last 4 digits of CBU (Clave Bancaria Uniforme).
     *
     * @return bool True if the last 4 digits are valid, false otherwise.
     */
    public function validateLast4DigitsCBU(): bool;
}
