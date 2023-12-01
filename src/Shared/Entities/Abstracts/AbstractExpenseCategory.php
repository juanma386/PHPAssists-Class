<?php
namespace PHPAssists\Shared\Entities\Abstracts; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

/**
 * PHPAssists ExpenseCategory Abstract
 *
 * This class represents individual ExpenseCategory within the PHPAssists framework.
 * It manages information related to ExpenseCategory.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Abstract
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
class AbstractExpenseCategory extends ClassInvocationProcessor {

    /**
     * Constructor for the ExpenseCategory class.
     *
     * @param ?string $id The unique identifier for the expense category.
     * @param ?string $category_name The name of the expense category.
     */
    public function __construct(?string $id, ?string $category_name) {
        $this->setId($id);
        $this->setCategoryName($category_name);
    }
}