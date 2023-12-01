<?php 
namespace PHPAssists\Shared\Entities;
/**
 * PHPAssists Transaction API Test
 *
 * This class defines the possible Functions for the PHPAssists Transaction API Test.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */


 // Necessary imports for the class
 use PHPAssists\Shared\Entities\Abstracts\AbstractTransaction;
 use PHPAssists\Shared\Entities\Interfaces\InterfaceTransaction;

class Transaction extends AbstractTransaction implements InterfaceTransaction {
    /**
     * Unique identifier for the transaction.
     *
     * @var ?string
     */
    private $id;

    /**
     * Type of transaction, such as payment, transfer, or withdrawal.
     *
     * @var ?string
     */
    private $transaction_type;

    /**
     * Identifier of the account where the transaction originated.
     *
     * @var ?string
     */
    private $origin_id;

    /**
     * Identifier of the account where the transaction was destined.
     *
     * @var ?string
     */
    private $destination_id;

    /**
     * Amount involved in the transaction.
     *
     * @var ?float
     */
    private $amount;

    /**
     * Date and time when the transaction was executed.
     *
     * @var ?string
     */
    private $transaction_date;

    /**
     * Optional description for the transaction.
     *
     * @var ?string
     */
    private $description;


   /**
    * Retrieves the unique identifier for the transaction.
    *
    * @return ?string The transaction identifier or null if not set.
    */
    public function getId() : ?string {
        return $this->id;
    }

   /**
    * Retrieves the account identifier associated with the transaction.
    *
    * @return ?string The account identifier or null if not set.
    */
    public function getAccountId() : ?string {
        return $this->account_id;
    }

   /**
    * Retrieves the identifier of the account where the transaction originated.
    *
    * @return ?string The origin account identifier or null if not set.
    */
    public function getOriginId() : ?string {
        return $this->origin_id;
    }
    
   /**
    * Retrieves the identifier of the account where the transaction was destined.
    *
    * @return ?string The destination account identifier or null if not set.
    */
    public function getDestinationId() : ?string {
        return $this->destination_id;
    }

   /**
    * Retrieves the type of transaction.
    *
    * @return ?string The transaction type or null if not set.
    */
    public function getTransactionType() : ?string {
        return $this->transaction_type;
    }

   /**
    * Retrieves the amount involved in the transaction.
    *
    * @return ?float The transaction amount or null if not set.
    */
    public function getAmount() : ? float {
        return $this->amount;
    }

   /**
    * Retrieves the date and Transaction when the transaction was executed.
    *
    * @return ?string The transaction date and Transaction or null if not set.
    */
    public function getTransactionDate() : ?string {
        return $this->transaction_date;
    }

   /**
    * Retrieves the optional description for the transaction.
    *
    * @return ?string The transaction description or null if not set.
    */

    public function getDescription() : ?string {
        return $this->description;
    }

   /**
    * Sets the unique identifier for the transaction.
    *
    * @param ?string $id The transaction identifier.
    *
    * @return void
    */
    
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $account_id The account id of operation.
    *
    * @return void
    */
    public function setAccountId(?string $account_id) : void {
        $this->account_id = isset($account_id) && !empty($account_id) ? $account_id : null;
    }

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $transaction_type The transaction type of operation.
    *
    * @return void
    */
    public function setTransactionType(?string $transaction_type) : void {
        $this->transaction_type = isset($transaction_type) && !empty($transaction_type) ? $transaction_type : null;
    }

    /**
    * Sets the amount involved in the transaction.
    *
    * @param ?float $amount The transaction amount.
    *
    * @return void
    */

    public function setAmount(?float $amount) : void {
        $this->amount = isset($amount) && !empty($amount) ? $amount : null;
    }


   /**
    * Sets the optional description for the transaction.
    *
    * @param ?string $description The transaction description.
    *
    * @return void
    */
    
    public function setTransactionDate(?string $transaction_date) : void {
        $this->transaction_date = isset($transaction_date) && !empty($transaction_date) ? $transaction_date : null;
    }

   /**
    * Sets the optional description for the transaction.
    *
    * @param ?string $description The transaction description.
    *
    * @return void
    */

    public function setDescription(?string $description) : void {
        $this->description = isset($description) && !empty($description) ? $description : null;
    }

   /**
    * Sets the identifier of the origin account.
    *
    * @param ?string $origin_id The origin account identifier.
    *
    * @return void
    */
    
    public function setOriginId(?string $origin_id) : void {
        $this->origin_id = isset($origin_id) && !empty($origin_id) ? $origin_id : null;
    }

   /**
    * Sets the identifier of the destination account.
    *
    * @param ?string $destination_id The destination account identifier.
    *
    * @return void
    */
    public function setDestinationId(?string $destination_id) : void {
        $this->destination_id = isset($destination_id) && !empty($destination_id) ? $destination_id : null;
    }
}
?>
