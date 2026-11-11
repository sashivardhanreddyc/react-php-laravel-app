
<?php

require_once "day8_db.php";

$fromAccount = 1;
$toAccount = 2;
$amount = 1000;

try {

    if ($amount <= 0) {
        throw new Exception("Invalid transfer amount");
    }

    $pdo->beginTransaction();

    // Deduct money from Account A
    $stmt = $pdo->prepare("
        UPDATE accounts
        SET balance = balance - :amount
        WHERE id = :id
        AND balance >= :amount
    ");

    $stmt->execute([
        ':amount' => $amount,
        ':id' => $fromAccount
    ]);

    if ($stmt->rowCount() !== 1) {
        throw new Exception(
            "Insufficient balance or account not found"
        );
    }

    // Add money to Account B
    $stmt = $pdo->prepare("
        UPDATE accounts
        SET balance = balance + :amount
        WHERE id = :id
    ");

    $stmt->execute([
        ':amount' => $amount,
        ':id' => $toAccount
    ]);

    if ($stmt->rowCount() !== 1) {
        throw new Exception("Destination account not found");
    }

    // Save both operations
    $pdo->commit();

    echo "Transfer successful";

} catch (Throwable $e) {

    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    error_log($e->getMessage());

    echo "Transfer failed";

}

?>
