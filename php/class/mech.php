<?php

class mech{

    public $name;
    public $special;
    public $location;
    public $id_mech;

        public function __construct($name,$special,$location,$id_mech) {
        $this->special = $special;
        $this->location = $location;
        $this->name = $name;
        $this->id_mech = $id_mech;
    }
    public function edit() {
        $sql = "UPDATE mech SET name = '$this->name', id_location = '$this->location', id_special = '$this->special' WHERE id = '$this->id_mech'";     
    return $sql;
    }
    public function add() {
        $sql = "INSERT INTO mech(name, id_special, id_location) VALUES ('$this->name','$this->special','$this->location')";
    return $sql;
    }
    public function delete() {
        $sql = "DELETE FROM mech WHERE id = $this->id_mech";
    return $sql;
    }
    public function show() {
        $sql = "SELECT * FROM mech";
        return $sql;
    }
    public function show2() {
        $sql = "SELECT * FROM `mech` WHERE id = $this->id_mech";
        return $sql;
    }
}
?>