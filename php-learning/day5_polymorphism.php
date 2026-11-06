<?php
interface NotificationInterface{
    public function send($message);
}

class EmailNotification implements NotificationInterface{
    public function send($message){
        echo "Email sent: " . $message . "\n";
    }
}

class SMSNotification implements NotificationInterface{
    public function send($message){
        echo "SMS sent: " . $message . "\n";
    }
}

class WhatsappNotification implements NotificationInterface{
    public function send($message){
        echo "Whatsapp sent: " . $message . "\n";
    }
}

//Common method
function sendMessage(
    NotificationInterface $notification,
    $message
){
    $notification->send($message);
}

sendMessage(new EmailNotification, "Welcome to Email!");
sendMessage(new SMSNotification, "Welcome to SMS!");
sendMessage(new WhatsappNotification, "Welcome to Whatsapp!");

// New Requirement make telegram notification too
class TelegramNotification implements NotificationInterface{
    public function send($message){
        echo "Telegram Sent:" . $message . "\n";
    }
}

sendMessage(new TelegramNotification, "Welcome to Telegram!");

?>