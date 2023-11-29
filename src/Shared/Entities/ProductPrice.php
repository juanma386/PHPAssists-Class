<?php
namespace PHPAssists\Shared\Entities; 

/**
 * PHPAssists Product Price Entity
 *
 * This class represents individual Product Price within the PHPAssists framework.
 * It manages information related to Product Price used by the system.
 *
* @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

 use PHPAssists\Shared\Abstracts\AbstractProductPrice;
 use PHPAssists\Shared\Interfaces\InterfaceProductPrice;
 

class ProductPrice extends AbstractProductPrice implements InterfaceProductPrice {
    

    public function getId() : ?string {
        return $this->id;
    }

    public function getTransactionId() : ?string {
        return $this->transaction_id;
    }

    public function getProductId() : ?string {
        return $this->product_id;
    }

    public function getProductCost() : ? float  {
        return $this->product_cost;
    }
    
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setTransactionId(?string $transaction_id) : void {
        $this->transaction_id = isset($transaction_id) && !empty($transaction_id) ? $transaction_id : null;
    }

    public function setProductId(?string $product_id) : void {
        $this->product_id = isset($product_id) && !empty($product_id) ? $product_id : null;
    }

    public function setProductCost(?float $product_cost) : void {
        $this->product_cost = isset($product_cost) && !empty($product_cost) ? $product_cost : null;
    }
}
?>
