<?php
namespace PHPAssists\Shared\Entities; 
/**
 * PHPAssists User API Test
 *
 * This class defines the possible Functions for the PHPAssists User API Test.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.4
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */


 // Necessary imports for the class
 use PHPAssists\Shared\Entities\Abstracts\AbstractUser;
 use PHPAssists\Shared\Entities\Interfaces\InterfaceUser;

class User extends AbstractUser implements InterfaceUser {

    /**
     * The unique identifier for the user.
     *
     * @var ?string $id
     */
    private ?string $id = null;

    /**
     * The unique identifier for the role.
     *
     * @var ?string $role_id
     */
    private ?string $role_id = null;
    

    /**
     * The username of the user.
     *
     * @var ?string $username
     */
    private ?string $username = null;

    /**
     * The email address of the user.
     *
     * @var ?string $email
     */
    private ?string $email = null;

    /**
     * The hashed password of the user.
     *
     * @var ?string $password
     */
    private ?string $password = null;

    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
    private ?object $metadata = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $firstName = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $lastName = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $address = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $website = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?object $social
     */
     private ?object $social = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $phone = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
     private ?string $whatsapp = null;
 
    /**
     * The unique identifier for the user.
     *
     * @var ?int $status
     */
    private ?int $createdAt = null;

    /**
     * The unique identifier for the user.
     *
     * @var ?string $status
     */
    private ?string $status = null;

    // Getters

    /**
     * Get the ID of the user.
     *
     * @return string|null The user's ID or null if not set.
     */
    public function getId()  : ?string {
        return $this->id;
    }

    /**
     * Get the username of the user.
     *
     * @return string|null The user's username or null if not set.
     */
    public function getUsername()  : ?string {
        return $this->username;
    }

    /**
     * Get the email of the user.
     *
     * @return string|null The user's email or null if not set.
     */
    public function getEmail()  : ?string {
        return $this->email;
    }

    /**
     * Get the hashed password of the user.
     *
     * @return string|null The user's hashed password or null if not set.
     *                    If the provided password is empty or not set, it returns null.
     */
    public function getPassword()  : ?string {
        return $this->password;
    }

    /**
     * Get the metadata for the user.
     *
     * @return mixed The user's metadata.
     */
    public function getMetadata() : ?object {
        return $this->metadata;
    }

    /**
     * Get the first name of the user.
     *
     * @return mixed The user's first name.
     */
    public function getFirstName()  : ?string {
        return $this->firstName;
    }

    /**
     * Get the last name of the user.
     *
     * @return mixed The user's last name.
     */
    public function getLastName()  : ?string {
        return $this->lastName;
    }

    /**
     * Get the address of the user.
     *
     * @return mixed The user's address.
     */
    public function getAddress()  : ?string {
        return $this->address;
    }

    /**
     * Get the website of the user.
     *
     * @return mixed The user's website.
     */
    public function getWebsite()  : ?string {
        return $this->website;
    }

    /**
     * Get the social details of the user.
     *
     * @return ?object The user's social details.
     */
    public function getSocial()  : ?object {
        return $this->social;
    }

    /**
     * Get the phone number of the user.
     *
     * @return mixed The user's phone number.
     */
    public function getPhone()  : ?string {
        return $this->phone;
    }

    /**
     * Get the WhatsApp number of the user.
     *
     * @return mixed The user's WhatsApp number.
     */
    public function getWhatsapp()  : ?string {
        return $this->whatsapp;
    }

    /**
     * Get the creation date of the user.
     *
     * @return mixed The user's creation date.
     */
    public function getCreatedAt()  : ?string {
        return $this->createdAt;
    }

     /**
     * Get the role of the user.
     *
     * @return mixed The user's role_id.
     */
    public function getRole()  : ?string {
        return $this->role_id;
    }

    /**
     * Get the status of the user.
     *
     * @return mixed The user's status.
     */
    public function getStatus()  : ?string {
        return $this->status;
    }

    /**
     * Get the Insert Data of the user.
     *
     * @return ?array The user's Data.
     */
    public function getInsertData( ?string $user_id_name ) : ? array {
        return isset($user_id_name) && !empty($user_id_name) && is_string($user_id_name) ? [
            $user_id_name => $this->getId(),
            "role_id"      => $this->getRole(),
            "metadata" => json_encode(
                $this->getMetadata()
            ),
            "FirstName" => $this->getFirstName(),
            "LastName" => $this->getLastName(),
            "Address" => $this->getAddress(),
            "WebSite" => $this->getWebsite(),
            "Social" => json_encode(
                $this->getSocial()
            ),
            "Phone" => $this->getPhone(),
            "Whatsapp" => $this->getWhatsapp(),
            "UserEmail" => $this->getEmail(),
            "created_at" => $this->getCreatedAt(),
            "status" => $this->getStatus(),
        ] : [];
    }

    // Setters

    /**
     * Set the ID of the user.
     *
     * @param ?string $id The ID to set for the user.
     *
     * @return void
     */
    public function setId(?string $id) : void {
        $this->id = isset($id) ? $id : null;
    }

    /**
     * Set the username of the user.
     *
     * @param ?string $username The username to set for the user.
     *                              If the username doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setUsername(?string $username) : void {
        $this->username = $username;
        !$this->validateUsername() ? [ $this->username = null ] : false;
    }

    /**
     * Set the email of the user.
     *
     * @param ?string $email The email to set for the user.
     *                           If the email doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setEmail(?string $email) : void {
        $this->email = $email;
        !$this->validateEmail() ? [ $this->email = null ] : false;
    }

    /**
     * Set the hashed password of the user.
     *
     * @param ?string $password The password to set for the user (plaintext).
     *                              It gets hashed before being set.
     *
     * @return void
     */
    public function setPassword(?string $password) : void {
        $hashedPassword = $this->getHashPassword($password);
        $this->password = $hashedPassword;
    }

    /**
     * Set the metadata for the user.
     *
     * @param mixed $metadata The metadata to set for the user.
     */
    public function setMetadata(?object $metadata) : void {
        $this->metadata = $metadata;
    }

    /**
     * Set the first name of the user.
     *
     * @param ?string $firstName The first name to set for the user.
     */
    public function setFirstName(?string $firstName) : void {
        $this->firstName = $firstName;
    }

    /**
     * Set the last name of the user.
     *
     * @param ?string $lastName The last name to set for the user.
     */
    public function setLastName(?string $lastName) : void {
        $this->lastName = $lastName;
    }

    /**
     * Set the address for the user.
     *
     * @param ?string $address The address to set for the user.
     */
    public function setAddress(?string $address) : void {
        $this->address = $address;
    }

    /**
     * Set the website for the user.
     *
     * @param ?string $website The website to set for the user.
     */
    public function setWebsite(?string $website) : void {
        $this->website = $website;
    }

    /**
     * Set the social details for the user.
     *
     * @param ?array $social The social details to set for the user.
     * 
     */
    public function setSocial(?array $social): void {
        $socialObject = new \stdClass();
    
        if (is_array($social))
        foreach ($social as $key => $value) {
            if (!empty($value)) {
                $socialObject->$key = $value;
            }
        }
    
        $this->social = $socialObject;
    }

    /**
     * Set the phone number for the user.
     *
     * @param ?string $phone The phone number to set for the user.
     */
    public function setPhone(?string $phone) : void {
        $this->phone = $phone;
    }

    /**
     * Set the WhatsApp number for the user.
     *
     * @param ?string $whatsapp The WhatsApp number to set for the user.
     */
    public function setWhatsapp(?string $whatsapp) : void {
        $this->whatsapp = $whatsapp;
    }

    /**
     * Set the creation date for the user.
     *
     * @param ?string $createdAt The creation date to set for the user.
     */
    public function setCreatedAt(?string $createdAt) : void {
        $this->createdAt = $createdAt;
    }


     /**
     * Set the role of the user.
     *
     * @return ?string The user's role_id.
     */
    public function setRole(?string $role_id)  : void {
        $this->role_id = $role_id;
    }


    /**
     * Set the status for the user.
     *
     * @param mixed $status The status to set for the user.
     */
    public function setStatus($status) : void {
        $this->status = $status;
    }

    // Properties and methods...

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
    public function validatePassword(?string $enteredPassword) : bool {
        return isset($enteredPassword) && !empty($enteredPassword) ? password_verify($enteredPassword, $this->password) : false;
    }


}
?>
