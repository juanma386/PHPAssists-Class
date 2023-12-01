<?php 
namespace PHPAssists\Shared\Core\Response\Abstracts;

/**
 * PHPAssists HTTP API
 *
 * This class defines the possible HTTP API codes for the PHPAssists HTTP API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Response\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

use PHPAssists\Shared\Core\Response\Traits\TraitHttpResponse;
use PHPAssists\Shared\Core\Response\Entities\HTTPEntity;
use PHPAssists\Shared\Core\Response\Interfaces\InterfaceHttpResponseCodes;

abstract class AbstractBaseResponse implements InterfaceHttpResponseCodes  {
    abstract public static function ajaxResponse(?int $response_code, $data = null, ?bool $header = null): string;
}
