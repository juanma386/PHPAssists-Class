<?php
/**
 * PHPAssists HTTP API Interface
 *
 * This interface defines methods related to HTTP status, data, and error handling for the PHPAssists HTTP API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Response\Interfaces
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Response\Interfaces;

interface InterfaceHTTP {
    /**
     * Sets the HTTP status.
     *
     * @param ?int $status The HTTP status code.
     *
     * @return void
     */
    public function setStatus(?int $status): void;

    /**
     * Sets the data for the HTTP response.
     *
     * @param ?mixed $data The data to be set.
     *
     * @return void
     */
    public function setData(?mixed $data): void;

    /**
     * Sets the error for the HTTP response.
     *
     * @param ?mixed $error The error to be set.
     *
     * @return void
     */
    public function setError(?mixed $error): void;

    /**
     * Retrieves the HTTP status.
     *
     * @return int The HTTP status code.
     */
    public function getStatus(): int;

    /**
     * Retrieves the data from the HTTP response.
     *
     * @return ?mixed The data retrieved from the response.
     */
    public function getData(): ?mixed;

    /**
     * Retrieves the error from the HTTP response.
     *
     * @return ?mixed The error retrieved from the response.
     */
    public function getError(): ?mixed;

    /**
     * Validates the HTTP status.
     *
     * @return bool True if the status is valid, false otherwise.
     */
    public function validateStatus(): bool;
}
