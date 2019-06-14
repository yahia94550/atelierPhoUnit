<?php


namespace Tests\AppBundle\Entity;

use AppBundle\Entity\FIleReader;
use PHPUnit\Framework\TestCase;


class FileReaderTest extends TestCase
{
    public $reader;

    public function setUp(){
        $this->reader = new FIleReader(__DIR__.'/../Resources/File/num.txt');
    }

    public function testGetIntegers(){
        $integers = $this->reader->getIntegers();
        $expected = [10, 54, 12, 89, 65, 23, 54];
        $this->assertEquals($expected, $integers);
    }
}