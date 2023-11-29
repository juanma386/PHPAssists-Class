<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class ExpenseCategory extends ClassInvocationProcessor {
    private $id = null;
    private $category_name = null;

    protected $table              = 'expense_categories'; 
    protected $primaryKey         = 'category_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['category_name'];
  
    public function __construct($id, $category_name) {
        $this->setId($id);
        $this->setCategoryName($category_name);
    }

    public function getId() : ?string {
        return $this->id;
    }

    public function getCategoryName() : ?string {
        return $this->category_name;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setCategoryName($category_name) : void {
        $this->category_name = isset($category_name) && !empty($category_name) && is_string($category_name) && trim($category_name) !== '' ? $category_name : null;
    }
}
