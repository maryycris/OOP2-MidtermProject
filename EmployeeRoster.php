<?php
require_once 'Employee.php';

class EmployeeRoster {
    private array $employees = [];

    // Adds an employee to the roster
    public function addEmployee(Employee $employee): void {
        $this->employees[] = $employee;
        echo "Employee added: " . $employee->getName() . "\n";
    }

    // Removes an employee from the roster by name
    public function removeEmployee(string $name): bool {
        foreach ($this->employees as $index => $employee) {
            if ($employee->getName() === $name) {
                unset($this->employees[$index]);
                $this->employees = array_values($this->employees); // reindex the array
                echo "Employee removed: $name\n";
                return true;
            }
        }
        echo "Employee not found: $name\n";
        return false;
    }

    // Displays all employees in the roster
    public function displayAllEmployees(): void {
        if (empty($this->employees)) {
            echo "No employees in the roster.\n";
        } else {
            foreach ($this->employees as $employee) {
                echo $employee . "\n";
            }
        }
    }

    // Counts employees by type, or all employees if no type is specified
    public function countEmployees(string $type = ""): int {
        if ($type === "") {
            return count($this->employees);
        }
        
        $count = 0;
        foreach ($this->employees as $employee) {
            if (get_class($employee) === $type) {
                $count++;
            }
        }
        return $count;
    }

    // Calculates total payroll for all employees
    public function calculateTotalPayroll(): float {
        $totalPayroll = 0.0;
        foreach ($this->employees as $employee) {
            $totalPayroll += $employee->earnings();
        }
        return $totalPayroll;
    }
}
