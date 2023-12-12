<?php
/**
 * PHPAssists Time API Test
 *
 * This class defines the possible Functions for the PHPAssists Time API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
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
use PHPAssists\Shared\Entities\Time;
use DateTimeZone;

class TimeTest extends TestCase
{
    /**
     * Test the method to get the timezone.
     */
    public function testGetTimezone()
    {
        $time = new Time('America/New_York');
        $this->assertEquals('America/New_York', $time->getTimezone());
    }

    /**
     * Test setting a valid timezone.
     */
    public function testSetTimezoneValid()
    {
        $time = new Time();
        $time->setTimezone('Europe/Berlin');
        $this->assertEquals('Europe/Berlin', $time->getTimezone());
    }

    /**
     * Test setting an invalid timezone.
     */
    public function testSetTimezoneInvalid()
    {
        $time = new Time();
        $time->setTimezone('Invalid/Timezone');
        $this->assertEquals('UTC', $time->getTimezone());
    }

/**
 * Test getting the current date and time in a specific timezone.
 */
public function testGetCurrentDateTime()
{
    $time = new Time('Asia/Tokyo');
    $currentDateTime = $time->getCurrentDateTime();
    $this->assertNotNull($currentDateTime);

    // Check if the current date and time has the correct format 'Y-m-d H:i:s'
    $this->assertMatchesRegularExpression('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $currentDateTime);

    // Verify if the current date and time correspond to the specified timezone 'Asia/Tokyo'
    $dateTime = new \DateTime($currentDateTime, new DateTimeZone('Asia/Tokyo'));
    $this->assertEquals('Asia/Tokyo', $dateTime->getTimezone()->getName());

    // Verify if the current date and time is close to the actual system date and time
    $this->assertLessThanOrEqual(2, abs(time() - $dateTime->getTimestamp()));
}

}
?>
