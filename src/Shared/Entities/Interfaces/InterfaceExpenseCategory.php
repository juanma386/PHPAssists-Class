<?php
namespace PHPAssists\Shared\Entities\Interfaces; 

/**
 * PHPAssists Expense Abstract
 *
 * This class represents individual expense abstract within the PHPAssists framework.
 * It manages information related to expenses.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Interfaces
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
interface InterfaceExpenseCategory {
    // Getters

    /**
     * Retrieves the unique identifier for the expense category.
     *
     * @return ?string The expense category identifier or null if not set.
     */
    public function getId() : ?string;

    /**
     * Retrieves the name of the expense category.
     *
     * @return ?string The expense category name or null if not set.
     */
    public function getCategoryName() : ?string;
    
    // Setters

    /**
     * Sets the unique identifier for the expense category.
     *
     * @param ?string $id The expense category identifier.
     *
     * @return void
     */
    public function setId(?string $id): void;

    /**
     * Sets the name of the expense category.
     *
     * @param ?string $category_name The expense category name.
     *
     * @return void
     */
    public function setCategoryName(?string $category_name): void;
} 