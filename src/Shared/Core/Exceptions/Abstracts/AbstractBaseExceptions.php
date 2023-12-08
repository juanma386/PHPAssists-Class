<?php
namespace PHPAssists\Shared\Core\Exceptions\Abstracts;

abstract class AbstractBaseExceptions extends Exception {
    abstract public function log(?string $message) : ?string;
    public function errorMessage() : ?string {
        $errorMsg = 'Error: '.$this->getMessage();
        return $errorMsg;
    }
}