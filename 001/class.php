<?php

class location{

    public $location;
    public $name;
    public $schedule;

    public function __construct($location, $name, $schedule){
        $this->location = $location;
        $this->name = $name;
        $this->schedule = $schedule;
    }

    public function getLocation(){
        echo $this->location;
    }

    public function getName(){
        echo $this->name;
    }

    public function getSchedule(){
        echo $this->schedule;
    }

}

