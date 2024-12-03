<?php

/**
 * Helper function to validate the uploaded image file.
 *
 * @param array $file Uploaded file information from $_FILES.
 * @return bool True if the file is a valid image, otherwise false.
 */
function isValidImage($file)
{
    return isset($file['tmp_name']) && exif_imagetype($file['tmp_name']);
}
?>
