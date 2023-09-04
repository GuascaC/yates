<?php

class brand{

public $brand;
public $id_brand;

    public function __construct($name, $id_brand) {
    $this->name = $name;
    $this->id_brand = $id_brand;
    }
    public function edit() {
        $sql = "UPDATE brands SET brand = '$this->brand' WHERE id = '$this->id_brand'";    
    return $sql;
    }
    public function add() {
        $sql = "INSERT INTO brands(brand) VALUES ('$this->name')";
    return $sql;
    }
    public function delete() {
        $sql = "DELETE FROM brands WHERE id = $this->id_brand";
    return $sql;
}
public function show() {
$sql = "SELECT * FROM brands";
return $sql;
}
public function show2() {
    $sql = "SELECT * FROM `brands` WHERE id = $this->id_brand";
    return $sql;
}

}
?>