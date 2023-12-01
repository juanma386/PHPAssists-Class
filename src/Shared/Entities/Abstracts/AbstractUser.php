<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

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

    
    /**
     * The unique identifier for the user.
     *
     * @var ?string|null $id
     */
    private ?string $id = null;

    /**
     * The username of the user.
     *
     * @var ?string|null $username
     */
    private ?string $username = null;

    /**
     * The email address of the user.
     *
     * @var ?string|null $email
     */
    private ?string $email = null;

    /**
     * The hashed password of the user.
     *
     * @var ?string|null $password
     */
    private ?string $password = null;

    
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

 
}