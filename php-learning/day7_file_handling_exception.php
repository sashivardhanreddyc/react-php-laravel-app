<?php

function readFileContent($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("File does not exist");
    }

    $content = file_get_contents($filePath);

    if ($content === false) {
        throw new Exception("Unable to read file");
    }

    return $content;

}

try {
    $content = readFileContent("day6_users.txt");
    echo $content;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>