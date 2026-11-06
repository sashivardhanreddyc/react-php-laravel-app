<?php

abstract class Employee
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    // Abstract method
    abstract public function calculateSalary();

    // Normal method
    public function getName()
    {
        return $this->name;
    }
}

class FullTimeEmployee extends Employee
{
    public function calculateSalary()
    {
        return 50000;
    }
}

class PartTimeEmployee extends Employee
{
    public function calculateSalary()
    {
        return 20000;
    }
}

$employee1 = new FullTimeEmployee("Sashi");
$employee2 = new PartTimeEmployee("John");

echo $employee1->getName();
echo $employee1->calculateSalary();

echo "\n";

echo $employee2->getName();
echo $employee2->calculateSalary();