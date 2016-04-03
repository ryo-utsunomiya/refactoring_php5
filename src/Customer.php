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
        $totalAmount          = 0;
        $frequentRenterPoints = 0;
        $result               = 'Rental Record for ' . $this->getName() . "\n";
        if (count($this->rentals) > 0) {
            foreach ($this->rentals as $rental) {
                $thisAmount = 0;
                switch ($rental->getMovie()->getPriceCode()) {
                    case Movie::REGULAR:
                        $thisAmount += 2;
                        if ($rental->getDaysRented() > 2) {
                            $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                        }
                        break;
                    case Movie::NEW_RELEASE:
                        $thisAmount += $rental->getDaysRented() * 3;
                        break;
                    case Movie::CHILDRENS:
                        $thisAmount += 1.5;
                        if ($rental->getDaysRented() > 3) {
                            $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                        }
                        break;
                }
                $frequentRenterPoints++;
                if (($rental->getMovie()->getPriceCode() === Movie::NEW_RELEASE)
                    && $rental->getDaysRented() > 1
                ) {
                    $frequentRenterPoints++;
                }
                $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
                $totalAmount += $thisAmount;
            }
        }
        $result .= 'Amount owed is ' . $totalAmount . "\n";
        $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points' . "\n";

        return $result;
    }
}
