<?php


namespace Tests\AppBundle\Entity;

use AppBundle\Entity\FIleReader;
use PHPUnit\Framework\TestCase ;
use AppBundle\Entity\Calculatrice2;


class Calculatrice2Test extends TestCase
{
//    public $calc;
//
//    // Methode sans Mock
//
//    public function setUp(){
//        $reader = new FIleReader(__DIR__.'/../Resources/File/num.txt') ;
//        $this->calc = new Calculatrice2($reader);
//    }
//
//    public function testAdditionner() {
//        $result = $this->calc->additionner();
//        $this->assertEquals(307, $result);
//    }
    public $calc;

    public function setUp() {
        $reader = $this->getMockBuilder(FileReader::class)
            ->setMethods(['getIntegers'])
            ->setConstructorArgs(['test/file/num.txt'])
            ->getMock();
        $invocationMocker = $reader->expects($this->once());
        $invocationMocker->method('getIntegers')->willReturn([10, 20, 30]);
        $this->calc = new Calculatrice2($reader);
    }

    public function testAdditionner() {
        $result = $this->calc->additionner();
        $this->assertEquals(60, $result);
    }
}