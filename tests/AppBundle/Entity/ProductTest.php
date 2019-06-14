<?php
/**
 * Created by PhpStorm.
 * User: amine.yahia
 * Date: 15/05/19
 * Time: 16:35
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase

{
    protected $stack;

//    public function testcomputeTVAFoodProduct()
//
//    {
//
//        $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);
//
//        $this->assertSame(1.1, $product->computeTVA());
//
//    }

    /**

     * @dataProvider pricesForFoodProduct

     */

    public function testcomputeTvaFoodProduct($price, $expectedTva)

    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTva, $product->computeTVA());
    }

    public function pricesForFoodProduct()

    {

        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5],
            [200, 11.0],
            [400, 22.0]
        ];

    }

    public function testComputeTvaOtherProduct()

    {

        $product = new Product('Un autre produit', 'Un autre type de produit', 20);


        $this->assertSame(3.92, $product->computeTVA());

    }

    public function testNegativePriceComputeTva()

    {

        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $product->computeTVA();

    }

//    protected function setUp()
//    {
//        $this->stack = [];
//    }
//
//    public function testEmpty()
//    {
//        $this->assertTrue(empty($this->stack));
//    }
//
//    public function testPush()
//    {
//        array_push($this->stack, 'foo');
//        $this->assertSame('foo', $this->stack[count($this->stack)-1]);
//        $this->assertFalse(empty($this->stack));
//    }
//
//    public function testPop()
//    {
//        array_push($this->stack, 'foo');
//        $this->assertSame('foo', array_pop($this->stack));
//        $this->assertTrue(empty($this->stack));
//    }

}
