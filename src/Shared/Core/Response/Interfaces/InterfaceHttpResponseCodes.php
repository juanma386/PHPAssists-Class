<?php

/**
 * PHPAssists HTTP API
 *
 * This class defines the possible HTTP API codes for the PHPAssists HTTP API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Response\Interfaces
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Response\Interfaces;

interface InterfaceHttpResponseCodes {

    /**
     * **Success codes**
     *
     * These codes indicate that the request was successful.
     */

     const SUCCESS                  = 200;
     const CREATED                  = 201;
     const ACCEPTED                 = 202;
 
     /**
      * **Redirection codes**
      *
      * These codes indicate that the request should be redirected to a new location.
      */
 
     const MOVED_PERMANENTLY        = 301;
     const TEMPORARY_REDIRECT       = 307;
     const PERMANENT_REDIRECT       = 308;
 
     /**
      * **Client error codes**
      *
      * These codes indicate that the request was invalid or could not be processed.
      */
 
     const BAD_REQUEST              = 400;
     const UNAUTHORIZED             = 401;
     const PAYMENT_REQUIRED         = 402;
 
     /**
      * **Server error codes**
      *
      * These codes indicate that an error occurred on the server.
      */
 
     const FORBIDDEN                = 403;
     const NOT_FOUND                = 404;
     const NOT_ALLOWED              = 405;
     const REQUEST_TIMEOUT          = 408;
     const CONFLICT                 = 409;
     const UNPROCESSABLE_ENTITY     = 422;
     const INTERNAL_SERVER_ERROR    = 500;
 
     /**
      * **Other codes**
      *
      * These codes are used for other purposes, such as indicating that the resource is no longer available.
      */
 
     const GONE                     = 410;
     const TEAPOT                   = 418;
     const FAILED_DEPENDENCY        = 424;
     const UPGRADE_REQUIRED         = 426;
 
     /**
      * **Extended codes**
      *
      * These codes are used for extensions to the HTTP protocol.
      */
 
     const UNAVAILABLE_FOR_LEGAL    = 451;
     const NOT_IMPLEMENTED          = 501;
     const SERVICE_UNAVAILABLE      = 503;
     const GATEWAY_TIMEOUT          = 504;
 
     /**
      * **Private codes**
      *
      * These codes are used for internal purposes.
      */
 
     const NETWORK_AUTH_REQUIRED    = 511;
     const NOT_UPDATED              = 512;
     const VERSION_MISMATCH         = 521;
     const BANDWIDTH_LIMIT_EXCEEDED = 509;
}