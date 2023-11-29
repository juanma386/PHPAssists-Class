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

    public function getId() : ?string {
        return $this->id;
    }

    public function getAccountId() : ?string {
        return $this->account_id;
    }

    public function getOriginId() : ?string {
        return $this->origin_id;
    }

    public function getDestinationId() : ?string {
        return $this->destination_id;
    }

    public function getTransactionType() : ?string {
        return $this->transaction_type;
    }

    public function getAmount() : ? float {
        return $this->amount;
    }

    public function getTransactionDate() : ?string {
        return $this->transaction_date;
    }

    public function getDescription() : ?string {
        return $this->description;
    }
    
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setAccountId(?string $account_id) : void {
        $this->account_id = isset($account_id) && !empty($account_id) ? $account_id : null;
    }

    public function setTransactionType(?string $transaction_type) : void {
        $this->transaction_type = isset($transaction_type) && !empty($transaction_type) ? $transaction_type : null;
    }

    public function setAmount(?float $amount) : void {
        $this->amount = isset($amount) && !empty($amount) ? $amount : null;
    }

    public function setTransactionDate($transaction_date) : void {
        $this->transaction_date = isset($transaction_date) && !empty($transaction_date) ? $transaction_date : null;
    }

    public function setDescription(?string $description) : void {
        $this->description = isset($description) && !empty($description) ? $description : null;
    }
    
    public function setOriginId(?string $origin_id) : void {
        $this->origin_id = isset($origin_id) && !empty($origin_id) ? $origin_id : null;
    }
    public function setDestinationId(?string $destination_id) : void {
        $this->destination_id = isset($destination_id) && !empty($destination_id) ? $destination_id : null;
    }
}
?>
