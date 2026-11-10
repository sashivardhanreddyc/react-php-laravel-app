
<?php

header('Content-Type: application/json');

// Configuration
$uploadDirectory = __DIR__ . '/uploads/documents/';

$maxFileSize = 5 * 1024 * 1024; // 5 MB

$allowedMimeTypes = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'application/pdf' => 'pdf',
    'application/msword' => 'doc',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx'
];

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);

    exit;
}

// Check whether files were submitted
if (!isset($_FILES['documents'])) {
    http_response_code(400);

    echo json_encode([
        'success' => false,
        'message' => 'No files were uploaded.'
    ]);

    exit;
}

// Create storage directory if it does not exist
if (!is_dir($uploadDirectory)) {

    if (!mkdir($uploadDirectory, 0755, true)) {
        http_response_code(500);

        echo json_encode([
            'success' => false,
            'message' => 'Unable to create upload directory.'
        ]);

        exit;
    }
}

// File information
$files = $_FILES['documents'];

$uploadedFiles = [];
$errors = [];

$totalFiles = count($files['name']);

// Limit number of files
$maxFiles = 5;

if ($totalFiles > $maxFiles) {
    http_response_code(400);

    echo json_encode([
        'success' => false,
        'message' => "Maximum {$maxFiles} files are allowed."
    ]);

    exit;
}

// Initialize MIME detection
$finfo = new finfo(FILEINFO_MIME_TYPE);

// Process each file
foreach ($files['name'] as $index => $originalName) {

    $tmpName = $files['tmp_name'][$index];
    $fileSize = $files['size'][$index];
    $error = $files['error'][$index];

    // Validate upload error
    if ($error !== UPLOAD_ERR_OK) {

        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds server upload_max_filesize.',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds form MAX_FILE_SIZE.',
            UPLOAD_ERR_PARTIAL => 'File was partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Temporary directory is missing.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'Upload stopped by a PHP extension.'
        ];

        $errors[] = [
            'file' => $originalName,
            'error' => $uploadErrors[$error] ?? 'Unknown upload error.'
        ];

        continue;
    }

    // Validate temporary uploaded file
    if (!is_uploaded_file($tmpName)) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'Invalid uploaded file.'
        ];

        continue;
    }

    // Validate file size
    if ($fileSize <= 0 || $fileSize > $maxFileSize) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'File must be between 1 byte and 5 MB.'
        ];

        continue;
    }

    // Validate original filename
    $originalName = basename($originalName);

    if (strlen($originalName) > 255) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'Filename is too long.'
        ];

        continue;
    }

    // Validate MIME type using actual file content
    $mimeType = $finfo->file($tmpName);

    if (!isset($allowedMimeTypes[$mimeType])) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'File type is not allowed.'
        ];

        continue;
    }

    // Get validated extension
    $extension = $allowedMimeTypes[$mimeType];

    // Validate file extension too
    $originalExtension = strtolower(
        pathinfo($originalName, PATHINFO_EXTENSION)
    );

    if ($originalExtension !== $extension) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'File extension does not match its content.'
        ];

        continue;
    }

    // Generate unique filename
    $newFileName = bin2hex(random_bytes(16)) . '.' . $extension;

    // Final storage path
    $destination = $uploadDirectory . $newFileName;

    // Move uploaded file to storage
    if (!move_uploaded_file($tmpName, $destination)) {

        $errors[] = [
            'file' => $originalName,
            'error' => 'Failed to save uploaded file.'
        ];

        continue;
    }

    // Add successful upload information
    $uploadedFiles[] = [
        'original_name' => $originalName,
        'new_name' => $newFileName,
        'mime_type' => $mimeType,
        'size' => $fileSize,
        'path' => 'uploads/documents/' . $newFileName
    ];
}

// Return response
echo json_encode([
    'success' => count($uploadedFiles) > 0,
    'message' => count($uploadedFiles) . ' file(s) uploaded successfully.',
    'uploaded_files' => $uploadedFiles,
    'errors' => $errors
], JSON_PRETTY_PRINT);

?>
