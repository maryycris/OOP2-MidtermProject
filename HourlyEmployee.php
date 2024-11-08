<?php
require_once 'Employee.php';

class HourlyEmployee extends Employee {
    private int $hoursWorked;
    private float $hourlyRate;

    public function __construct(string $name, string $address, int $age, string $companyName, int $hoursWorked, float $hourlyRate) {
        parent::__construct($name, $address, $age, $companyName);
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate = $hourlyRate;
    }

    // Calculate earnings, with overtime pay for hours above 40
    public function earnings(): float {
        if ($this->hoursWorked <= 40) {
            return $this->hoursWorked * $this->hourlyRate;
        } else {
            $overtimeHours = $this->hoursWorked - 40;
            return (40 * $this->hourlyRate) + ($overtimeHours * $this->hourlyRate * 1.5);
        }
    }

    // Override __toString to include specific details for an HourlyEmployee
    public function __toString(): string {
        return parent::__toString() . ", Hours Worked: {$this->hoursWorked}, Hourly Rate: " . number_format($this->hourlyRate, 2);
    }
}
