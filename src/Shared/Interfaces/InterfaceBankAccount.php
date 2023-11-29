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
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Interfaces; 

interface InterfaceBankAccount {
    public function getId() : ?string;

    public function getBank() : ?string;

    public function getLast4DigitsCBU() : ?string;

    public function getCurrentBalance() : ?float;
    
    public function setId(?string $id) : void;

    public function setBank(?string $bank) : void;

    public function setLast4DigitsCBU(?int $last_4_digits_cbu) : void;

    public function setCurrentBalance(?float $current_balance) : void;

    public function validateLast4DigitsCBU() : bool;
}