<?php
namespace PHPAssists\Shared\Entities; 

use Shared\Core\ClassInvocationProcessor;

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
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
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

    public function setUsername($username) : void {
        $this->username = $username;
    }

    public function setEmail($email) : void {
        $this->email = $email;
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
