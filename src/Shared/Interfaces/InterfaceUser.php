<?php
namespace PHPAssists\Shared\Interfaces; 

/**
 * PHPAssists User API Abstract
 *
 * This interface defines methods for individual User API within the PHPAssists framework.
 * It outlines functionality related to User API management.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceUser {
    
    /**
     * Get the ID of the user.
     *
     * @return string|null The user's ID or null if not set.
     */
    public function getId()  : ?string;

    /**
     * Get the username of the user.
     *
     * @return string|null The user's username or null if not set.
     */
    public function getUsername()  : ?string;

    /**
     * Get the email of the user.
     *
     * @return string|null The user's email or null if not set.
     */
    public function getEmail()  : ?string;

    /**
     * Get the hashed password of the user.
     *
     * @return string|null The user's hashed password or null if not set.
     *                    If the provided password is empty or not set, it returns null.
     */
    public function getPassword()  : ?string;

    /**
     * Hash the provided password using the PASSWORD_DEFAULT algorithm.
     *
     * @param string|null $password The password to be hashed.
     *
     * @return string|null The hashed password or null if the provided password is empty or not set.
     */
    public function getHashPassword(?string $password) : ?string;


    /**
     * Set the ID of the user.
     *
     * @param mixed $id The ID to set for the user.
     *
     * @return void
     */
    public function setId(?string $id) : void;

    /**
     * Set the username of the user.
     *
     * @param string|null $username The username to set for the user.
     *                              If the username doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setUsername(?string $username) : void;

    /**
     * Set the email of the user.
     *
     * @param string|null $email The email to set for the user.
     *                           If the email doesn't pass validation, it will be set to null.
     *
     * @return void
     */
    public function setEmail(?string $email) : void;

    /**
     * Set the hashed password of the user.
     *
     * @param string|null $password The password to set for the user (plaintext).
     *                              It gets hashed before being set.
     *
     * @return void
     */
    public function setPassword(?string $password) : void;

}