<?php
class service{

public $service;
public $id_service;

    public function __construct($service, $id_service) {
    $this->service = $service;
    $this->id_service = $id_service;
    }
    public function edit() {
        $sql = "UPDATE service SET service = '$this->service' WHERE id = '$this->id_service'";   
    return $sql;
    }
    public function add() {
        $sql = "INSERT INTO service(service) VALUES ('$this->service')";
    return $sql;
    }
    public function delete() {
        $sql = "DELETE FROM service WHERE id = $this->id_service";
    return $sql;
}
public function show() {
    $sql = "SELECT * FROM service";
return $sql;
}
public function show2() {
$sql = "SELECT * FROM `service` WHERE id = $this->id_service";
return $sql;
}
}
?>