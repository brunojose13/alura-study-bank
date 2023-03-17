<?php

class Endereco
{
    private $street;
    private $number;
    private $neighborhood;
    private $city;

    function __construct(string $street, string $number, string $neighborhood, string $city)
    {
        $this->street = $street;
        $this->number = $number;
        $this->neighborhood = $neighborhood;
        $this->city = $city;   
    }


    /// /////////////////////////////////////////////////// ///

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }


    /// /////////////////////////////////////////////////// ///

    public function getFullAddressFormatted()
    {
        return $this->getStreet() . ", " . $this->getNumber() . " - " . $this->getNeighborhood() . ", ". $this->getCity();
    }
}