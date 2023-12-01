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
    protected static int $BAD_REQUEST = self::BAD_REQUEST;
    

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

    public function setStatus(?int $status): void {
        $this->status = isset($status) ? $status : self::$BAD_REQUEST;
    }

    public function setData($data): void {
        $this->data = isset($data) ? $data : null;
    }

    public function setError($error): void {
        $this->error = isset($error) ? $error : null;
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