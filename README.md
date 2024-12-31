
# CheckType

A library to validate file types such as images and documents.

## Installation

Via Composer:

```bash
composer require cecostadev/check-type
```

## Usage

Here are some examples on how to use the `CheckType` library in your PHP projects.

### Validate an Image

```php
<?php

require 'vendor/autoload.php';

use App\Core\CheckType;

// Instantiate the CheckType class
$checkType = new CheckType();

// Define the file type to validate
$fileType = 'png';

// Validate if the file type is a supported image
if ($checkType->validateImage($fileType)) {
    echo "Valid Image.";
} else {
    echo "Invalid Image.";
}
```
**Output:**
```
Valid Image.
```

### Validate a Document

```php
<?php

require 'vendor/autoload.php';

use App\Core\CheckType;

// Instantiate the CheckType class
$checkType = new CheckType();

// Define the file type to validate
$fileType = 'pdf';

// Validate if the file type is a supported document
if ($checkType->validateDocument($fileType)) {
    echo "Valid Document.";
} else {
    echo "Invalid Document.";
}
```
**Output:**
```
Invalid Document.
```

### Add and Validate a New Category

You can add new categories with their associated file extensions dynamically and validate file types against these custom categories.

```php
<?php

require 'vendor/autoload.php';

use App\Core\CheckType;

// Instantiate the CheckType class
$checkType = new CheckType();

// Add a new category 'audio' with supported file extensions
$checkType->addCategory('audio', ['mp3', 'wav']);

// Define the file type and category to validate
$fileType = 'mp3';
$category = 'audio';

// Validate if the file type belongs to the 'audio' category
if ($checkType->validateByCategory($fileType, $category)) {
    echo "Valid Audio File.";
} else {
    echo "Invalid Audio File.";
}
```
**Output:**
```
Valid Audio File.
```

### Validate Using Generic Method

In addition to the specific validation methods, you can use the generic `validate` method to check against any list of file types.

```php
<?php

require 'vendor/autoload.php';

use App\Core\CheckType;

// Instantiate the CheckType class
$checkType = new CheckType();

// Define the file type and a custom list to validate against
$fileType = 'gif';
$customList = ['gif', 'bmp', 'tiff'];

// Validate if the file type is within the custom list
if ($checkType->validate($fileType, $customList)) {
    echo "File type is valid within the custom list.";
} else {
    echo "File type is not valid within the custom list.";
}
```
**Output:**
```
File type is valid within the custom list.
```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
