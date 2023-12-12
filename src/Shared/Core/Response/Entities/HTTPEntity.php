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
 * @subpackage PHPAssists\Shared\Core\Response\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Response\Entities;
use PHPAssists\Shared\Core\Response\Traits\TraitHttpResponse;
use PHPAssists\Shared\Core\Response\Interfaces\{
    InterfaceHttpResponseCodes,
    InterfaceHTTP,
};

class HTTPEntity implements InterfaceHttpResponseCodes, InterfaceHTTP {
    use TraitHttpResponse;

    static int $SUCCESS = self::SUCCESS;
    static int $CREATED = self::CREATED;
    static int $ACCEPTED = self::ACCEPTED;
    static int $MOVED_PERMANENTLY = self::MOVED_PERMANENTLY;
    static int $TEMPORARY_REDIRECT = self::TEMPORARY_REDIRECT;
    static int $PERMANENT_REDIRECT = self::PERMANENT_REDIRECT;

    static int $BAD_REQUEST = self::BAD_REQUEST;
    static int $UNAUTHORIZED = self::UNAUTHORIZED;
    static int $PAYMENT_REQUIRED = self::PAYMENT_REQUIRED;

    static int $FORBIDDEN = self::FORBIDDEN;
    static int $NOT_FOUND = self::NOT_FOUND;
    static int $NOT_ALLOWED = self::NOT_ALLOWED;
    static int $REQUEST_TIMEOUT = self::REQUEST_TIMEOUT;
    static int $CONFLICT = self::CONFLICT;
    static int $UNPROCESSABLE_ENTITY = self::UNPROCESSABLE_ENTITY;
    static int $INTERNAL_SERVER_ERROR = self::INTERNAL_SERVER_ERROR;

    static int $GONE = self::GONE;
    static int $TEAPOT = self::TEAPOT;
    static int $FAILED_DEPENDENCY = self::FAILED_DEPENDENCY;
    static int $UPGRADE_REQUIRED = self::UPGRADE_REQUIRED;

    static int $UNAVAILABLE_FOR_LEGAL = self::UNAVAILABLE_FOR_LEGAL;
    static int $NOT_IMPLEMENTED = self::NOT_IMPLEMENTED;
    static int $SERVICE_UNAVAILABLE = self::SERVICE_UNAVAILABLE;
    static int $GATEWAY_TIMEOUT = self::GATEWAY_TIMEOUT;

    static int $NETWORK_AUTH_REQUIRED = self::NETWORK_AUTH_REQUIRED;
    static int $NOT_UPDATED = self::NOT_UPDATED;
    static int $VERSION_MISMATCH = self::VERSION_MISMATCH;
    static int $BANDWIDTH_LIMIT_EXCEEDED = self::BANDWIDTH_LIMIT_EXCEEDED;

    static array $POSITIVE_CODES_STATUS = [];
    static array $RESPONSE_CODES_STATUS = [];

    /**
     * @var int Status code for the response.
     */
    public ?int $status;

    /**
     * @var mixed|null Data related to the response.
     */
    public mixed $data;

    /**
     * @var mixed|null Error information for the response.
     */
    public mixed $error;


    /**
     * Constructor for the MyResponse class.
     *
     * @param int $response_code The status code for the response.
     * @param mixed|null $data Data related to the response.
     * @param mixed|null $error Error information for the response.
     */
    public function __construct(?int $response_code, mixed $data = null, mixed $error = null) {
        self::$POSITIVE_CODES_STATUS = self::getPositiveCodesStatus();
        self::$RESPONSE_CODES_STATUS = self::isResponseCodesStatus();
        $this->setStatus($response_code);
        if ($data||$error) {
            if (self::isPositiveResponse($response_code)) {
                if ($data){ $this->setData($data); }
            } else {
                if ($error){ $this->setError($error); }
            }
        }
    }

    public static function setResponse(?int $response_code, $data = null) {
        $response = new static((int) $response_code, $data);
        if ($response::isResponse($response_code)) {
            $response->setStatus($response_code);
        } else {
            $response->setStatus(self::$NOT_IMPLEMENTED);
            $response->setError($data);
        }  
        
        return $response;
    }
    
    public static function isPositiveResponse(?int $response_code) {
        return in_array($response_code, self::$POSITIVE_CODES_STATUS);
    }

    public static function isResponse(?int $response_code) {
        return in_array($response_code, self::$RESPONSE_CODES_STATUS);
    }

    static function getPositiveCodesStatus(): array
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

    static function isResponseCodesStatus(): array
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


    public function setStatus(?int $status): void {
        $this->status = isset($status) && !empty($status) ? $status : self::$BAD_REQUEST;
    }

    public function setData(mixed $data): void {
        $this->data = isset($data) ? $data : null;
    }

    public function setError(mixed $error): void {
        $this->error = isset($error) ? $error : null;
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function getData() : mixed {
        return $this->data;
    }

    public function getError() : mixed {
        return $this->error;
    }


    public function validateStatus(): bool {
        // Define any validation logic for the status code
        // For example, ensure it falls within a specific range
        return true; // Add your validation logic here
    }
}