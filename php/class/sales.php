<?php
class sales{
    public function show(){
        $sql = "SELECT * FROM `sales` WHERE id_accesory = 0";
        return $sql;
    }
    public function show2(){
        $sql = "SELECT * FROM `sales` WHERE id_yates = 0";
        return $sql;
        }
    }
?>