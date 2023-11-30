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
use PHPAssists\Shared\Core\Response\Entities\HTTPEntity;

abstract class AbstractBaseResponse extends HTTPEntity {

    public function __construct()
    {
        self::$POSITIVE_CODES_STATUS = self::getPositiveCodesStatus();
        self::$RESPONSE_CODES_STATUS = self::isResponseCodesStatus();
    }

    public static function setResponse(?int $response_code, $data = null) {
        $response = new self((int) $response_code, $data);
        $response->status = self::isResponse($response_code) ? $response_code : self::$NOT_IMPLEMENTED;
        self::isPositiveResponse($response_code) ? [ $response->data = $data ] : [ $response->error = $data ];
        return $response;
    }
    
    public static function isPositiveResponse(?int $response_code) {
        return in_array($response_code, $POSITIVE_CODES_STATUS);
    }

    public static function isResponse(?int $response_code) {
        return in_array($response_code, self::$RESPONSE_CODES_STATUS);
    }

    protected static function getPositiveCodesStatus(): array
    {
        return [
            self::$SUCCESS,
            self::$CREATED,
            self::$ACCEPTED,
            self::$MOVED_PERMANENTLY,
            self::$TEMPORARY_REDIRECT,
            self::$PERMANENT_REDIRECT,
        ];
    }

    protected static function isResponseCodesStatus(): array
    {
        return [
            self::$SUCCESS,
            self::$CREATED,
            self::$ACCEPTED,
            self::$MOVED_PERMANENTLY,
            self::$TEMPORARY_REDIRECT,
            self::$PERMANENT_REDIRECT,
        
            self::$BAD_REQUEST,
            self::$UNAUTHORIZED,
            self::$PAYMENT_REQUIRED,
        
            self::$FORBIDDEN,
            self::$NOT_FOUND,
            self::$NOT_ALLOWED,
            self::$REQUEST_TIMEOUT,
            self::$CONFLICT,
            self::$UNPROCESSABLE_ENTITY,
            self::$INTERNAL_SERVER_ERROR,
        
            self::$GONE,
            self::$TEAPOT,
            self::$FAILED_DEPENDENCY,
            self::$UPGRADE_REQUIRED,
        
            self::$UNAVAILABLE_FOR_LEGAL,
            self::$NOT_IMPLEMENTED,
            self::$SERVICE_UNAVAILABLE,
            self::$GATEWAY_TIMEOUT,
        
            self::$NETWORK_AUTH_REQUIRED,
            self::$NOT_UPDATED,
            self::$VERSION_MISMATCH,
            self::$BANDWIDTH_LIMIT_EXCEEDED,
        ];
    }

    abstract public static function ajaxResponse(?int $response_code, $data = null, $header = false) : string;
}
