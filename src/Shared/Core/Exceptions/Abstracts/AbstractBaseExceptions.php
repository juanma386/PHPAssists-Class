<?php
/**
 * PHPAssists Exceptions API
 *
 * This class defines the possible Functions for the PHPAssists Exceptions API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.4
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Exceptions\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssists\Shared\Core\Exceptions\Abstracts;
abstract class AbstractBaseExceptions extends Exception {
    abstract public function log(?string $message) : ?string;
    public function errorMessage() : ?string {
        $errorMsg = 'Error: '.$this->getMessage();
        return $errorMsg;
    }
}