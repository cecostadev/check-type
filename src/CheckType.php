<?php

namespace App\Core;

class CheckType 
{
    /**
     * Supported file extensions categorized by type.
     *
     * @var array
     */
    protected $types = [
        'image' => ['jpg', 'jpeg', 'gif', 'png'],
        'document' => ['doc', 'docx', 'xls', 'xlsx', 'csv'],
    ];

    /**
     * Validates if the file type is within the accepted list.
     *
     * @param string $type The file extension to validate.
     * @param array $list The list of accepted file extensions.
     * @return bool Returns true if the type is valid, false otherwise.
     */
    public function validate(string $type, array $list): bool
    {
        return in_array(strtolower($type), array_map('strtolower', $list));
    }

    /**
     * Validates if the file type is an image.
     *
     * @param string $type The file extension to validate.
     * @return bool Returns true if the type is a supported image, false otherwise.
     */
    public function validateImage(string $type): bool
    {
        return $this->validate($type, $this->types['image']);
    }

    /**
     * Validates if the file type is a document.
     *
     * @param string $type The file extension to validate.
     * @return bool Returns true if the type is a supported document, false otherwise.
     */
    public function validateDocument(string $type): bool
    {
        return $this->validate($type, $this->types['document']);
    }

    /**
     * Adds a new category with its associated file extensions.
     *
     * @param string $category The name of the category.
     * @param array $extensions The list of file extensions for the category.
     * @return void
     */
    public function addCategory(string $category, array $extensions): void
    {
        $category = strtolower($category);
        if (!isset($this->types[$category])) {
            $this->types[$category] = [];
        }
        $this->types[$category] = array_merge($this->types[$category], array_map('strtolower', $extensions));
    }

    /**
     * Validates if the file type belongs to a specific category.
     *
     * @param string $type The file extension to validate.
     * @param string $category The category to validate against.
     * @return bool Returns true if the type is valid within the category, false otherwise.
     */
    public function validateByCategory(string $type, string $category): bool
    {
        $category = strtolower($category);
        if (!isset($this->types[$category])) {
            return false;
        }
        return $this->validate($type, $this->types[$category]);
    }
}
