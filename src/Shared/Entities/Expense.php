<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Abstracts\AbstractExpense;
use PHPAssists\Shared\Interfaces\InterfaceExpense;
/**
 * PHPAssists Expense Entity
 *
 * This class represents individual expense entities within the PHPAssists framework.
 * It manages information related to expenses.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class Expense extends AbstractExpense implements InterfaceExpense {
    
    // Properties

    /**
     * Unique identifier for the expense entity.
     *
     * @var ?string
     */
    private ?string $id;

    /**
     * Category identifier for the expense.
     *
     * @var ?string
     */
    private ?string $category_id;

    /**
     * Description of the expense.
     *
     * @var ?string
     */
    private ?string $description;

    /**
     * Amount of the expense.
     *
     * @var ?float
     */
    private ?float $amount;

    /**
     * Date of the expense.
     *
     * @var ?string
     */
    private ?string $expense_date;

    // Getters

    /**
     * Retrieves the unique identifier for the expense entity.
     *
     * @return ?string The expense identifier or null if not set.
     */
    public function getId() : ?string {
        return $this->id;
    }

    /**
     * Retrieves the category identifier for the expense.
     *
     * @return ?string The category identifier or null if not set.
     */
    public function getCategoryId() : ?string {
        return $this->category_id;
    }

    /**
     * Retrieves the description of the expense.
     *
     * @return ?string The expense description or null if not set.
     */
    public function getDescription() : ?string {
        return $this->description;
    }

    /**
     * Retrieves the amount of the expense.
     *
     * @return float|null The expense amount or null if not set.
     */
    public function getAmount() : ? float {
        return $this->amount;
    }

    /**
     * Retrieves the date of the expense.
     *
     * @return ?string The expense date or null if not set.
     */
    public function getExpenseDate() : ?string {
        return $this->expense_date;
    }

    // Setters

    /**
     * Sets the unique identifier for the expense entity.
     *
     * @param ?string $id The expense identifier.
     *
     * @return void
     */
    public function setId(?string $id): void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    /**
     * Sets the category identifier for the expense.
     *
     * @param ?string $category_id The category identifier.
     *
     * @return void
     */
    public function setCategoryId(?string $category_id): void {
        $this->category_id = isset($category_id) && !empty($category_id) ? $category_id : null;
    }

    /**
     * Sets the description of the expense.
     *
     * @param ?string $description The expense description.
     *
     * @return void
     */
    public function setDescription(?string $description): void {
        $this->description = isset($description) && !empty($description) ? $description : null;
    }

    /**
     * Sets the amount of the expense.
     *
     * @param ?float $amount The expense amount.
     *
     * @return void
     */
    public function setAmount(?float $amount): void {
        $this->amount = isset($amount) && is_numeric($amount) ? $amount : null;
    }

    /**
     * Sets the date of the expense.
     *
     * @param ?string $expense_date The expense date.
     *
     * @return void
     */
    public function setExpenseDate(?string $expense_date): void {
        // Here additional validation can be added to check the date and time format if necessary.
        $this->expense_date = isset($expense_date) ? $expense_date : null;
    }
}
?>
