<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists ProductPrice Abstract
 *
 * This class represents individual ProductPrice within the PHPAssists framework.
 * It manages information related to ProductPrice.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractProductPrice extends ClassInvocationProcessor {
    
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

    // Constructor
    
    /**
     * Constructor for the AbstractProductPrice class.
     *
     * @param ?string $id Unique identifier for the product price.
     * @param ?string $transaction_id Transaction identifier related to the product price.
     * @param ?string $product_id Product identifier related to the product price.
     * @param ?float $product_cost Cost of the product.
     */
    public function __construct(?string $id, ?string $transaction_id, ?string $product_id, ?float $product_cost) {
        $this->setId($id);
        $this->setTransactionId($transaction_id);
        $this->setProductId($product_id);
        $this->setProductCost($product_cost);
    }
}
?>
