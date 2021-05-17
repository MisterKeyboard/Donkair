<?php

class Passenger
{
}
abstract class plane
{
    private $passengers = [];
    abstract protected function getNbPlaces(): int;
    public function addPassenger(Passenger $passenger)
    
        if ($this->isFull() {
            throw new Execption("Avions complet")
        })
        if (!$passenger->isWith($this->passengers)) {
            return; 
        }
        $this->passengers[] = $passenger;
    

    public function addPassenger2(Passenger $passenger)
    {
        if (!$this->isFull()) {
            if ($passenger->isWith($this->passengers)) {
                $this->passengers[] = $passenger; 
            }
        }
    }

    public function isFull()
    {
        return count($this->passengers) == $this->getNbPlaces();
    }
}
    class Plane3p extends Plane
{
    protected function getNbPlaces(): int
    {
        return 3;
    }
}

    class Plane4p extends Plane
{
    protected function getNbPlaces(): int
    {
        return 4;
    }
}

