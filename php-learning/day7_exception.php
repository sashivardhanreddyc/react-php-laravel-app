<?php

function checkAge($age) {

    if ($age < 18) {
        throw new Exception(
            "User must be at least 18 years old"
        );

    }

    return "Access granted";
}

echo checkAge(15);

?>