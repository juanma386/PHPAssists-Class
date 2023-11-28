<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class BankAccount extends ClassInvocationProcessor {
    private $id                   = null;
    private $bank                 = null;
    private $last_4_digits_cbu    = null;
    private $current_balance      = null;

    protected $table              = 'bank_accounts'; 
    protected $primaryKey         = 'account_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['bank', 'last_4_digits_cbu', 'current_balance'];
  
    public function __construct($id, $bank, $last_4_digits_cbu, $current_balance) {
        $this->setId($id);
        $this->setBank($bank);
        $this->setLast4DigitsCBU($last_4_digits_cbu);
        $this->setCurrentBalance($current_balance);
    }

    public function getId() : string | null {
        return $this->id;
    }

    public function getBank() : string | null {
        return $this->bank;
    }

    public function getLast4DigitsCBU() : string | null {
        return $this->last_4_digits_cbu;
    }

    public function getCurrentBalance() : float | null {
        return $this->current_balance;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setBank($bank) : void {
        $this->bank = isset($bank) && !empty($bank) ? $bank : null;
    }

    public function setLast4DigitsCBU($last_4_digits_cbu) : void {
        $this->last_4_digits_cbu = isset($last_4_digits_cbu) && !empty($last_4_digits_cbu) && is_numeric($last_4_digits_cbu) ? $last_4_digits_cbu : null;
    }

    public function setCurrentBalance($current_balance) : void {
        $this->current_balance = isset($current_balance) && !empty($current_balance) && is_numeric($current_balance) ? $current_balance : null;
    }

    public function validateLast4DigitsCBU() : bool {
        return isset($this->last_4_digits_cbu) && !empty($this->last_4_digits_cbu) && preg_match('/^\d{4}$/', $this->last_4_digits_cbu);
    }
    
}
?>
