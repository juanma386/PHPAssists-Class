<?php
/**
 * PHPAssists User API Test
 *
 * This class defines the possible Functions for the PHPAssists User API Test.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.4
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
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
        $social = [
            "facebook" => "joedoe",
            "instagram" => "joedoe",
            "twitter" => "joedoe",
            "linkedin" => "joedoe",
            "somesocial" => "joedoe",
        ];
        $this->user->setSocial($social);
        $this->assertEquals(json_decode('{"facebook":"joedoe","instagram":"joedoe","twitter":"joedoe","linkedin":"joedoe","somesocial":"joedoe"}'), $this->user->getSocial());
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

    public function testGetInsertData()
{
    // Set up the initial values for the User
    $this->user->setId('123');
    $this->user->setRole('2');
    $metadata = new \stdClass();
    $metadata->key = 'value';
    $this->user->setMetadata($metadata);
    $this->user->setFirstName('John');
    $this->user->setLastName('Doe');
    $this->user->setAddress('123 Main St');
    $this->user->setWebsite('https://example.com');
    $social = [
        "facebook" => "joedoe",
        "instagram" => "joedoe",
        "twitter" => "joedoe",
        "linkedin" => "joedoe",
        "somesocial" => "joedoe",
    ];
    $this->user->setSocial($social);
    $this->user->setPhone('123-456-7890');
    $this->user->setWhatsapp('987-654-3210');
    $this->user->setEmail('john@example.com');
    $this->user->setCreatedAt(date("U"));
    $this->user->setStatus('active');

    // Call the getInsertData function
    $insertData = $this->user->getInsertData('user_id');

    // Assertion checks
    $this->assertIsArray($insertData);
    $this->assertArrayHasKey('user_id', $insertData);
    $this->assertEquals('123', $insertData['user_id']);
    $this->assertEquals('2', $insertData['role_id']);
    $this->assertEquals('{"key":"value"}', $insertData['metadata']);
    $this->assertEquals('John', $insertData['FirstName']);
    $this->assertEquals('Doe', $insertData['LastName']);
    $this->assertEquals('123 Main St', $insertData['Address']);
    $this->assertEquals('https://example.com', $insertData['WebSite']);
    $this->assertEquals('{"facebook":"joedoe","instagram":"joedoe","twitter":"joedoe","linkedin":"joedoe","somesocial":"joedoe"}', $insertData['Social']);
    $this->assertEquals('123-456-7890', $insertData['Phone']);
    $this->assertEquals('987-654-3210', $insertData['Whatsapp']);
    $this->assertEquals('john@example.com', $insertData['UserEmail']);
    $this->assertIsInt((int)$insertData['created_at']);
    $this->assertEquals('active', $insertData['status']);
}

}
?>
