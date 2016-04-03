<?php

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function statement()
    {
        $regularMovie    = new Movie('regular', Movie::REGULAR);
        $newReleaseMovie = new Movie('new release', Movie::NEW_RELEASE);
        $childrensMovie  = new Movie('childrens movie', Movie::CHILDRENS);
        $customer        = new Customer('ryo');
        $customer->addRental(new Rental($regularMovie, 3));
        $customer->addRental(new Rental($newReleaseMovie, 2));
        $customer->addRental(new Rental($childrensMovie, 4));

        $expected = <<<DOC
Rental Record for ryo
	regular	3.5
	new release	6
	childrens movie	3
Amount owed is 12.5
You earned 4 frequent renter points

DOC;

        $this->assertThat($customer->statement(), $this->identicalTo($expected));
    }

    /**
     * @test
     */
    public function statementWithoutRental()
    {
        $customer = new Customer('ryo');

        $expected = <<<DOC
Rental Record for ryo
Amount owed is 0
You earned 0 frequent renter points

DOC;

        $this->assertThat($customer->statement(), $this->identicalTo($expected));
    }
}
