<?php

require_once 'EmployeeRoster.php';

class Main {

    private EmployeeRoster $roster;
    private int $size;
    private bool $repeat;

    public function __construct() {
        $this->roster = new EmployeeRoster();
    }

    public function start() {
        $this->clear();
        $this->repeat = true;

        $this->size = (int) readline("Enter the size of the roster: ");

        if ($this->size < 1) {
            echo "Invalid input. Please try again.\n";
            readline("Press \"Enter\" key to continue...");
            $this->start();
        } else {
            $this->entrance();
        }
    }

    public function entrance() {
        while ($this->repeat) {
            $this->clear();
            $this->menu();
            $choice = (int) readline("Enter your choice: ");
            
            switch ($choice) {
                case 1:
                    $this->addMenu();
                    break;
                case 2:
                    $this->deleteMenu();
                    break;
                case 3:
                    $this->otherMenu();
                    break;
                case 0:
                    $this->repeat = false;
                    break;
                default:
                    echo "Invalid input. Please try again.\n";
                    readline("Press \"Enter\" key to continue...");
            }
        }
        echo "Process terminated.\n";
    }

    public function menu() {
        echo "*** EMPLOYEE ROSTER MENU ***\n";
        echo "[1] Add Employee\n";
        echo "[2] Delete Employee\n";
        echo "[3] Other Menu\n";
        echo "[0] Exit\n";
    }

    public function addMenu() {
        $name = readline("Enter name: ");
        $address = readline("Enter address: ");
        $age = (int) readline("Enter age: ");
        $companyName = readline("Enter company name: ");

        $this->empType($name, $address, $age, $companyName);
    }

    public function empType($name, $address, $age, $companyName) {
        echo "[1] Commission Employee\n";
        echo "[2] Hourly Employee\n";
        echo "[3] Piece Worker\n";
        $type = (int) readline("Type of Employee: ");

        switch ($type) {
            case 1:
                $this->addOnsCE($name, $address, $age, $companyName);
                break;
            case 2:
                $this->addOnsHE($name, $address, $age, $companyName);
                break;
            case 3:
                $this->addOnsPE($name, $address, $age, $companyName);
                break;
            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                $this->empType($name, $address, $age, $companyName);
                break;
        }
    }

    public function addOnsCE($name, $address, $age, $companyName) {
        $commissionRate = (float) readline("Enter commission rate: ");
        $sales = (float) readline("Enter total sales: ");
        $employee = new CommissionEmployee($name, $address, $age, $companyName, $commissionRate, $sales);
        $this->roster->addEmployee($employee);
        $this->repeat();
    }

    public function addOnsHE($name, $address, $age, $companyName) {
        $hoursWorked = (int) readline("Enter hours worked: ");
        $rate = (float) readline("Enter hourly rate: ");
        $employee = new HourlyEmployee($name, $address, $age, $companyName, $hoursWorked, $rate);
        $this->roster->addEmployee($employee);
        $this->repeat();
    }

    public function addOnsPE($name, $address, $age, $companyName) {
        $piecesProduced = (int) readline("Enter pieces produced: ");
        $ratePerPiece = (float) readline("Enter rate per piece: ");
        $employee = new PieceWorker($name, $address, $age, $companyName, $piecesProduced, $ratePerPiece);
        $this->roster->addEmployee($employee);
        $this->repeat();
    }

    public function deleteMenu() {
        $this->clear();
        $name = readline("Enter the name of the employee to delete: ");
        $this->roster->removeEmployee($name);
        readline("Press \"Enter\" key to continue...");
    }

    public function otherMenu() {
        $this->clear();
        echo "[1] Display All Employees\n";
        echo "[2] Count Employees\n";
        echo "[3] Calculate Total Payroll\n";
        echo "[0] Return\n";
        $choice = (int) readline("Select Menu: ");

        switch ($choice) {
            case 1:
                $this->roster->displayAllEmployees();
                break;
            case 2:
                echo "Total Employees: " . $this->roster->countEmployees() . "\n";
                break;
            case 3:
                echo "Total Payroll: " . number_format($this->roster->calculateTotalPayroll(), 2) . "\n";
                break;
            case 0:
                break;
            default:
                echo "Invalid input. Please try again.\n";
        }
        readline("Press \"Enter\" key to continue...");
    }

    public function clear() {
        system('clear');
    }

    public function repeat() {
        echo "Employee added successfully!\n";
        if ($this->roster->countEmployees() < $this->size) {
            $c = readline("Add more? (y to continue): ");
            if (strtolower($c) == 'y') {
                $this->addMenu();
            }
        } else {
            echo "Roster is full.\n";
        }
        readline("Press \"Enter\" key to continue...");
    }
}
