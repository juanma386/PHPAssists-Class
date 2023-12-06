<?php
namespace PHPAssists\Shared\Entities; 
/**
 * PHPAssists User API Test
 *
 * This class defines the possible Functions for the PHPAssists User API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */


 // Necessary imports for the class
 use PHPAssists\Shared\Entities\Abstracts\AbstractUser;
 use PHPAssists\Shared\Entities\Interfaces\InterfaceUser;

class User extends AbstractUser implements InterfaceUser {

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
     * Set the ID of the user.
     *
     * @param mixed $id The ID to set for the user.
     *
     * @return void
     */
    public function setId($id) : void {
        $this->id = isset($id) ? $id : null;
    }

    /**
     * Set the username of the user.
     *
     * @param string|null $username The username to set for the user.
     *                              If the username doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setUsername($username) : void {
        $this->username = $username;
        !$this->validateUsername() ? [ $this->username = null ] : false;
    }

    /**
     * Set the email of the user.
     *
     * @param string|null $email The email to set for the user.
     *                           If the email doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setEmail($email) : void {
        $this->email = $email;
        !$this->validateEmail() ? [ $this->email = null ] : false;
    }

    /**
     * Set the hashed password of the user.
     *
     * @param string|null $password The password to set for the user (plaintext).
     *                              It gets hashed before being set.
     *
     * @return void
     */
    public function setPassword($password) : void {
        $hashedPassword = $this->getHashPassword($password);
        $this->password = $hashedPassword;
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
    public function validatePassword(?string $enteredPassword) : bool {
        return isset($enteredPassword) && !empty($enteredPassword) ? password_verify($enteredPassword, $this->password) : false;
    }
}
?>
