<?php

class MovieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructor()
    {
        $movie = new Movie('title', Movie::REGULAR);
        $this->assertThat($movie->getTitle(), $this->identicalTo('title'));
        $this->assertThat($movie->getPriceCode(), $this->identicalTo(Movie::REGULAR));
    }
    
    /**
     * @test
     */
    public function setPriceCode()
    {
        $movie = new Movie('title', Movie::REGULAR);
        $movie->setPriceCode(Movie::NEW_RELEASE);
        $this->assertThat($movie->getTitle(), $this->identicalTo('title'));
        $this->assertThat($movie->getPriceCode(), $this->identicalTo(Movie::NEW_RELEASE));
    }
}
