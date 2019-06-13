<?php


namespace AppBundle\Entity;


class Calculatrice
{
    public function additionner($nb1, $nb2) {
        return $nb1 + $nb2;
    }

    public function soustraire($nb1, $nb2) {
        return $nb1 - $nb2;
    }
}