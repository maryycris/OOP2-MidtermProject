<?php

class Person {
    protected string $name;
    protected string $address;
    protected int $age;

    public function __construct(string $name, string $address, int $age) {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
    }

    // Getters for the properties (optional if needed for other purposes)
    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getAge(): int {
        return $this->age;
    }

    // A method to display the person's details as a string
    public function __toString(): string {
        return "Name: {$this->name}, Address: {$this->address}, Age: {$this->age}";
    }
}
