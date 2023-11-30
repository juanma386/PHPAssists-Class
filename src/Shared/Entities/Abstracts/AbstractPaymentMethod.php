<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists PaymentMethod Abstract
 *
 * This class represents individual PaymentMethod within the PHPAssists framework.
 * It manages information related to PaymentMethod.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractPaymentMethod extends ClassInvocationProcessor {
     // Properties

    /**
     * Unique identifier for the payment method.
     *
     * @var ?string
     */
    private ?string $id = null;

    /**
     * Name of the payment method.
     *
     * @var ?string
     */
    private ?string $method_name = null;

    /**
     * Constructor for the PaymentMethod class.
     *
     * @param ?string $id The unique identifier for the payment method.
     * @param ?string $method_name The name of the payment method.
     */
    public function __construct(?string $id,?string $method_name) {
        $this->setId($id);
        $this->setMethodName($method_name);
    }
}