<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists Expense Abstract
 *
 * This class represents individual expense within the PHPAssists framework.
 * It manages information related to expenses.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractExpense extends ClassInvocationProcessor {
    
    
    /**
     * Constructor for the Expense class.
     *
     * @param ?string $id The unique identifier for the expense.
     * @param ?string $category_id The category identifier for the expense.
     * @param ?string $description The description of the expense.
     * @param ?float $amount The amount of the expense.
     * @param ?string $expense_date The date of the expense.
     */
    public function __construct(?string $id, ?string $category_id, ?string $description, ?float $amount, ?string $expense_date) {
        $this->setId((string) $id);
        $this->setCategoryId((string) $category_id);
        $this->setDescription((string) $description);
        $this->setAmount((float) $amount);
        $this->setExpenseDate((string) $expense_date);
    }

  
}
?>
