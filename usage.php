<?php

require 'vendor/autoload.php';

use App\Core\CheckType;

$checkType = new CheckType();

// Validate an image
$isImage = $checkType->validateImage('jpg'); // returns true

// Validate a document
$isDocument = $checkType->validateDocument('pdf'); // returns false

echo $isImage ? 'Valid Image' : 'Invalid Image' . PHP_EOL;
echo $isDocument ? 'Valid Document' : 'Invalid Document';

// Add and validate a new category
$checkType->addCategory('audio', ['mp3', 'wav']);
$isAudio = $checkType->validateByCategory('mp3', 'audio'); // returns true
echo $isAudio ? 'Valid Audio File' : 'Invalid Audio File';
