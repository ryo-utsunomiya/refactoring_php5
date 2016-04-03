<?php

class ChildrensPrice extends Price
{
    /**
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::CHILDRENS;
    }

    /**
     * @param $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        $result = 1.5;

        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
        }

        return $result;
    }
}
