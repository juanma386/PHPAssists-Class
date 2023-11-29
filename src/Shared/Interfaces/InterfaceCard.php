<?php

/**
 * PHPAssists Card Interface
 *
 * This interface defines the required methods for representing a credit card in the PHPAssists framework.
 * It provides a standardized structure for handling credit card information and ensures consistency across the application.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssosts
 * @subpackage PHPAssists\Shared\Interfaces
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Interfaces;

interface InterfaceCard {

    /**
     * Retrieves the unique identifier for the credit card.
     *
     * @return ?string The card identifier or null if not set.
     */
    public function getId(): ?string;

    /**
     * Retrieves the type of the credit card, such as Visa, Mastercard, or American Express.
     *
     * @return ?string The card type or null if not set.
     */
    public function getCardType(): ?string;

    /**
     * Retrieves the last four digits of the credit card number.
     *
     * @return ?string The last four digits of the card number or null if not set.
     */
    public function getLast4DigitsCard(): ?string;

    /**
     * Sets the unique identifier for the credit card.
     *
     * @param ?string $id The card identifier.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the type of the credit card.
     *
     * @param ?string $card_type The card type.
     *
     * @return void
     */
    public function setCardType(?string $card_type): void;

    /**
     * Sets the last four digits of the credit card number.
     *
     * @param ?string $last_4_digits_card The last four digits of the card number.
     *
     * @return void
     */
    public function setLast4DigitsCard(?int $last_4_digits_card): void;

    /**
     * Validates the last four digits of the credit card number to ensure it follows the expected format.
     *
     * @return bool True if the last four digits are valid, false otherwise.
     */
    public function validateLast4DigitsCard(): bool;
}