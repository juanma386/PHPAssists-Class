<?php
/**
 * PHPAssists Exceptions API
 *
 * This class defines the possible Functions for the PHPAssists Exceptions API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.4
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Exceptions\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
namespace PHPAssists\Shared\Core\Exceptions\Abstracts;
abstract class AbstractBaseExceptions extends Exception {
    abstract public function log(?string $message) : ?string;
    public function errorMessage() : ?string {
        $errorMsg = 'Error: '.$this->getMessage();
        return $errorMsg;
    }
}