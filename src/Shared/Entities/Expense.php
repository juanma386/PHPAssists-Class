<?php

namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class Expense extends ClassInvocationProcessor {
    private $id = null;
    private $category_id = null;
    private $description = null;
    private $amount = null;
    private $expense_date = null;

    protected $table              = 'expenses'; 
    protected $primaryKey         = 'expense_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['category_id', 'description', 'amount', 'expense_date'];
  
    public function __construct($id, $category_id, $description, $amount, $expense_date) {
        $this->setId($id);
        $this->setCategoryId($category_id);
        $this->setDescription($description);
        $this->setAmount($amount);
        $this->setExpenseDate($expense_date);
    }

    public function getId() : ?string {
        return $this->id;
    }

    public function getCategoryId() : ?string {
        return $this->category_id;
    }

    public function getDescription() : ?string {
        return $this->description;
    }

    public function getAmount() : float | null {
        return $this->amount;
    }

    public function getExpenseDate() : ?string {
        return $this->expense_date;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setCategoryId($category_id) : void {
        $this->category_id = isset($category_id) && !empty($category_id) ? $category_id : null;
    }

    public function setDescription($description) : void {
        $this->description = isset($description) && !empty($description) ? $description : null;
    }

    public function setAmount($amount) : void {
        $this->amount = isset($amount) && is_numeric($amount) ? $amount : null;
    }

    public function setExpenseDate($expense_date) : void {
        // Aquí se puede agregar validación adicional para verificar el formato de fecha y hora si es necesario.
        $this->expense_date = isset($expense_date) ? $expense_date : null;
    }
}
