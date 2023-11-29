<?php 
namespace PHPAssists\Shared\Entities;

use DateTimeZone;

class Time
{
    private $timezone;

    public function __construct($timezone = 'UTC')
    {
        $this->setTimezone($timezone);
    }

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function setTimezone($timezone)
    {
        if (in_array($timezone, DateTimeZone::listIdentifiers())) {
            $this->timezone = $timezone;
        } else {
            // Si se proporciona una zona horaria inválida, se establece la zona horaria por defecto (UTC)
            $this->timezone = 'UTC';
        }
    }

    public function getCurrentDateTime()
    {
        $dateTime = new \DateTime('now', new DateTimeZone($this->getTimezone()));
        return $dateTime->format('Y-m-d H:i:s');
    }
}
