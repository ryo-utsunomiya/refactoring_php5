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
     * @var int
     */
    private $priceCode;

    /**
     * @param string $title
     * @param int    $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->title     = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @param int $arg
     */
    public function setPriceCode($arg)
    {
        $this->priceCode = $arg;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
