<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class CommerceTransaction extends ClassInvocationProcessor {
    private $id = null;
    private $transaction_id = null;
    private $commerce_name = null;
    private $commerce_location = null;
    private $total_amount = null;

    protected $table              = 'commerce_transactions'; 
    protected $primaryKey         = 'commerce_transaction_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['transaction_id', 'commerce_name', 'commerce_location', 'total_amount'];
  
    public function __construct($id, $transaction_id, $commerce_name, $commerce_location, $total_amount) {
        $this->setId($id);
        $this->setTransactionId($transaction_id);
        $this->setCommerceName($commerce_name);
        $this->setCommerceLocation($commerce_location);
        $this->setTotalAmount($total_amount);
    }

    public function getId() : string | null {
        return $this->id;
    }

    public function getTransactionId() : string | null {
        return $this->transaction_id;
    }

    public function getCommerceName() : string | null {
        return $this->commerce_name;
    }

    public function getCommerceLocation() : string | null {
        return $this->commerce_location;
    }

    public function getTotalAmount() : float | null {
        return $this->total_amount;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) !empty($id) ? $id : null;
    }

    public function setTransactionId($transaction_id) : void {
        $this->transaction_id = isset($transaction_id) !empty($transaction_id) ? $transaction_id : null;
    }

    public function setCommerceName($commerce_name) : void {
        $this->commerce_name = isset($commerce_name) !empty($commerce_name) ? $commerce_name : null;
    }

    public function setCommerceLocation($commerce_location) : void {
        $this->commerce_location = isset($commerce_location) !empty($commerce_location) ? $commerce_location : null;
    }

    public function setTotalAmount($total_amount) : void {
        $this->total_amount = isset($total_amount) !empty($total_amount) ? $total_amount : null;
    }
}
?>
