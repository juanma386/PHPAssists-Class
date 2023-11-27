<?php
namespace PHPAssists\Shared\Entities; 
class User {
    private $id;
    private $username;
    private $email;
    private $password;

    protected $table              = 'users'; // Nombre de la tabla
    protected $primaryKey         = 'user_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['username', 'email', 'password'];
  
    // Constructor de la clase
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
        // Verificar si el username tiene una longitud válida
        return strlen($this->username) >= 3 && strlen($this->username) <= 50;
    }

    public function validateEmail() : bool {
        // Verificar si el email es válido
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword($enteredPassword) : bool {
        // Verificar si la contraseña ingresada coincide con la contraseña almacenada
        return password_verify($enteredPassword, $this->password);
    }
}
?>
