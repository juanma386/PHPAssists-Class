<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists Time API Abstract
 *
 * This class represents individual Time API within the PHPAssists framework.
 * It manages information related to Time API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
class AbstractTime extends ClassInvocationProcessor {


    /**
     * Constructor for the Time class.
     *
     * @param string|null $timezone The timezone to set. Defaults to 'UTC' if not provided.
     * @param string|null $format The date-time format. Defaults to 'Y-m-d H:i:s' if not provided.
     * @param string|null $moment The moment in time. Defaults to 'now' if not provided.
     */
    public function __construct(?string $timezone = 'UTC', ?string $format = 'Y-m-d H:i:s', ?string $moment = 'now')
    {
        $this->setTimezone($timezone); // Constructor sets the timezone
        $this->setFormat($format); // Constructor sets the format
        $this->setMoment($moment); // Constructor sets the moment
    }

}