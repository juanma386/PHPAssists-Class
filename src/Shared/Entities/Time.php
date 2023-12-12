<?php 
namespace PHPAssists\Shared\Entities;
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

 // Necessary imports for the class
use PHPAssists\Shared\Entities\Abstracts\AbstractTime;
use PHPAssists\Shared\Entities\Interfaces\InterfaceTime;

use DateTimeZone;

class Time extends AbstractTime implements InterfaceTime
{
 
    private ?string $timezone = 'UTC'; // Default timezone is set to 'UTC'

    private ?string $format   = 'Y-m-d H:i:s'; // Default date-time format

    private ?string $moment   = 'now'; // Default moment is 'now'

    /**
     * Get the configured timezone.
     *
     * @return string|null The configured timezone or null if not set.
     */
    public function getTimezone(): ? string
    {
        return $this->timezone;
    }



    /**
     * Get the configured format.
     *
     * @return string|null The configured format or null if not set.
     */
    public function getFormat(): ? string
    {
        return $this->format;
    }


    /**
     * Get the configured moment.
     *
     * @return string|null The configured moment or null if not set.
     */
    public function getMoment(): ? string
    {
        return $this->moment;
    }

    /**
     * Get the current date and time based on the configured timezone.
     *
     * @return string The current date and time formatted according to the set format and timezone.
     */
    public function getCurrentDateTime(): ? string
    {
        // Create a DateTime object with the configured moment and timezone
        $dateTime = new \DateTime($this->moment, new DateTimeZone($this->getTimezone()));
        // Format the date and time according to the configured format
        return $dateTime->format($this->format);
    }


    /**
     * Set the timezone.
     *
     * @param string $timezone The timezone to set.
     *
     * @return void
     */
    public function setTimezone(?string $timezone) : void
    {
        // Verify if the provided timezone is valid
        if (in_array($timezone, DateTimeZone::listIdentifiers())) {
            $this->timezone = $timezone;
        } 
    }

    /**
     * Set the format.
     *
     * @param string $format The format to set.
     *
     * @return void
     */
    public function setFormat(?string $format): void
    {
        $this->format = $format;
    }

    /**
     * Set the moment.
     *
     * @param string $moment The moment to set.
     *
     * @return void
     */
    public function setMoment(?string $moment) : void
    {
        $this->moment = $moment;
    }

}
?>
