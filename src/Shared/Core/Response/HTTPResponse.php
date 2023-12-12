<?php

/**
 * PHPAssists HTTP API
 *
 * This class defines the possible HTTP API codes for the PHPAssists HTTP API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Response
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Response;
use PHPAssists\Shared\Core\Response\Traits\TraitHttpResponse;
use PHPAssists\Shared\Core\Response\Abstracts\AbstractBaseResponse;
use PHPAssists\Shared\Core\Response\Interfaces\InterfaceHttpResponseCodes;

class HTTPResponse extends AbstractBaseResponse  implements InterfaceHttpResponseCodes {
    static int $BAD_REQUEST = self::BAD_REQUEST;
    use TraitHttpResponse;
}