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
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractExpense extends ClassInvocationProcessor {
    
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
