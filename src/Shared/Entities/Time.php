<?php 
namespace PHPAssists\Shared\Entities;
/**
 * PHPAssists Time API Test
 *
 * This class defines the possible Functions for the PHPAssists Time API Test.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

 // Necessary imports for the class
use PHPAssists\Shared\Abstracts\AbstractTime;
use PHPAssists\Shared\Interfaces\InterfaceTime;

use DateTimeZone;

class Time extends AbstractTime implements InterfaceTime
{
    
    /**
     * Get the configured timezone.
     *
     * @return string|null The configured timezone or null if not set.
     */
    private function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set the timezone.
     *
     * @param string $timezone The timezone to set.
     *
     * @return void
     */
    private function setTimezone($timezone)
    {
        // Verify if the provided timezone is valid
        if (in_array($timezone, DateTimeZone::listIdentifiers())) {
            $this->timezone = $timezone;
        } 
    }

    /**
     * Get the configured format.
     *
     * @return string|null The configured format or null if not set.
     */
    private function getFormat()
    {
        return $this->format;
    }

    /**
     * Set the format.
     *
     * @param string $format The format to set.
     *
     * @return void
     */
    private function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * Get the configured moment.
     *
     * @return string|null The configured moment or null if not set.
     */
    private function getMoment()
    {
        return $this->moment;
    }

    /**
     * Set the moment.
     *
     * @param string $moment The moment to set.
     *
     * @return void
     */
    private function setMoment($moment)
    {
        $this->moment = $moment;
    }

    /**
     * Get the current date and time based on the configured timezone.
     *
     * @return string The current date and time formatted according to the set format and timezone.
     */
    public function getCurrentDateTime()
    {
        // Create a DateTime object with the configured moment and timezone
        $dateTime = new \DateTime($this->moment, new DateTimeZone($this->getTimezone()));
        // Format the date and time according to the configured format
        return $dateTime->format($this->format);
    }
}
?>
