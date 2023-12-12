<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists Transaction API Abstract
 *
 * This class represents individual Transaction API within the PHPAssists framework.
 * It manages information related to Transaction API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
class AbstractTransaction extends ClassInvocationProcessor {


    protected $table               = 'transactions'; 
    protected $primaryKey          = 'transaction_id';
    protected $useAutoIncrement    = false;
    protected $allowedFields       = ['transaction_type', 'origin_id', 'destination_id', 'amount', 'transaction_date', 'description'];
  
    /**
     * Constructor for the Transaction class.
     *
     * @param ?string $id The unique identifier for the transaction.
     * @param ?string $transaction_type The type of transaction.
     * @param ?string $origin_id The identifier of the origin account.
     * @param ?string $destination_id The identifier of the destination account.
     * @param ?float $amount The transaction amount.
     * @param ?string $transaction_date The transaction date.
     * @param ?string $description The transaction description.
     */
    public function __construct(?string $id,?string  $transaction_type,?string  $origin_id,?string  $destination_id,?float  $amount,?string  $transaction_date,?string $description) {
        $this->setId($id);
        $this->setTransactionType($transaction_type);
        $this->setOriginId($origin_id);
        $this->setDestinationId($destination_id);
        $this->setAmount($amount);
        $this->setTransactionDate($transaction_date);
        $this->setDescription($description);
    }

       
    /**
     * Validate the username.
     *
     * @return bool Returns true if the username is valid; otherwise, false.
     */
    public function validateUsername() : bool {
        return isset($this->username) && !empty($this->username) && mb_strlen($this->username) >= 3 && mb_strlen($this->username) <= 50;
    }

    /**
     * Validate the email.
     *
     * @return bool Returns true if the email is valid; otherwise, false.
     */
    public function validateEmail() : bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate the entered password against the stored hashed password.
     *
     * @param string|null $enteredPassword The password entered by the user (plaintext).
     *
     * @return bool Returns true if the entered password matches the stored hashed password; otherwise, false.
     */
    public function validatePassword($enteredPassword) : bool {
        return isset($enteredPassword) && !empty($enteredPassword) ? password_verify($enteredPassword, $this->password) : false;
    }

}