<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class User extends ClassInvocationProcessor {
    private $id         = null;
    private $username   = null;
    private $email      = null;
    private $password   = null;

    protected $table              = 'users'; 
    protected $primaryKey         = 'user_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['username', 'email', 'password'];
  
    public function __construct($id, $username, $email, $password) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getId()  : string | null {
        return $this->id;
    }

    public function getUsername()  : string | null {
        return $this->username;
    }

    public function getEmail()  : string | null {
        return $this->email;
    }

    public function getPassword()  : string | null {
        return $this->password;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) ? $id : null;
    }

    public function setUsername($username) : void {
        $this->username = $username;
        !$this->validateUsername() ? [ $this->username = null ] : false;
    }

    public function setEmail($email) : void {
        $this->email = $email;
        !$this->validateEmail() ? [ $this->email = null ] : false;
    }

    public function setPassword($password) : void {
        $hashedPassword = $this->getHashPassword($password);
        $this->password = $hashedPassword;
    }
   
    public function validateUsername() : bool {
        
        return isset($this->username) && !empty($this->username) && mb_strlen($this->username) >= 3 && mb_strlen($this->username) <= 50;
    }

    public function validateEmail() : bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword($enteredPassword) : bool {
        return isset($enteredPassword) && !empty($enteredPassword) ? password_verify($enteredPassword, $this->password) : false;
    }

    private function getHashPassword($password) : string | null {
        return isset($password) && !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
    }

}
?>
