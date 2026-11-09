<?php 

// File paths
$inputFile = __DIR__ . "/files/day6_users.txt";
$outputDirectory = __DIR__ . "/reports";
$outputFile = $outputDirectory . "/day6_active_users.txt";

// Check whether input file exists
if(!is_file($inputFile)){
    die("Input File doesnot exist");
}

// Read input file
$content = file_get_contents($inputFile);
if($content === false){
    die("Unable to read input file");
}

//convert file content into an array
$users = preg_split("/\r\n|\n\r/", trim($content));
$activeUsers = [];

//process each user
foreach($users as $user){
    $userDetails = explode(",", $user);
    if(count($userDetails) !== 2){
        continue;
    }

    $name = trim($userDetails[0]);
    $status = trim($userDetails[1]);

    if($status === "active"){
        $activeUsers[] = $name;
    }
}

// Create output directory if necessary
if (!is_dir($outputDirectory)) {
    if (!mkdir($outputDirectory, 0775, true)) {
        die("Unable to create output directory");
    }
}


// Convert active users into text
$result = implode(PHP_EOL, $activeUsers);


// Write processed data into output file
$written = file_put_contents(
    $outputFile,
    $result
);

if ($written === false) {
    die("Unable to write output file");
}


// Display success message
echo "Active users processed successfully!";


?>