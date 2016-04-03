<?php

abstract class Price
{
    abstract public function getPriceCode();

    /**
     * @param $daysRented
     * @return float
     */
    abstract public function getCharge($daysRented);

    /**
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return 1;
    }
}
