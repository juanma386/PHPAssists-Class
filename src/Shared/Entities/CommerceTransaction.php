<?php
namespace PHPAssists\Shared\Entities;

use PHPAssists\Shared\Abstracts\AbstractCommerceTransaction;
use PHPAssists\Shared\Interfaces\InterfaceCommerceTransaction;

/**
 * PHPAssists Commerce Transaction Entity
 *
 * This class represents individual commerce transactions within the PHPAssists framework.
 * It manages information related to financial transactions made at commerce locations.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssosts
 * @subpackage PHPAssosts\Shared\Core\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class CommerceTransaction extends AbstractCommerceTransaction implements InterfaceCommerceTransaction {
    // Getters

    /**
     * Retrieves the unique identifier for the commerce transaction.
     *
     * @return ?string The commerce transaction identifier or null if not set.
     */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Retrieves the unique transaction identifier.
     *
     * @return ?string The transaction identifier or null if not set.
     */
    public function getTransactionId(): ?string {
        return $this->transaction_id;
    }

    /**
     * Retrieves the name of the commerce establishment where the transaction occurred.
     *
     * @return ?string The commerce name or null if not set.
     */
    public function getCommerceName(): ?string {
        return $this->commerce_name;
    }

    /**
     * Retrieves the specific location of the commerce establishment where the transaction occurred.
     *
     * @return ?string The commerce location or null if not set.
     */
    public function getCommerceLocation(): ?string {
        return $this->commerce_location;
    }

    /**
     * Retrieves the total amount of the commerce transaction.
     *
     * @return ?float The transaction amount or null if not set.
     */
    public function getTotalAmount(): ?float {
        return $this->total_amount;
    }

    // Setters

    /**
     * Sets the unique identifier for the commerce transaction.
     *
     * @param ?string $id The commerce transaction identifier.
     *
     * @return void
     */
    public function setId($id): void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the unique transaction identifier.
     *
     * @param ?string $transaction_id The transaction identifier.
     *
     * @return void
     */
    public function setTransactionId($transaction_id): void {
        $this->transaction_id = isset($transaction_id) && !empty($transaction_id) ? $transaction_id : null;
    }

    /**
     * Sets the name of the commerce establishment where the transaction occurred.
     *
     * @param ?string $commerce_name The commerce name.
     *
     * @return void
     */
    public function setCommerceName($commerce_name): void {
        $this->commerce_name = isset($commerce_name) && !empty($commerce_name) ? $commerce_name : null;
    }

    /**
     * Sets the specific location of the commerce establishment where the transaction occurred.
     *
     * @param ?string $commerce_location The commerce location.
     *
     * @return void
     */
    public function setCommerceLocation($commerce_location): void {
        $this->commerce_location = isset($commerce_location) && !empty($commerce_location) ? $commerce_location : null;
    }

    /**
     * Sets the total amount of the commerce transaction.
     *
     * @param ?float $total_amount The transaction amount.
     *
     * @return void
     */
    public function setTotalAmount($total_amount): void {
        $this->total_amount = isset($total_amount) && !empty($total_amount) ? $total_amount : null;
    }
}
?>
