<?php
require_once 'Person.php';

abstract class Employee extends Person {
    protected string $companyName;

    public function __construct(string $name, string $address, int $age, string $companyName) {
        parent::__construct($name, $address, $age);
        $this->companyName = $companyName;
    }

    // Abstract method to be implemented by subclasses
    abstract public function earnings(): float;

    // Getter for companyName (optional)
    public function getCompanyName(): string {
        return $this->companyName;
    }

    // Overriding the __toString method to include company name and earnings
    public function __toString(): string {
        return parent::__toString() . ", Company: {$this->companyName}, Earnings: " . number_format($this->earnings(), 2);
    }
}
