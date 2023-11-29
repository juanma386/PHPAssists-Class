<?php 
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class PaymentMethod extends ClassInvocationProcessor {
    private $id = null;
    private $method_name = null;

    protected $table              = 'payment_methods'; 
    protected $primaryKey         = 'payment_method_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['method_name'];
  
    public function __construct($id, $method_name) {
        $this->setId($id);
        $this->setMethodName($method_name);
    }

    public function getId() : ?string {
        return $this->id;
    }

    public function getMethodName() : ?string {
        return $this->method_name;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setMethodName($method_name) : void {
        $this->method_name = isset($method_name) && !empty($method_name) ? $method_name : null;
    }
}
