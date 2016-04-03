<?php

class NewReleasePrice extends Price
{
    /**
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        return (double)$daysRented * 3;
    }

    /**
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return ($daysRented > 1) ? 2 : 1;
    }
}
