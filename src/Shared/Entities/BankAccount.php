<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Abstracts\AbstractBankAccount;

class BankAccount extends AbstractBankAccount {
    private $id                   = null;
    private $bank                 = null;
    private $last_4_digits_cbu    = null;
    private $current_balance      = null;

    protected $table              = 'bank_accounts'; 
    protected $primaryKey         = 'account_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['bank', 'last_4_digits_cbu', 'current_balance'];
  
    public function getId() : ?string {
        return $this->id;
    }

    public function getBank() : ?string {
        return $this->bank;
    }

    public function getLast4DigitsCBU() : ?string {
        return $this->last_4_digits_cbu;
    }

    public function getCurrentBalance() : ? float {
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

}
?>
