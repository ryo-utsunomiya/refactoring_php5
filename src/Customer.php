<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     * @throws \LogicException
     */
    public function statement()
    {
        $result = 'Rental Record for ' . $this->getName() . "\n";

        if (count($this->rentals) > 0) {
            foreach ($this->rentals as $rental) {
                $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
            }
        }

        $result .= 'Amount owed is ' . $this->getTotalCharge() . "\n";
        $result .= 'You earned ' . $this->getTotalFrequentRenterPoints() . ' frequent renter points' . "\n";

        return $result;
    }

    /**
     * @return float
     */
    private function getTotalCharge()
    {
        return (double)array_sum(
            array_map(
                function (Rental $rental) {
                    return $rental->getCharge();
                },
                $this->rentals
            )
        );
    }

    /**
     * @return float
     */
    private function getTotalFrequentRenterPoints()
    {
        return (double)array_sum(
            array_map(
                function (Rental $rental) {
                    return $rental->getFrequentRenterPoints();
                },
                $this->rentals
            )
        );
    }
}
