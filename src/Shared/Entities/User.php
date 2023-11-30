<?php
namespace PHPAssists\Shared\Entities; 
/**
 * PHPAssists User API Test
 *
 * This class defines the possible Functions for the PHPAssists User API Test.
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
 use PHPAssists\Shared\Abstracts\AbstractUser;
 use PHPAssists\Shared\Interfaces\InterfaceUser;

class User extends AbstractUser implements InterfaceUser {

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
     * Hash the provided password using the PASSWORD_DEFAULT algorithm.
     *
     * @param string|null $password The password to be hashed.
     *
     * @return string|null The hashed password or null if the provided password is empty or not set.
     */
    private function getHashPassword($password) : ?string {
        return isset($password) && !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
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




}
?>
