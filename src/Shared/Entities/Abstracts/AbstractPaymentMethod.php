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
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
class AbstractPaymentMethod extends ClassInvocationProcessor {


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