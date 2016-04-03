<?php

class RegularPrice extends Price
{
    /**
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        $result = 2;

        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }

        return (double)$result;
    }
}
