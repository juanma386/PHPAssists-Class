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
 * @subpackage PHPAssists\Shared\Core\Response\Traits
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Response\Traits;
use PHPAssists\Shared\Core\Response\Entities\HTTPEntity;

trait TraitHttpResponse {
    public static function ajaxResponse(?int $response_code, mixed $data = null,?bool $header = null) : string {
        $dataResponse = $data ?? null;
        $response = HTTPEntity::setResponse($response_code, $dataResponse);
        return json_encode( $response, JSON_PRETTY_PRINT );
    }
}
