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
 * @subpackage PHPAssists\Shared\Core\Response\Traits
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Response\Traits;

trait TraitHttpResponse {


    public static function ajaxResponse(?int $response_code, $data = null, $header = false) : string {
        $dataResponse = $data ?? null;
    
        if ($header !== false) {
            http_response_code($response_code);
        }

        $response = self::setResponse($response_code, $dataResponse);
    
        if ($data === null) {
            $response["status"] = self::$BAD_REQUEST;
            $response["data"] = false;
        }
    
        return json_encode( $response, JSON_PRETTY_PRINT );
    }

}
