<?php

trait LoggerTrait
{
    public function log($message)
    {
        echo "LOG: " . $message;
    }
}

class UserService
{
    use LoggerTrait;

    public function createUser()
    {
        $this->log("User created successfully");
    }
}

class PaymentService
{
    use LoggerTrait;

    public function processPayment()
    {
        $this->log("Payment processed successfully");
    }
}

$userService = new UserService();
$userService->createUser();

echo "\n";

$paymentService = new PaymentService();
$paymentService->processPayment();