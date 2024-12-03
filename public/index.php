<?php
// Include the core logic for image conversion
require_once '../src/ImageConverter.php';

// Define the upload directory
define('UPLOAD_DIR', '../uploads/');

// Create the upload directory if it does not exist
if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}

// Handle form submission for image conversion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && isset($_POST['format'])) {
        // Retrieve the uploaded file and target format
        $uploadedFile = $_FILES['image'];
        $targetFormat = $_POST['format'];

        // Ensure the uploaded file is an image
        if ($uploadedFile['error'] === UPLOAD_ERR_OK && exif_imagetype($uploadedFile['tmp_name'])) {
            // Instantiate the ImageConverter class
            $converter = new ImageConverter($uploadedFile['tmp_name'], $targetFormat);
            $convertedImage = $converter->convert();

            if ($convertedImage) {
                $outputFilePath = UPLOAD_DIR . uniqid('converted_', true) . ".$targetFormat";

                // Save the converted image to the output path
                file_put_contents($outputFilePath, $convertedImage);

                echo "Image successfully converted. <a href='$outputFilePath' download>Download</a>";
            } else {
                echo "Image conversion failed.";
            }
        } else {
            echo "Invalid image file.";
        }
    } else {
        echo "No image file or target format provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Converter</title>
</head>
<body>
    <h1>Image Format Converter</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" required>
        
        <label for="format">Select Format:</label>
        <select name="format" id="format" required>
            <option value="png">PNG</option>
            <option value="jpeg">JPEG</option>
            <option value="gif">GIF</option>
            <option value="bmp">BMP</option>
        </select>
        
        <button type="submit">Convert</button>
    </form>
</body>
</html>
