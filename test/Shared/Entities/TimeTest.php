<?php 
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\Time;

class TimeTest extends TestCase
{
    public function testGetTimezone()
    {
        $time = new Time('America/New_York');
        $this->assertEquals('America/New_York', $time->getTimezone());
    }

    public function testSetTimezoneValid()
    {
        $time = new Time();
        $time->setTimezone('Europe/Berlin');
        $this->assertEquals('Europe/Berlin', $time->getTimezone());
    }

    public function testSetTimezoneInvalid()
    {
        $time = new Time();
        $time->setTimezone('Invalid/Timezone');
        $this->assertEquals('UTC', $time->getTimezone());
    }

    public function testGetCurrentDateTime()
    {
        $time = new Time('Asia/Tokyo');
        $currentDateTime = $time->getCurrentDateTime();
        $this->assertNotNull($currentDateTime);
    }
}
