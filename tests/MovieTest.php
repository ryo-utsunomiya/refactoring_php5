<?php

class MovieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function setPriceCode()
    {
        $movie = new Movie('title', Movie::REGULAR);
        $this->assertThat($movie->getTitle(), $this->identicalTo('title'));

        $movie->setPriceCode(Movie::REGULAR);
        $this->assertThat($movie->getPriceCode(), $this->identicalTo(Movie::REGULAR));
        $movie->setPriceCode(Movie::CHILDRENS);
        $this->assertThat($movie->getPriceCode(), $this->identicalTo(Movie::CHILDRENS));
        $movie->setPriceCode(Movie::NEW_RELEASE);
        $this->assertThat($movie->getPriceCode(), $this->identicalTo(Movie::NEW_RELEASE));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function setPriceCodeThrowsExceptionWhenInvalidPriceCodeIsPassed()
    {
        $movie = new Movie('title', Movie::REGULAR);
        $movie->setPriceCode(999);
    }
}
