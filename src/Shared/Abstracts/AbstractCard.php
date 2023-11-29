<?php
/**
 * PHPAssists Abstract Card
 *
 * This abstract class serves as a foundation for implementing concrete credit card classes. It defines the core functionalities and properties required for representing credit cards in the PHPAssists framework.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssosts
 * @subpackage PHPAssosts\Shared\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

 namespace PHPAssists\Shared\Abstracts;

 use PHPAssists\Shared\Core\ClassInvocationProcessor;
 
 /**
  * Abstract class AbstractCard
  *
  * This abstract class defines essential properties and methods for representing credit cards within the PHPAssists framework. It's intended to be extended by concrete credit card implementations.
  */
 abstract class AbstractCard extends ClassInvocationProcessor {
     /**
      * Unique identifier for the credit card.
      *
      * @var ?string
      */
     private ?string $id;
 
     /**
      * Type of the credit card, such as Visa, Mastercard, or American Express.
      *
      * @var ?string
      */
     private ?string $card_type;
 
     /**
      * Last four digits of the credit card number.
      *
      * @var ?string
      */
     private ?string $last_4_digits_card;
 
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
 
     /**
      * Retrieves the unique identifier for the credit card.
      *
      * @return ?string The card identifier or null if not set.
      */
     abstract public function getId(): ?string;
 
     /**
      * Sets the unique identifier for the credit card.
      *
      * @param ?string $id The card identifier.
      *
      * @return void
      */
     abstract public function setId(?string $id): void;
 
     /**
      * Retrieves the type of the credit card, such as Visa, Mastercard, or American Express.
      *
      * @return ?string The card type or null if not set.
      */
     abstract public function getCardType(): ?string;
 
     /**
      * Sets the type of the credit card.
      *
      * @param ?string $card_type The card type.
      *
      * @return void
      */
     abstract public function setCardType(?string $card_type): void;
 
     /**
      * Retrieves the last four digits of the credit card number.
      *
      * @return ?string The last four digits of the card number.
      */
     abstract public function getLast4DigitsCard(): ?string;
 
     /**
      * Sets the last four digits of the credit card number.
      *
      * @param ?string $last_4_digits_card The last four digits of the card number.
      *
      * @return void
      */
     abstract public function setLast4DigitsCard(?int $last_4_digits_card): void;
 
     /**
      * Abstract method for validating the last four digits of the credit card number.
      *
      * This method should perform validation to ensure that the last four digits follow the expected format for the specific credit card type.
      *
      * @return bool True if the last four digits are valid, false otherwise.
      */
     abstract public function validateLast4DigitsCard(): bool;
 }
 