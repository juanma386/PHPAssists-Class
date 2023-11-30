<?php
namespace PHPAssists\Shared\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists User API Abstract
 *
 * This class represents individual User API within the PHPAssists framework.
 * It manages information related to User API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractUser extends ClassInvocationProcessor {
    private ?string $id                 = null;
    private ?string $username           = null;
    private ?string $email              = null;
    private ?string $password           = null;

    protected ?string $table            = 'users'; 
    protected ?string $primaryKey       = 'user_id';
    protected ?bool $useAutoIncrement   = false;
    protected ?array $allowedFields     = ['username', 'email', 'password'];

   /**
    * Constructor for the User class.
    *
    * @param ?string $id The unique identifier for the User.
    * @param ?string $username.
    * @param ?string $email The identifier of the email account.
    * @param ?string $password The password of the user account.
    */
    public function __construct(?string $id,?string $username,?string $email,?string $password) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    /**
     * Hash the provided password using the PASSWORD_DEFAULT algorithm.
     *
     * @param string|null $password The password to be hashed.
     *
     * @return string|null The hashed password or null if the provided password is empty or not set.
     */
    public function getHashPassword(?string $password) : ?string {
        return isset($password) && !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
    }

       
    public function validateUsername() : bool {
        return isset($this->username) && !empty($this->username) && mb_strlen($this->username) >= 3 && mb_strlen($this->username) <= 50;
    }

    public function validateEmail() : bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword(?string $enteredPassword) : bool {
        return isset($enteredPassword) && !empty($enteredPassword) ? password_verify($enteredPassword, $this->password) : false;
    }
}