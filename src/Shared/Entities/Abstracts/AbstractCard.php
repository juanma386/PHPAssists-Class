<?php
/**
 * PHPAssists Abstract Card
 *
 * This abstract class serves as a foundation for implementing concrete credit card classes. It defines the core functionalities and properties required for representing credit cards in the PHPAssists framework.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssosts
 * @subpackage PHPAssosts\Shared\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

 namespace PHPAssists\Shared\Entities\Abstracts;

 use PHPAssists\Shared\Core\ClassInvocationProcessor;
 
 /**
  * Abstract class AbstractCard
  *
  * This abstract class defines essential properties and methods for representing credit cards within the PHPAssists framework. It's intended to be extended by concrete credit card implementations.
  */
 abstract class AbstractCard extends ClassInvocationProcessor {
     
     /**
      * Constructor for the AbstractCard class.
      *
      * @param ?string $id The unique identifier for the credit card.
      * @param ?string $card_type The type of the credit card.
      * @param ?string $last_4_digits_card The last four digits of the credit card number.
      */
     public function __construct(?string $id, ?string $card_type, ?string $last_4_digits_card) {
         $this->setId($id);
         $this->setCardType($card_type);
         $this->setLast4DigitsCard($last_4_digits_card);
     }
 }
 