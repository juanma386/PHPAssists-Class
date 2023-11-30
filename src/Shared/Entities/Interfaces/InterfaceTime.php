<?php
namespace PHPAssists\Shared\Entities\Interfaces; 

/**
 * PHPAssists Time API Abstract
 *
 * This interface defines methods for individual Time API within the PHPAssists framework.
 * It outlines functionality related to Time API management.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceTime {

    /**
     * Get the current date and time based on the configured timezone.
     *
     * @return string The current date and time formatted according to the set format and timezone.
     */
    public function getCurrentDateTime() : ? string;

    /**
     * Get the configured timezone.
     *
     * @return string|null The configured timezone or null if not set.
     */
    public function getTimezone(): ? string;



    /**
     * Get the configured moment.
     *
     * @return string|null The configured moment or null if not set.
     */
    public function getMoment(): ? string;

    /**
     * Get the configured format.
     *
     * @return string|null The configured format or null if not set.
     */
    public function getFormat(): ? string;

    /**
     * Set the format.
     *
     * @param string $format The format to set.
     *
     * @return void
     */
    public function setFormat(?string $format): void;

    /**
     * Set the moment.
     *
     * @param string $moment The moment to set.
     *
     * @return void
     */
    public function setMoment(?string $moment): void;

    /**
     * Set the timezone.
     *
     * @param string $timezone The timezone to set.
     *
     * @return void
     */
    public function setTimezone(?string $timezone): void;


}