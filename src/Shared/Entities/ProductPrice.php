<?php
namespace PHPAssists\Shared\Entities; 

/**
 * PHPAssists Product Price Entity
 *
 * This class represents individual Product Price within the PHPAssists framework.
 * It manages information related to Product Price used by the system.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

// Necessary imports for the class
use PHPAssists\Shared\Entities\Abstracts\AbstractProductPrice;
use PHPAssists\Shared\Entities\Interfaces\InterfaceProductPrice;

// Definition of the ProductPrice class extending AbstractProductPrice and implementing InterfaceProductPrice
class ProductPrice extends AbstractProductPrice implements InterfaceProductPrice {
    // Properties
    
    /**
     * Unique identifier for the product price.
     *
     * @var ?string
     */
    private ?string $id = null;
    
    /**
     * Transaction identifier related to the product price.
     *
     * @var ?string
     */
    private ?string $transaction_id = null;
    
    /**
     * Product identifier related to the product price.
     *
     * @var ?string
     */
    private ?string $product_id = null;
    
    /**
     * Cost of the product.
     *
     * @var ?float
     */
    private ?float $product_cost = null;

    // Database Configuration
    
    /**
     * Name of the table storing product prices.
     *
     * @var ?string
     */
    protected ?string $table = 'product_prices'; 
    
    /**
     * Primary key field for the product price table.
     *
     * @var ?string
     */
    protected ?string $primaryKey = 'product_price_id';
    
    /**
     * Indicates whether auto-increment is used for the primary key.
     *
     * @var ?bool
     */
    protected ?bool $useAutoIncrement = false;
    
    /**
     * Fields allowed to be manipulated.
     *
     * @var ?array
     */
    protected ?array $allowedFields = ['transaction_id', 'product_id', 'product_cost'];


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
