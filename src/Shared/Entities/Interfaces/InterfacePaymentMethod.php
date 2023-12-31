<?php
namespace PHPAssists\Shared\Entities\Interfaces; 

/**
 * PHPAssists PaymentMethod Abstract
 *
 * This class represents individual PaymentMethod abstract within the PHPAssists framework.
 * It manages information related to PaymentMethods.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
interface InterfacePaymentMethod {
     // Getters

    /**
     * Retrieves the unique identifier for the payment method.
     *
     * @return ?string The payment method identifier or null if not set.
     */
    public function getId() : ?string;

    /**
     * Retrieves the name of the payment method.
     *
     * @return ?string The payment method name or null if not set.
     */
    public function getMethodName() : ?string;
    
    // Setters

    /**
     * Sets the unique identifier for the payment method.
     *
     * @param ?string $id The payment method identifier.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the name of the payment method.
     *
     * @param ?string $method_name The payment method name.
     *
     * @return void
     */
    public function setMethodName(?string $method_name): void;
}