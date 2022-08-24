<?php
namespace Classes;

class DVD extends Product
{
    protected $size;
    public function getType()
    {
        return "Size: {$this->size}MB";
    }
}
