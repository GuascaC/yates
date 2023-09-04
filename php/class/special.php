<?php
class special{

public $special;
public $id_special;

    public function __construct($special, $id_special) {
    $this->special = $special;
    $this->id_special = $id_special;
    }
    public function edit() {
        $sql = "UPDATE special SET special = '$this->special' WHERE id = '$this->id_special'";   
    return $sql;
    }
    public function add() {
        $sql = "UPDATE special SET special = '$this->special' WHERE id = '$this->id_special'";    
    return $sql;
    }
    public function delete() {
        $sql = "DELETE FROM special WHERE id = $this->id_special";
    return $sql;
}
public function show() {
    $sql = "SELECT * FROM special";
    return $sql;
}
public function show2() {
    $sql = "SELECT * FROM `special` WHERE id = $this->id_special";
    return $sql;
}
}
?>