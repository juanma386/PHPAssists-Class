<?php
/**
 * PHPAssists BankAccount API
 *
 * This class defines the possible Abstractions for the PHPAssists BankAccount API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssosts
 * @subpackage PHPAssists\Shared\Core\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssists\Shared\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

abstract class AbstractBankAccount extends ClassInvocationProcessor {
    private $id                   = null;
    private $bank                 = null;
    private $last_4_digits_cbu    = null;
    private $current_balance      = null;

    protected $table                = 'bank_accounts'; 
    protected $primaryKey           = 'account_id';
    protected $useAutoIncrement     = false;
    protected $allowedFields        = ['bank', 'last_4_digits_cbu', 'current_balance'];
  
    public function __construct($id, $bank, $last_4_digits_cbu, $current_balance) {
        $this->setId($id);
        $this->setBank($bank);
        $this->setLast4DigitsCBU($last_4_digits_cbu);
        $this->setCurrentBalance($current_balance);
    }

    abstract public function getId() : ?string;

    abstract public function getBank() : ?string;

    abstract public function getLast4DigitsCBU() : ?string;

    abstract public function getCurrentBalance() : ?float;
    
    abstract public function setId(?string $id) : void;

    abstract public function setBank(?string $bank) : void;

    abstract public function setLast4DigitsCBU(?int $last_4_digits_cbu) : void;

    abstract public function setCurrentBalance(?float $current_balance) : void;

    abstract public function validateLast4DigitsCBU() : bool;
}
?>
