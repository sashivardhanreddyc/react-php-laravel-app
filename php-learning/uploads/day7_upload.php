<?php
if($_SERVER('REQUEST_METHOD' === "POST")){
    $file = $_FILES['profile_image'];
    
    // check upload errors
    if($file['error'] !== UPLOAD_ERR_OK){
        die("File Upload failed");
    }

    //validate file size(max 2 mb)
    $maxSize = 2 * 1024 * 1024;
    if($file['size'] > $maxSize){
        die("file size must less than 2 MB");
    }

    //validate actual MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);
    $allowedTypes = [
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/webp" => "webp",
    ];
    if(!isset($allowedTypes[$mimeType])){
        die("Only jpg, png, webp are allowed");
    }

    //Generate a unique filename
    $newFileName = bin2hex(random_bytes(16)) . '.' . $allowedTypes[$mimeType];

    // Define Destination
    $destination = __DIR__ . '/uploads/' . $newFileName;

    //Move temperary file to permanent location
    if(move_uploaded_file($file['tmp_name'], $destination)){
        echo "Image Uploaded Successfully";
    } else{
        echo "Unable to save the image";
    }
}

?>