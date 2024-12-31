<?php

use PHPUnit\Framework\TestCase;
use App\Core\CheckType;

class CheckTypeTest extends TestCase
{
    protected $checkType;

    protected function setUp(): void
    {
        $this->checkType = new CheckType();
    }

    public function testValidateImage()
    {
        $this->assertTrue($this->checkType->validateImage('jpg'));
        $this->assertFalse($this->checkType->validateImage('pdf'));
    }

    public function testValidateDocument()
    {
        $this->assertTrue($this->checkType->validateDocument('docx'));
        $this->assertFalse($this->checkType->validateDocument('png'));
    }

    public function testValidateGeneric()
    {
        $this->assertTrue($this->checkType->validate('gif', ['gif', 'bmp']));
        $this->assertFalse($this->checkType->validate('exe', ['gif', 'bmp']));
    }

    public function testAddCategory()
    {
        $this->checkType->addCategory('audio', ['mp3', 'wav']);
        $this->assertTrue($this->checkType->validateByCategory('mp3', 'audio'));
        $this->assertFalse($this->checkType->validateByCategory('pdf', 'audio'));
    }

    public function testValidateByInvalidCategory()
    {
        $this->assertFalse($this->checkType->validateByCategory('jpg', 'video'));
    }
}
