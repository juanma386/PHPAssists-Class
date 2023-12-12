<?php
namespace PHPAssists\Shared\Entities\Interfaces; 

/**
 * PHPAssists Expense Abstract
 *
 * This class represents individual expense abstract within the PHPAssists framework.
 * It manages information related to expenses.
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
interface InterfaceExpense {
    
    
    // Getters

    /**
     * Retrieves the unique identifier for the expense entity.
     *
     * @return ?string The expense identifier or null if not set.
     */
    public function getId() : ?string;

    /**
     * Retrieves the category identifier for the expense.
     *
     * @return ?string The category identifier or null if not set.
     */
    public function getCategoryId() : ?string;

    /**
     * Retrieves the description of the expense.
     *
     * @return ?string The expense description or null if not set.
     */
    public function getDescription() : ?string;

    /**
     * Retrieves the amount of the expense.
     *
     * @return float|null The expense amount or null if not set.
     */
    public function getAmount() : ? float;

    /**
     * Retrieves the date of the expense.
     *
     * @return ?string The expense date or null if not set.
     */
    public function getExpenseDate() : ?string;

    // Setters

    /**
     * Sets the unique identifier for the expense entity.
     *
     * @param ?string $id The expense identifier.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the category identifier for the expense.
     *
     * @param ?string $category_id The category identifier.
     *
     * @return void
     */
    public function setCategoryId(?string $category_id): void;

    /**
     * Sets the description of the expense.
     *
     * @param ?string $description The expense description.
     *
     * @return void
     */
    public function setDescription(?string $description): void;

    /**
     * Sets the amount of the expense.
     *
     * @param ?float $amount The expense amount.
     *
     * @return void
     */
    public function setAmount(?float $amount): void;

    /**
     * Sets the date of the expense.
     *
     * @param ?string $expense_date The expense date.
     *
     * @return void
     */
    public function setExpenseDate(?string $expense_date): void;
}
?>
