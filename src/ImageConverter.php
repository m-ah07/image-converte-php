<?php

class ImageConverter
{
    private $imagePath;
    private $targetFormat;

    /**
     * Constructor to initialize the image path and target format.
     *
     * @param string $imagePath Path to the uploaded image.
     * @param string $targetFormat Desired output format (png, jpeg, gif, bmp).
     */
    public function __construct($imagePath, $targetFormat)
    {
        $this->imagePath = $imagePath;
        $this->targetFormat = strtolower($targetFormat);
    }

    /**
     * Converts the image to the specified format.
     *
     * @return string|false The converted image content or false on failure.
     */
    public function convert()
    {
        // Load the image into memory
        $imageResource = imagecreatefromstring(file_get_contents($this->imagePath));
        if (!$imageResource) {
            return false;
        }

        // Create an output buffer to capture the image content
        ob_start();

        // Save the image in the specified format
        switch ($this->targetFormat) {
            case 'png':
                imagepng($imageResource);
                break;
            case 'jpeg':
                imagejpeg($imageResource);
                break;
            case 'gif':
                imagegif($imageResource);
                break;
            case 'bmp':
                imagebmp($imageResource);
                break;
            default:
                return false;
        }

        // Capture the image content and free resources
        $imageContent = ob_get_clean();
        imagedestroy($imageResource);

        return $imageContent;
    }
}
?>
