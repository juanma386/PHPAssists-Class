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
    private $id         = null;
    private $username   = null;
    private $email      = null;
    private $password   = null;

    protected $table              = 'users'; 
    protected $primaryKey         = 'user_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['username', 'email', 'password'];

   /**
    * Constructor for the User class.
    *
    * @param ?string $id The unique identifier for the User.
    * @param ?string $username.
    * @param ?string $email The identifier of the email account.
    * @param ?string $password The password of the user account.
    */
    public function __construct($id, $username, $email, $password) {
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
    protected function getHashPassword(?string $password) : ?string {
        return isset($password) && !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
    }
}