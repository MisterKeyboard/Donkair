<?php
//require "espaceAdmin/config.php";
require "espaceAdmin/db.php";

class Plane 
{

    private $passenger= [];
    private $model; 
    private $capacity; 
    public $flightNbr; 

    //function qui récupérer le nbr de passenger
    public  function getPassengerNbr(): int 
    {
        return count($this->passenger); 
    }

    public function addPassenger(Customer $passenger) 
    {
        if($this->flightFull())
        {
            echo "Ce vol est complet, merci d' choisir un autre."; 
        } else {
            array_push($this->passenger, $passenger); 
        }

    }
    //function when the plane is full 

    public  function flightFull(): bool 
    {
        return $this->capacity === $this->getPassengerNbr(); 
    }

    public function setModel(): void
    {
        $this->model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setcapacity(): void
    {
        $this->capacity;
    }

    public function getcapacity(): int
    {
        return $this->capacity;
    }

}

