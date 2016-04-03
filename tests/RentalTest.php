<?php

class RentalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function constructor()
    {
        $movie  = new Movie('title', Movie::REGULAR);
        $rental = new Rental($movie, 1);
        $this->assertThat($rental->getMovie(), $this->equalTo($movie));
        $this->assertThat($rental->getDaysRented(), $this->identicalTo(1));
    }
}
