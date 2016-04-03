<?php

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Price
     */
    private $price;

    /**
     * @param string $title
     * @param int    $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return $this->price->getPriceCode();
    }

    /**
     * @param int $arg
     * @throws \InvalidArgumentException
     */
    public function setPriceCode($arg)
    {
        switch ($arg) {
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            case self::CHILDRENS:
                $this->price = new ChildrensPrice();
                break;
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            default:
                throw new \InvalidArgumentException('Invalid price code');
        }
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        return $this->price->getCharge($daysRented);
    }

    /**
     * @param int $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return $this->price->getFrequentRenterPoints($daysRented);
    }
}
