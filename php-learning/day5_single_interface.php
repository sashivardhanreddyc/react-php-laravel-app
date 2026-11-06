<?php

interface IPaymentInterface{
    public function pay($amount);
}

class CreditCardPayment implements IPaymentInterface{
    public function pay($amount){
        echo "Paid $amount in the credit card";
    }
}

class UPIPayment implements IPaymentInterface{
    public function pay($amount){
        echo "Paid $amount in UPI";
    }
}

$card = new CreditCardPayment();
$upi = new UPIPayment();

$card->pay(1000);
echo "\n";
$upi->pay(500);

?>