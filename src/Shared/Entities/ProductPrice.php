<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class ProductPrice extends ClassInvocationProcessor {
    private $id = null;
    private $transaction_id = null;
    private $product_id = null;
    private $product_cost = null;

    protected $table              = 'product_prices'; 
    protected $primaryKey         = 'product_price_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['transaction_id', 'product_id', 'product_cost'];
  
    public function __construct($id, $transaction_id, $product_id, $product_cost) {
        $this->setId($id);
        $this->setTransactionId($transaction_id);
        $this->setProductId($product_id);
        $this->setProductCost($product_cost);
    }

    public function getId() : string | null {
        return $this->id;
    }

    public function getTransactionId() : string | null {
        return $this->transaction_id;
    }

    public function getProductId() : string | null {
        return $this->product_id;
    }

    public function getProductCost() : float | null {
        return $this->product_cost;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) ? $id : null;
    }

    public function setTransactionId($transaction_id) : void {
        $this->transaction_id = $transaction_id;
    }

    public function setProductId($product_id) : void {
        $this->product_id = $product_id;
    }

    public function setProductCost($product_cost) : void {
        $this->product_cost = $product_cost;
    }
}
?>
