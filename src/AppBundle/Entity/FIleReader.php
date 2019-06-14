<?php


namespace AppBundle\Entity;


class FIleReader
{
    private $path;

    function __construct($path)
    {
        $this->path = $path;
    }

    public function getIntegers()
    {
        $text = file_get_contents($this->path);
        return explode(' ', $text);
    }
}