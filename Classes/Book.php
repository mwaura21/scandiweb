<?php
namespace Classes;

class Book extends Product
{
    protected $weight;
    public function getType()
    {
        return "Weight: {$this->weight}KG";
    }
}
