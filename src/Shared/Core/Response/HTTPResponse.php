<?php

/**
 * PHPAssists HTTP API
 *
 * This class defines the possible HTTP API codes for the PHPAssists HTTP API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Response
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Response;
use PHPAssists\Shared\Core\Response\Traits\TraitHttpResponse;
use PHPAssists\Shared\Core\Response\Abstracts\AbstractBaseResponse;
use PHPAssists\Shared\Core\Response\Interfaces\InterfaceHttpResponseCodes;

class HTTPResponse extends AbstractBaseResponse  implements InterfaceHttpResponseCodes {
    static int $BAD_REQUEST = self::BAD_REQUEST;
    use TraitHttpResponse;
}