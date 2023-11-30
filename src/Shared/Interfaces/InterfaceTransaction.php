<?php
namespace PHPAssists\Shared\Interfaces; 

/**
 * PHPAssists Transaction API Abstract
 *
 * This interface defines methods for individual Transaction API within the PHPAssists framework.
 * It outlines functionality related to Transaction API management.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceTransaction {
   /**
    * Retrieves the unique identifier for the transaction.
    *
    * @return ?string The transaction identifier or null if not set.
    */
    public function getId() : ?string;

   /**
    * Retrieves the account identifier associated with the transaction.
    *
    * @return ?string The account identifier or null if not set.
    */
    public function getAccountId() : ?string;

   /**
    * Retrieves the identifier of the account where the transaction originated.
    *
    * @return ?string The origin account identifier or null if not set.
    */
    public function getOriginId() : ?string;
    
   /**
    * Retrieves the identifier of the account where the transaction was destined.
    *
    * @return ?string The destination account identifier or null if not set.
    */
    public function getDestinationId() : ?string;

   /**
    * Retrieves the type of transaction.
    *
    * @return ?string The transaction type or null if not set.
    */
    public function getTransactionType() : ?string;

   /**
    * Retrieves the amount involved in the transaction.
    *
    * @return ?float The transaction amount or null if not set.
    */
    public function getAmount() : ? float;

   /**
    * Retrieves the date and time when the transaction was executed.
    *
    * @return ?string The transaction date and time or null if not set.
    */
    public function getTransactionDate() : ?string;

   /**
    * Retrieves the optional description for the transaction.
    *
    * @return ?string The transaction description or null if not set.
    */

    public function getDescription() : ?string;

   /**
    * Sets the unique identifier for the transaction.
    *
    * @param ?string $id The transaction identifier.
    *
    * @return void
    */
    
    public function setId(?string $id) : void;

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $account_id The account id of operation.
    *
    * @return void
    */
    public function setAccountId(?string $account_id) : void;

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $transaction_type The transaction type of operation.
    *
    * @return void
    */
    public function setTransactionType(?string $transaction_type) : void;

    /**
    * Sets the amount involved in the transaction.
    *
    * @param ?float $amount The transaction amount.
    *
    * @return void
    */

    public function setAmount(?float $amount) : void;


   /**
    * Sets the optional description for the transaction.
    *
    * @param ?string $description The transaction description.
    *
    * @return void
    */
    
    public function setTransactionDate(?string $transaction_date) : void;

   /**
    * Sets the optional description for the transaction.
    *
    * @param ?string $description The transaction description.
    *
    * @return void
    */

    public function setDescription(?string $description) : void;

   /**
    * Sets the identifier of the origin account.
    *
    * @param ?string $origin_id The origin account identifier.
    *
    * @return void
    */
    
    public function setOriginId(?string $origin_id) : void;

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $destination_id The destination account identifier.
    *
    * @return void
    */
    public function setDestinationId(?string $destination_id) : void;
}