<?php
require_once 'Employee.php';

class CommissionEmployee extends Employee {
    private float $totalSales;
    private float $commissionRate;

    public function __construct(string $name, string $address, int $age, string $companyName, float $totalSales, float $commissionRate) {
        parent::__construct($name, $address, $age, $companyName);
        $this->totalSales = $totalSales;
        $this->commissionRate = $commissionRate;
    }

    // Calculate earnings based on total sales and commission rate
    public function earnings(): float {
        return $this->totalSales * $this->commissionRate;
    }

    // Override __toString to include specific details for a CommissionEmployee
    public function __toString(): string {
        return parent::__toString() . ", Total Sales: " . number_format($this->totalSales, 2) . ", Commission Rate: " . number_format($this->commissionRate * 100, 2) . "%";
    }
}
