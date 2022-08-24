<?php
namespace Classes;

class Furniture extends Product
{
    protected $height;
    protected $length;
    protected $width;
    public function getType()
    {
        return "Dimension: {$this->length}x{$this->width}x{$this->height}";
    }
}
