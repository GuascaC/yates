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
    public function month7(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 7";
        return $sql;
    }
    public function month8(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 8";
        return $sql;
        }
    public function month9(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 9";
        return $sql;
        }
    public function month10(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 10";
        return $sql;
        }
    public function month11(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 11";
        return $sql;
        }
    public function month12(){
        $sql = "SELECT COUNT(*) AS count FROM sales where month = 12";
        return $sql;
        }
    }
?>