<?php
/**
 * Created by PhpStorm.
 * User: amine.yahia
 * Date: 15/05/19
 * Time: 16:28
 */

namespace AppBundle\Entity;

use PHPUnit\Framework\TestCase;


class Product
{
    const FOOD_PRODUCT = 'food';
    const NO_FOOD_PRODUCT = 'no_food';

    private $name;

    private $type;

    private $price;

    public function __construct($name, $type, $price)

    {

        $this->name = $name;

        $this->type = $type;

        $this->price = $price;

    }

    public function computeTVA()

    {
        if ($this->price < 0) {
            throw new \LogicException('The TVA cannot be negative.');
        }

        if (self::FOOD_PRODUCT == $this->type) {

            return $this->price * 0.055;

        }

        return $this->price * 0.196;

    }

}