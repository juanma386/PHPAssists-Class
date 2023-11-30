<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Entities\Abstracts\AbstractCard;
use PHPAssists\Shared\Entities\Interfaces\InterfaceCard;

/**
 * PHPAssists Card Entity
 *
 * This class represents individual card entities within the PHPAssists framework.
 * It manages information related to credit or debit cards.
 *
  * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class Card extends AbstractCard implements InterfaceCard {
    
    // Properties

    /**
     * Unique identifier for the card entity.
     *
     * @var ?string
     */
    private $id;

    /**
     * Type of the card (e.g., Visa, Mastercard, etc.).
     *
     * @var ?string
     */
    private $card_type;

    /**
     * Last four digits of the card number.
     *
     * @var ?string
     */
    private $last_4_digits_card;

    /**
     * Constructor for the Card class.
     *
     * @param ?string $id The unique identifier for the card.
     * @param ?string $card_type The type of the card.
     * @param ?string $last_4_digits_card The last four digits of the card number.
     */
    public function __construct(?string $id, ?string $card_type, ?string $last_4_digits_card) {
        $this->setId($id);
        $this->setCardType($card_type);
        $this->setLast4DigitsCard($last_4_digits_card);
    }

    // Getters

    /**
     * Retrieves the unique identifier for the card entity.
     *
     * @return ?string The card identifier or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Retrieves the type of the card.
     *
     * @return ?string The card type or null if not set.
     */
    public function getCardType() : ?string {
        return $this->card_type;
    }

    /**
     * Retrieves the last four digits of the card number.
     *
     * @return ?string The last four digits of the card number or null if not set.
     */
    public function getLast4DigitsCard() : ?string {
        return $this->last_4_digits_card;
    }

    // Setters

    /**
     * Sets the unique identifier for the card entity.
     *
     * @param ?string $id The card identifier.
     *
     * @return void
     */
    public function setId(?string $id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the type of the card.
     *
     * @param ?string $card_type The card type.
     *
     * @return void
     */
    public function setCardType(?string $card_type) : void {
        $this->card_type = isset($card_type) && !empty($card_type) && is_string($card_type) && trim($card_type) !== '' ? $card_type : null;
    }

    /**
     * Sets the last four digits of the card number.
     *
     * @param ?int $last_4_digits_card The last four digits of the card number.
     *
     * @return void
     */
    public function setLast4DigitsCard(?int $last_4_digits_card) : void {
        $this->last_4_digits_card = isset($last_4_digits_card) && !empty($last_4_digits_card) ? $last_4_digits_card : null;
    }

    /**
     * Abstract method for validating the last four digits of the card number.
     *
     * This method checks if the last four digits follow the expected format for a card.
     *
     * @return bool True if the last four digits are valid, false otherwise.
     */
    public function validateLast4DigitsCard() : bool {
        return isset($this->last_4_digits_card) && !empty($this->last_4_digits_card) && preg_match('/^\d{4}$/', $this->last_4_digits_card);
    }
}
?>
