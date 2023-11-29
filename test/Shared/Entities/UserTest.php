<?php
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

        $user->setUsername('newusername');
        $this->assertEquals('newusername', $user->getUsername());
    }

    public function testSetEmail()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $user->setEmail('newemail@example.com');
        $this->assertEquals('newemail@example.com', $user->getEmail());
    }

    public function testSetPassword()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $newPassword = 'newpassword123';
        $user->setPassword($newPassword);

        $this->assertTrue(password_verify($newPassword, $user->getPassword()));

        $invalidPassword = 'invalidPassword123';
        $this->assertFalse(password_verify($invalidPassword, $user->getPassword()));
    }

    public function testValidateUsername()
    {
        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $this->assertTrue($user->validateUsername());

        $user->setUsername('a'); 
        $this->assertFalse($user->validateUsername());
    }

    public function testValidateEmail()
    {

        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $this->assertTrue($user->validateEmail());

        $user->setEmail('invalid-email'); 
        $this->assertFalse($user->validateEmail());
    }

    public function testValidatePassword()
    {
        $user = new User($this->user_id, $this->user_name, $this->user_email, $this->user_old_password);

        $validPassword = 'validPassword123';
        $user->setPassword($validPassword);
        
        $this->assertTrue($user->validatePassword($validPassword));
        $invalidPassword = 'invalidPassword123';
        $this->assertFalse($user->validatePassword($invalidPassword));
    }
}
?>
