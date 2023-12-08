<?php
/**
 * PHPAssists User API Test
 *
 * This class defines the possible Functions for the PHPAssists User API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.4
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
    private $role_id = '1';
    private $user_name = 'oldusername';
    private $user_email = 'test@example.com';
    private $user_old_password = 'oldpassword';

    private User $user;


    protected function setUp(): void {
        parent::setUp();
        $this->user = new User($this->user_id, $this->role_id, $this->user_name, $this->user_email, $this->user_old_password);
    }

    public function testSetRole()
    {
        $this->user->setRole("2");
        $this->assertNotEquals($this->role_id, $this->user->getRole());
        $this->assertEquals("2", $this->user->getRole());
    }

    public function testSetUsername()
    {
        $this->user->setUsername('newusername');
        $this->assertEquals('newusername', $this->user->getUsername());
    }

    public function testSetEmail()
    {
        $this->user->setEmail('newemail@example.com');
        $this->assertEquals('newemail@example.com', $this->user->getEmail());
    }

    public function testSetPassword()
    {
        $newPassword = 'newpassword123';
        $this->user->setPassword($newPassword);
        $this->assertTrue(password_verify($newPassword, $this->user->getPassword()));
        $invalidPassword = 'invalidPassword123';
        $this->assertFalse(password_verify($invalidPassword, $this->user->getPassword()));
    }

    public function testValidateUsername()
    {
        $this->assertTrue($this->user->validateUsername());
        $this->user->setUsername('a'); 
        $this->assertFalse($this->user->validateUsername());
    }

    public function testValidateEmail()
    {
        $this->assertTrue($this->user->validateEmail());
        $this->user->setEmail('invalid-email'); 
        $this->assertFalse($this->user->validateEmail());
    }

    public function testValidatePassword()
    {
        $validPassword = 'validPassword123';
        $this->user->setPassword($validPassword);
        $this->assertTrue($this->user->validatePassword($validPassword));
        $invalidPassword = 'invalidPassword123';
        $this->assertFalse($this->user->validatePassword($invalidPassword));
    }
    
    public function testSetMetadata()
    {
        $metadata = (object) ['key' => 'value'];
        $this->user->setMetadata($metadata);
        $this->assertEquals($metadata, $this->user->getMetadata());
    }

    public function testSetFirstName()
    {
        $firstName = 'John';
        $this->user->setFirstName($firstName);
        $this->assertEquals($firstName, $this->user->getFirstName());
    }

    public function testSetLastName()
    {
        $lastName = 'Doe';
        $this->user->setLastName($lastName);
        $this->assertEquals($lastName, $this->user->getLastName());
    }

    public function testSetAddress()
    {
        $address = '123 Main St';
        $this->user->setAddress($address);
        $this->assertEquals($address, $this->user->getAddress());
    }

    public function testSetWebsite()
    {
        $website = 'https://example.com';
        $this->user->setWebsite($website);
        $this->assertEquals($website, $this->user->getWebsite());
    }

    public function testSetSocial()
    {
        $social = 'facebook';
        $this->user->setSocial($social);
        $this->assertEquals($social, $this->user->getSocial());
    }

    public function testSetPhone()
    {
        $phone = '123-456-7890';
        $this->user->setPhone($phone);
        $this->assertEquals($phone, $this->user->getPhone());
    }

    public function testSetWhatsapp()
    {
        $whatsapp = '987-654-3210';
        $this->user->setWhatsapp($whatsapp);
        $this->assertEquals($whatsapp, $this->user->getWhatsapp());
    }

    public function testSetCreatedAt()
    {
        $createdAt = (int) date("U");
        $this->user->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $this->user->getCreatedAt());
    }

    public function testSetStatus()
    {
        $status = 'active';
        $this->user->setStatus($status);
        $this->assertEquals($status, $this->user->getStatus());
    }
}
?>
