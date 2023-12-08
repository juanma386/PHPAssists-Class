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
 * @since      0.0.4
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractUser extends ClassInvocationProcessor {
    
    protected ?string $table            = 'users'; 
    protected ?string $primaryKey       = 'user_id';
    protected ?bool $useAutoIncrement   = false;
    protected ?array $allowedFields     = ['username', 'email', 'password'];

    /**
     * Constructor for the UserEntity class.
     *
     * @param ?string $id The unique identifier for the User.
     * @param ?string $role_id The unique identifier for the Role User.
     * @param ?string $username The username of the User.
     * @param ?string $email The email address of the User.
     * @param ?string $password The password of the User account.
     * @param ?object $metadata Optional. Additional metadata for the User.
     * @param ?string $firstName Optional. The first name of the User.
     * @param ?string $lastName Optional. The last name of the User.
     * @param ?string $address Optional. The address of the User.
     * @param ?string $website Optional. The website of the User.
     * @param ?array  $social Optional. Social details of the User.
     * @param ?string $phone Optional. The phone number of the User.
     * @param ?string $whatsapp Optional. The WhatsApp number of the User.
     * @param ?string $createdAt Optional. The creation date of the User.
     * @param ?string $status Optional. The status of the User.
     */
    public function __construct(
        ?string $id,
        ?string $role_id,
        ?string $username,
        ?string $email,
        ?string $password,
        ?object $metadata = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $Address = null,
        ?string $Website = null,
        ?array $Social = null,
        ?string $Phone = null,
        ?string $Whatsapp = null,
        ?string $CreatedAt = null,
        ?string $Status = null
        ) {
            $this->setId($id);
            $this->setRole($role_id);
            $this->setUsername($username);
            $this->setEmail($email);
            $this->setPassword($password);
            $this->setMetadata($metadata);
            $this->setFirstName($firstName);
            $this->setLastName($lastName); 
            $this->setAddress($Address); 
            $this->setWebsite($Website); 
            $this->setSocial($Social); 
            $this->setPhone($Phone); 
            $this->setWhatsapp($Whatsapp);
            $this->setCreatedAt($CreatedAt);
            $this->setStatus($Status); 
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