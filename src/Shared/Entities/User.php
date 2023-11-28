<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class User extends ClassInvocationProcessor {
    private $id;
    private $username;
    private $email;
    private $password;

    protected $table              = 'users'; 
    protected $primaryKey         = 'user_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['username', 'email', 'password'];
  
    public function __construct($id, $username, $email, $password) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setEmail($email);
        $this->password = $password;
    }

    public function getId() : string {
        return $this->id;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getPassword() : string {
        return $this->password;
    }

    
    public function setId($id) : void {
        $this->id = $id;
    }

    public function setUsername($username) : void {
        $this->username = $this->validateUsername() ? $username : null;
    }

    public function setEmail($email) : void {
        $this->email = $this->validateEmail() ? $email : null;
    }

    public function setPassword($password) : void {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }
   
    public function validateUsername() : bool {
        return strlen($this->username) >= 3 && strlen($this->username) <= 50;
    }

    public function validateEmail() : bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword($enteredPassword) : bool {
        return password_verify($enteredPassword, $this->password);
    }
}
?>
