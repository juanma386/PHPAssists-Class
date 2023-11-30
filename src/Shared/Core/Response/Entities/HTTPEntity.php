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
 * @subpackage PHPAssists\Shared\Core\Response\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Response\Entities;
use PHPAssists\Shared\Core\Response\Interfaces\InterfaceHttpResponseCodes;

class HTTPEntity implements InterfaceHttpResponseCodes {


    protected static int $SUCCESS = self::SUCCESS;
    protected static int $CREATED = self::CREATED;
    protected static int $ACCEPTED = self::ACCEPTED;
    protected static int $MOVED_PERMANENTLY = self::MOVED_PERMANENTLY;
    protected static int $TEMPORARY_REDIRECT = self::TEMPORARY_REDIRECT;
    protected static int $PERMANENT_REDIRECT = self::PERMANENT_REDIRECT;

    protected static int $BAD_REQUEST = self::BAD_REQUEST;
    protected static int $UNAUTHORIZED = self::UNAUTHORIZED;
    protected static int $PAYMENT_REQUIRED = self::PAYMENT_REQUIRED;

    protected static int $FORBIDDEN = self::FORBIDDEN;
    protected static int $NOT_FOUND = self::NOT_FOUND;
    protected static int $NOT_ALLOWED = self::NOT_ALLOWED;
    protected static int $REQUEST_TIMEOUT = self::REQUEST_TIMEOUT;
    protected static int $CONFLICT = self::CONFLICT;
    protected static int $UNPROCESSABLE_ENTITY = self::UNPROCESSABLE_ENTITY;
    protected static int $INTERNAL_SERVER_ERROR = self::INTERNAL_SERVER_ERROR;

    protected static int $GONE = self::GONE;
    protected static int $TEAPOT = self::TEAPOT;
    protected static int $FAILED_DEPENDENCY = self::FAILED_DEPENDENCY;
    protected static int $UPGRADE_REQUIRED = self::UPGRADE_REQUIRED;

    protected static int $UNAVAILABLE_FOR_LEGAL = self::UNAVAILABLE_FOR_LEGAL;
    protected static int $NOT_IMPLEMENTED = self::NOT_IMPLEMENTED;
    protected static int $SERVICE_UNAVAILABLE = self::SERVICE_UNAVAILABLE;
    protected static int $GATEWAY_TIMEOUT = self::GATEWAY_TIMEOUT;

    protected static int $NETWORK_AUTH_REQUIRED = self::NETWORK_AUTH_REQUIRED;
    protected static int $NOT_UPDATED = self::NOT_UPDATED;
    protected static int $VERSION_MISMATCH = self::VERSION_MISMATCH;
    protected static int $BANDWIDTH_LIMIT_EXCEEDED = self::BANDWIDTH_LIMIT_EXCEEDED;

    protected static array $POSITIVE_CODES_STATUS = [];
    protected static array $RESPONSE_CODES_STATUS = [];

     /**
     * @var int Status code for the response.
     */
    private $status;

    /**
     * @var mixed|null Data related to the response.
     */
    private $data;

    /**
     * @var mixed|null Error information for the response.
     */
    private $error;

    public function setStatus(int $status): void {
        $this->status = $status;
    }

    public function setData($data): void {
        $this->data = $this->status === self::SUCCESS ? $data : null;
    }

    public function setError($error): void {
        $this->error = $this->status !== self::SUCCESS ? $error : null;
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function getData() {
        return $this->data;
    }

    public function getError() {
        return $this->error;
    }

    /**
     * Constructor for the MyResponse class.
     *
     * @param int $status The status code for the response.
     * @param mixed|null $data Data related to the response.
     * @param mixed|null $error Error information for the response.
     */
    public function __construct(int $status, $data = null, $error = null) {
        $this->setStatus($status);
        $this->setData($data);
        $this->setError($error);
    }

    public function validateStatus(): bool {
        // Define any validation logic for the status code
        // For example, ensure it falls within a specific range
        return true; // Add your validation logic here
    }


}