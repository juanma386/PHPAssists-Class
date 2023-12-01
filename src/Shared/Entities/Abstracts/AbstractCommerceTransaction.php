<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists CommerceTransaction Abstract
 *
 * This class represents individual CommerceTransaction within the PHPAssists framework.
 * It manages information related to CommerceTransactions.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractCommerceTransaction extends ClassInvocationProcessor {
    
    /**
     * Constructor for the CommerceTransaction class.
     *
     * @param ?string $id The unique identifier for the commerce transaction.
     * @param ?string $transaction_id The unique transaction identifier.
     * @param ?string $commerce_name The name of the commerce.
     * @param ?string $commerce_location The location of the commerce.
     * @param ?float $total_amount The total amount of the transaction.
     */
    public function __construct($id, $transaction_id, $commerce_name, $commerce_location, $total_amount) {
        $this->setId($id);
        $this->setTransactionId($transaction_id);
        $this->setCommerceName($commerce_name);
        $this->setCommerceLocation($commerce_location);
        $this->setTotalAmount($total_amount);
    }
}