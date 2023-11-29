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

// Necessary imports for the class
use PHPAssists\Shared\Abstracts\AbstractProductPrice;
use PHPAssists\Shared\Interfaces\InterfaceProductPrice;

// Definition of the ProductPrice class extending AbstractProductPrice and implementing InterfaceProductPrice
class ProductPrice extends AbstractProductPrice implements InterfaceProductPrice {
    // Methods to retrieve property values

    /**
     * Get the ID of the product price.
     *
     * @return ?string The product price ID or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Get the transaction ID related to the product price.
     *
     * @return ?string The transaction ID or null if not set.
     */
    public function getTransactionId() : ?string {
        return $this->transaction_id;
    }

    /**
     * Get the product ID related to the product price.
     *
     * @return ?string The product ID or null if not set.
     */
    public function getProductId() : ?string {
        return $this->product_id;
    }

    /**
     * Get the cost of the product.
     *
     * @return ?float The product cost or null if not set.
     */
    public function getProductCost() : ? float  {
        return $this->product_cost;
    }

    // Methods to set property values

    /**
     * Set the ID of the product price.
     *
     * @param ?string $id The product price ID.
     *
     * @return void
     */
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Set the transaction ID related to the product price.
     *
     * @param ?string $transaction_id The transaction ID.
     *
     * @return void
     */
    public function setTransactionId(?string $transaction_id) : void {
        $this->transaction_id = isset($transaction_id) && !empty($transaction_id) ? $transaction_id : null;
    }

    /**
     * Set the product ID related to the product price.
     *
     * @param ?string $product_id The product ID.
     *
     * @return void
     */
    public function setProductId(?string $product_id) : void {
        $this->product_id = isset($product_id) && !empty($product_id) ? $product_id : null;
    }

    /**
     * Set the cost of the product.
     *
     * @param ?float $product_cost The product cost.
     *
     * @return void
     */
    public function setProductCost(?float $product_cost) : void {
        $this->product_cost = isset($product_cost) && !empty($product_cost) ? $product_cost : null;
    }
}
?>
