<?php
namespace PHPAssistsTest\Shared\Entities; 

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\User;

class UserTest extends TestCase
{
    public function testSetUsername()
    {
        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para setUsername() con un valor válido
        $user->setUsername('newusername');
        $this->assertEquals('newusername', $user->getUsername());
    }

    public function testSetEmail()
    {

        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para setEmail() con un valor válido
        $user->setEmail('newemail@example.com');
        $this->assertEquals('newemail@example.com', $user->getEmail());
    }

    public function testSetPassword()
    {
        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para setPassword() con un valor válido
        $newPassword = 'newpassword123';
        $user->setPassword($newPassword);

        // Verificar si el método getPassword() devuelve el hash de la nueva contraseña
        $this->assertTrue(password_verify($newPassword, $user->getPassword()));

        $invalidPassword = 'invalidPassword123';
        $this->assertFalse(password_verify($invalidPassword, $user->getPassword()));
    }

    public function testValidateUsername()
    {
        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para un nombre de usuario válido
        $this->assertTrue($user->validateUsername());

        // Prueba para un nombre de usuario inválido
        $user->setUsername('a'); // Establece un nombre de usuario inválido
        $this->assertFalse($user->validateUsername());
    }

    public function testValidateEmail()
    {
        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para un correo electrónico válido
        $this->assertTrue($user->validateEmail());

        // Prueba para un correo electrónico inválido
        $user->setEmail('invalid-email'); // Establece un correo electrónico inválido
        $this->assertFalse($user->validateEmail());
    }

    public function testValidatePassword()
    {
        $user_id = '1';
        $user_name = 'oldusername';
        $user_email = 'test@example.com';
        $user_old_password = 'oldpassword';

        $user = new User($user_id, $user_name, $user_email, $user_old_password);

        // Prueba para una contraseña válida
        $validPassword = 'validPassword123';
        $user->setPassword($validPassword);
        $this->assertTrue($user->validatePassword($validPassword));

        // Prueba para una contraseña inválida
        $invalidPassword = 'invalidPassword123';
        $this->assertFalse($user->validatePassword($invalidPassword));
    }
}
?>
