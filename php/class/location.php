<?php

class location{

    public $location;
    public $name;
    public $schedule;
    public $id_location;

        public function __construct($location,$name,$schedule,$id_location) {
        $this->location = $location;
        $this->name = $name;
        $this->schedule = $schedule;
        $this->id_location = $id_location;
    }
    public function edit() {
        $sql = "UPDATE location SET name = '$this->name', address = '$this->address', schedule = '$this->schedule' WHERE id = '$this->id_location'";  
    return $sql;
    }
    public function add() {
        $sql = "INSERT INTO location(address, name, schedule) VALUES ('$this->location','$this->name','$this->schedule')";
    return $sql;
    }
    public function delete() {
        $sql = "DELETE FROM location WHERE id = $this->id_location";
    return $sql;
    }
    public function show() {
        $sql = "SELECT * FROM location";
        return $sql;
    }
    public function show2() {
        $sql = "SELECT * FROM `location` WHERE id = $this->id_location";
        return $sql;
    }
}
?>