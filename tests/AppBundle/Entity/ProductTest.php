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

    public function testcomputeTVAFoodProduct($price, $expectedTva)

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
        ];

    }

    public function testComputeTVAOtherProduct()

    {

        $product = new Product('Un autre produit', 'Un autre type de produit', 20);


        $this->assertSame(3.92, $product->computeTVA());

    }

    public function testNegativePriceComputeTVA()

    {

        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $product->computeTVA();

    }

}