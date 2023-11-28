<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class Transaction extends ClassInvocationProcessor {
    private $id                    = null;
    private $transaction_type      = null;
    private $origin_id             = null;
    private $destination_id        = null;
    private $amount                = null;
    private $transaction_date      = null;
    private $description           = null;

    protected $table               = 'transactions'; 
    protected $primaryKey          = 'transaction_id';
    protected $useAutoIncrement    = false;
    protected $allowedFields       = ['transaction_type', 'origin_id', 'destination_id', 'amount', 'transaction_date', 'description'];
  
    public function __construct($id, $transaction_type, $origin_id, $destination_id, $amount, $transaction_date, $description = null) {
        $this->setId($id);
        $this->setTransactionType($transaction_type);
        $this->setOriginId($origin_id);
        $this->setDestinationId($destination_id);
        $this->setAmount($amount);
        $this->setTransactionDate($transaction_date);
        $this->setDescription($description);
    }

    public function getId() : string | null {
        return $this->id;
    }

    public function getAccountId() : string | null {
        return $this->account_id;
    }

    public function getTransactionType() : string | null {
        return $this->transaction_type;
    }

    public function getAmount() : float | null {
        return $this->amount;
    }

    public function getTransactionDate() : string | null {
        return $this->transaction_date;
    }

    public function getDescription() : string | null {
        return $this->description;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) ? $id : null;
    }

    public function setAccountId($account_id) : void {
        $this->account_id = $account_id;
    }

    public function setTransactionType($transaction_type) : void {
        $this->transaction_type = $transaction_type;
    }

    public function setAmount($amount) : void {
        $this->amount = $amount;
    }

    public function setTransactionDate($transaction_date) : void {
        $this->transaction_date = $transaction_date;
    }

    public function setDescription($description) : void {
        $this->description = $description;
    }
    
    public function setOriginId($origin_id) : void {
        $this->origin_id = $origin_id;
    }
    public function setDestinationId($destination_id) : void {
        $this->destination_id = $destination_id;
    }
}
?>
