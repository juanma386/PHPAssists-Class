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
 * @subpackage PHPAssists\Shared\Core\Response\Traits
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

use PHPAssists\Shared\Core\Response\Traits\HttpResponseCodes;


abstract class AbstractBaseResponse {

    use traitHttpResponseCodes;

    protected static int $SUCCESS = self::SUCCESS;
    protected static int $CREATED = self::CREATED;
    protected static int $ACCEPTED = self::ACCEPTED;
    protected static int $MOVED_PERMANENTLY = self::MOVED_PERMANENTLY;
    protected static int $TEMPORARY_REDIRECT = self::TEMPORARY_REDIRECT;
    protected static int $PERMANENT_REDIRECT = self::PERMANENT_REDIRECT;

    protected static int $BAD_REQUEST = self::BAD_REQUEST;
    protected static int $NOTAUTH = self::NOTAUTH;
    protected static int $PAYMENT_REQUIRED = self::PAYMENT_REQUIRED;

    protected static int $FORBIDDEN = self::FORBIDDEN;
    protected static int $NOTFOUND = self::NOTFOUND;
    protected static int $NOTALLOWED = self::NOTALLOWED;
    protected static int $REQUEST_TIMEOUT = self::REQUEST_TIMEOUT;
    protected static int $CONFLICT = self::CONFLICT;
    protected static int $UNPROCESSABLE = self::UNPROCESSABLE;
    protected static int $SERVERERROR = self::SERVERERROR;

    protected static int $GONE = self::GONE;
    protected static int $TEAPOT = self::TEAPOT;
    protected static int $FAILED_DEPENDENCY = self::FAILED_DEPENDENCY;
    protected static int $UPGRADE_REQUIRED = self::UPGRADE_REQUIRED;

    protected static int $UNAVAILABLE_OF_LEGAL = self::UNAVAILABLE_OF_LEGAL;
    protected static int $NOT_IMPLEMENTED = self::NOT_IMPLEMENTED;
    protected static int $SERVICE_UNAVAILABLE = self::SERVICE_UNAVAILABLE;
    protected static int $GATEWAY_UNAVAILABLE = self::GATEWAY_UNAVAILABLE;

    protected static int $NETWORK_AUTH_REQUIRED = self::NETWORK_AUTH_REQUIRED;
    protected static int $NOT_UPDATED = self::NOT_UPDATED;
    protected static int $VERSION_MISMATCH = self::VERSION_MISMATCH;
    protected static int $BRANWIDTH_LIMIT_EXCEEDED = self::BRANWIDTH_LIMIT_EXCEEDED;

    protected static array $POSITIVE_CODES_STATUS = [
        self::$SUCCESS,
        self::$CREATED,
        self::$ACCEPTED,
        self::$MOVED_PERMANENTLY,
        self::$TEMPORARY_REDIRECT,
        self::$PERMANENT_REDIRECT,
    ];

    protected static array $RESPONSE_CODES_STATUS = [
        self::$SUCCESS,
        self::$CREATED,
        self::$ACCEPTED,
        self::$MOVED_PERMANENTLY,
        self::$TEMPORARY_REDIRECT,
        self::$PERMANENT_REDIRECT,
        self::$BAD_REQUEST,
        self::$NOTAUTH,
        self::$PAYMENT_REQUIRED,
        self::$FORBIDDEN,
        self::$NOTFOUND,
        self::$NOTALLOWED,
        self::$REQUEST_TIMEOUT,
        self::$CONFLICT,
        self::$UNPROCESSABLE,
        self::$SERVERERROR,
        self::$GONE,
        self::$TEAPOT,
        self::$FAILED_DEPENDENCY,
        self::$UPGRADE_REQUIRED,
        self::$UNAVAILABLE_OF_LEGAL,
        self::$NOT_IMPLEMENTED,
        self::$SERVICE_UNAVAILABLE,
        self::$GATEWAY_UNAVAILABLE,
        self::$NETWORK_AUTH_REQUIRED,
        self::$NOT_UPDATED,
        self::$VERSION_MISMATCH,
        self::$BRANWIDTH_LIMIT_EXCEEDED,
    ];

    public static function setResponse(?int $response_code, $data = null) {
        
        $response = new \HTTPEntity((int) $response_code, $data);
        $response->status = self::isResponse($response_code) ? $response_code : self::$NOT_IMPLEMENTED;
        self::isPositiveResponse($response_code) ? [ $response->data = $data,  unset($response->error) ] : [ $response->error = $data,  unset($response->data) ];
        return $response;
    }
    
    public static function isPositiveResponse(?int $response_code) {
        return in_array($response_code, $POSITIVE_CODES_STATUS);
    }

    public static function isResponse(?int $response_code) {
        return in_array($response_code, self::$RESPONSE_CODES_STATUS);
    }

    abstract public static function ajaxResponse(?int $response_code, $data = null, $header = false) : string;
}
