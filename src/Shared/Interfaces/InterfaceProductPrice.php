<?php
namespace PHPAssists\Shared\Interfaces; 

/**
 * PHPAssists ProductPrice Abstract
 *
 * This interface defines methods for individual ProductPrice within the PHPAssists framework.
 * It outlines functionality related to ProductPrice management.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceProductPrice {
    
    // Getters
    
    /**
     * Retrieves the unique identifier for the product price.
     *
     * @return ?string The product price identifier or null if not set.
     */
    public function getId() : ?string;

    /**
     * Retrieves the transaction identifier related to the product price.
     *
     * @return ?string The transaction identifier or null if not set.
     */
    public function getTransactionId() : ?string;

    /**
     * Retrieves the product identifier related to the product price.
     *
     * @return ?string The product identifier or null if not set.
     */
    public function getProductId() : ?string;

    /**
     * Retrieves the cost of the product.
     *
     * @return ?float The product cost or null if not set.
     */
    public function getProductCost() : ?float;
    
    // Setters

    /**
     * Sets the unique identifier for the product price.
     *
     * @param ?string $id The product price identifier.
     *
     * @return void
     */
    public function setId($id) : void;

    /**
     * Sets the transaction identifier related to the product price.
     *
     * @param ?string $transaction_id The transaction identifier.
     *
     * @return void
     */
    public function setTransactionId(?string $transaction_id) : void;

    /**
     * Sets the product identifier related to the product price.
     *
     * @param ?string $product_id The product identifier.
     *
     * @return void
     */
    public function setProductId(?string $product_id) : void;

    /**
     * Sets the cost of the product.
     *
     * @param ?float $product_cost The product cost.
     *
     * @return void
     */
    public function setProductCost(?float $product_cost) : void;
}
?>
