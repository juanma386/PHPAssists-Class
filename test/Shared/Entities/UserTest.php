<?php
namespace PHPAssistsTest\Shared\Entities; 

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\User;

class UserTest extends TestCase
{
    private $user_id = '1';
    private $user_name = 'oldusername';
    private $user_email = 'test@example.com';
    private $user_old_password = 'oldpassword';
    public function testSetUsername()
    {
        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        // Prueba para setUsername() con un valor válido
        $user->setUsername('newusername');
        $this->assertEquals('newusername', $user->getUsername());
    }

    public function testSetEmail()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        // Prueba para setEmail() con un valor válido
        $user->setEmail('newemail@example.com');
        $this->assertEquals('newemail@example.com', $user->getEmail());
    }

    public function testSetPassword()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        // Prueba para setPassword() con un valor válido
        $newPassword = 'newpassword123';
        $user->setPassword($user->getHashPassword($newPassword));

        // Verificar si el método getPassword() devuelve el hash de la nueva contraseña
        $this->assertTrue(password_verify($newPassword, $user->getPassword()));

        $invalidPassword = 'invalidPassword123';
        $this->assertFalse(password_verify($invalidPassword, $user->getPassword()));
    }

    public function testValidateUsername()
    {
        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        // Prueba para un nombre de usuario válido
        $this->assertTrue($user->validateUsername());

        // Prueba para un nombre de usuario inválido
        $user->setUsername('a'); // Establece un nombre de usuario inválido
        $this->assertFalse($user->validateUsername());
    }

    public function testValidateEmail()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        // Prueba para un correo electrónico válido
        $this->assertTrue($user->validateEmail());

        // Prueba para un correo electrónico inválido
        $user->setEmail('invalid-email'); // Establece un correo electrónico inválido
        $this->assertFalse($user->validateEmail());
    }

    public function testValidatePassword()
    {
        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $validPassword = 'validPassword123';
        $user->setPassword($user->getHashPassword($newPassword));
        
        // Prueba para una contraseña válida
        $this->assertTrue($user->validatePassword($validPassword));
        // Prueba para una contraseña inválida
        $invalidPassword = 'invalidPassword123';
        $this->assertFalse($user->validatePassword($invalidPassword));
    }
}
?>
