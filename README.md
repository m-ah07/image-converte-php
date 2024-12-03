# Image Converter (PHP)

**Image Converter PHP** is a lightweight and efficient PHP script for converting images between multiple formats, including **PNG**, **JPEG**, **GIF**, and **BMP**. This tool is designed to simplify image conversion tasks while maintaining high performance and easy integration.

---

## Features

- **Multi-format Conversion**: Supports conversion between PNG, JPEG, GIF, and BMP formats.
- **Lightweight and Fast**: Written in PHP for quick processing.
- **Easy Integration**: Straightforward to use in your projects.
- **Customizable**: Easily extendable to include more features.

## Requirements

- **PHP 7.4** or later
- **GD Library**: Make sure the PHP GD extension is installed and enabled.

## Installation

1. Clone this repository to your local machine:
   
   ```bash
   git clone https://github.com/marwan-ahmed-23/image-converte-php.git
   ```

2. Ensure your server meets the requirements:
   
     - PHP 7.4 or later
     - GD Library enabled in your PHP configuration (`php.ini`).

3. Place the project files in your desired directory on your web server.

## Usage

1. Access the script through your preferred development environment or web server.
2. Use the following example code to convert an image:
   
    ```bash
    require_once 'converter.php';
    
    // Path to the input image
    $inputPath = 'path/to/your/input/image.png';
    
    // Desired output format
    $outputFormat = 'jpeg'; // Options: png, jpeg, gif, bmp
    
    // Output path for the converted image
    $outputPath = 'path/to/output/image.jpeg';
    
    // Convert the image
    if (convertImage($inputPath, $outputFormat, $outputPath)) {
        echo "Image successfully converted to $outputFormat!";
    } else {
        echo "Image conversion failed.";
    }
    ```

## Directory Structure

image-converte-php/
├── public/
│   └── index.php          # Core script for image conversion
├── examples/              # Folder containing usage examples
│   └── example.php        # Sample implementation
├── .gitignore             # Git ignore file
└── README.md              # Project documentation

## Contributing

Contributions are welcome! Please fork this repository, make your changes, and submit a pull request.

