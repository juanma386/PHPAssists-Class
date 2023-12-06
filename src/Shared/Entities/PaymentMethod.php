<?php 
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Entities\Abstracts\AbstractPaymentMethod;
use PHPAssists\Shared\Entities\Interfaces\InterfacePaymentMethod;

/**
 * PHPAssists Payment Method Entity
 *
 * This class represents individual payment methods within the PHPAssists framework.
 * It manages information related to payment methods used by the system.
 *
* @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class PaymentMethod extends AbstractPaymentMethod implements InterfacePaymentMethod {
 
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

    // Getters

    /**
     * Retrieves the unique identifier for the payment method.
     *
     * @return ?string The payment method identifier or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Retrieves the name of the payment method.
     *
     * @return ?string The payment method name or null if not set.
     */
    public function getMethodName() : ?string {
        return $this->method_name;
    }
    
    // Setters

    /**
     * Sets the unique identifier for the payment method.
     *
     * @param ?string $id The payment method identifier.
     *
     * @return void
     */
    public function setId(?string $id): void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the name of the payment method.
     *
     * @param ?string $method_name The payment method name.
     *
     * @return void
     */
    public function setMethodName(?string $method_name): void {
        $this->method_name = isset($method_name) && !empty($method_name) ? $method_name : null;
    }
}
?>

