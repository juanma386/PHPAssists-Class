<?php
namespace PHPAssists\Shared\Entities\Interfaces; 

/**
 * PHPAssists CommerceTransaction Abstract
 *
 * This class represents individual CommerceTransaction abstract within the PHPAssists framework.
 * It manages information related to CommerceTransactions.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceCommerceTransaction {
    // Getters

    /**
     * Retrieves the unique identifier for the commerce transaction.
     *
     * @return ?string The commerce transaction identifier or null if not set.
     */
    public function getId(): ?string;

    /**
     * Retrieves the unique transaction identifier.
     *
     * @return ?string The transaction identifier or null if not set.
     */
    public function getTransactionId(): ?string;

    /**
     * Retrieves the name of the commerce establishment where the transaction occurred.
     *
     * @return ?string The commerce name or null if not set.
     */
    public function getCommerceName(): ?string;

    /**
     * Retrieves the specific location of the commerce establishment where the transaction occurred.
     *
     * @return ?string The commerce location or null if not set.
     */
    public function getCommerceLocation(): ?string;

    /**
     * Retrieves the total amount of the commerce transaction.
     *
     * @return ?float The transaction amount or null if not set.
     */
    public function getTotalAmount(): ?float;

    // Setters

    /**
     * Sets the unique identifier for the commerce transaction.
     *
     * @param ?string $id The commerce transaction identifier.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the unique transaction identifier.
     *
     * @param ?string $transaction_id The transaction identifier.
     *
     * @return void
     */
    public function setTransactionId(?string $transaction_id): void;

    /**
     * Sets the name of the commerce establishment where the transaction occurred.
     *
     * @param ?string $commerce_name The commerce name.
     *
     * @return void
     */
    public function setCommerceName(?string $commerce_name): void;

    /**
     * Sets the specific location of the commerce establishment where the transaction occurred.
     *
     * @param ?string $commerce_location The commerce location.
     *
     * @return void
     */
    public function setCommerceLocation(?string $commerce_location): void;

    /**
     * Sets the total amount of the commerce transaction.
     *
     * @param ?float $total_amount The transaction amount.
     *
     * @return void
     */
    public function setTotalAmount(?float $total_amount): void;
}