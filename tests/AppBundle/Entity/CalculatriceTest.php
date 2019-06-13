<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Calculatrice;
use PHPUnit\Framework\TestCase;


class CalculatriceTest extends TestCase
{
    protected $calc;

    protected function setUp() {
        $this->calc = new Calculatrice();
    }

    public function testAdditionner() {
        $result = $this->calc->additionner(15, 25);
        $this->assertEquals(40, $result);
        $this->assertNotFalse($result);
    }

    public function testSoustraire() {
        $result = $this->calc->soustraire(15, 25);
        $this->assertEquals(-10, $result);
    }

    protected function tearDown()
    {
        $this->calc = null;
    }

    /**
     * Avec le @annotations
     */
//    /**
//     * @before
//     */
//    protected function init() {
//        $this->calc = new Calculatrice();
//    }
//
//    /**
//     * @test
//     */
//    public function additionner() {
//        $result = $this->calc->additionner(15, 25);
//        $this->assertEquals(40, $result);
//        // stupide... Juste pour l'exemple...
//        $this->assertNotFalse($result);
//    }
//
//    /**
//     * @test
//     */
//    public function soustraire() {
//        $result = $this->calc->soustraire(15, 25);
//        $this->assertEquals(-10, $result);
//    }

}