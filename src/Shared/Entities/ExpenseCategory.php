<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Entities\Abstracts\AbstractExpenseCategory;
use PHPAssists\Shared\Entities\Interfaces\InterfaceExpenseCategory;

/**
 * PHPAssists Expense Category Entity
 *
 * This class represents individual expense categories within the PHPAssists framework.
 * It manages information related to expense categories.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
class ExpenseCategory extends AbstractExpenseCategory implements InterfaceExpenseCategory {
    // Properties

    /**
     * Unique identifier for the expense category.
     *
     * @var ?string
     */
    private $id;

    /**
     * Name of the expense category.
     *
     * @var ?string
     */
    private $category_name;

    // Getters

    /**
     * Retrieves the unique identifier for the expense category.
     *
     * @return ?string The expense category identifier or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Retrieves the name of the expense category.
     *
     * @return ?string The expense category name or null if not set.
     */
    public function getCategoryName() : ?string {
        return $this->category_name;
    }
    
    // Setters

    /**
     * Sets the unique identifier for the expense category.
     *
     * @param ?string $id The expense category identifier.
     *
     * @return void
     */
    public function setId(?string $id): void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the name of the expense category.
     *
     * @param ?string $category_name The expense category name.
     *
     * @return void
     */
    public function setCategoryName(?string $category_name): void {
        $this->category_name = isset($category_name) && !empty($category_name) && is_string($category_name) && trim($category_name) !== '' ? $category_name : null;
    }
}
?>
