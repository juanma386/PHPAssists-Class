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


    public static function ajaxResponse(?int $response_code, mixed $data = null,?bool $header = null) : string {
        $dataResponse = $data ?? null;
        ob_start();
        $output = ob_get_contents();
        if ($response_code !== null) {
            header('HTTP/1.1 ' . $response_code);
        }
        $response = self::setResponse($response_code, $dataResponse);
        return json_encode( $response, JSON_PRETTY_PRINT );
    }

}
