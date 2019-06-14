<?php


namespace AppBundle\Entity;


class Calculatrice2
{
    private $reader;

    public function __construct(FIleReader $reader)
    {
        $this->reader = $reader ;
    }

    public function additionner(){
        $integers = $this->reader->getIntegers();
        return array_sum($integers);
    }
    // Façon de faire 2
//    public function additionner(FileReader $reader) {
//        $integers = $reader->getIntegers();
//        return array_sum($integers);
//    }

}