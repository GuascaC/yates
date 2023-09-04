<?php

class accesories{

    public $nameO;
    public $name;
    public $quantity;
    public $price;
    public $info;
    public $img; 
    public $id_accesory; 

    public function __construct($nameO,$name,$quantity,$price,$info,$img,$id_accesory){

        $this->nameO = $nameO;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->info = $info;
        $this->img = $img;
        $this->$id_accesory; 
    }

    public function getInfo(){

        echo "Nombre: ".$this->name."<br>";
        echo "Cantidad: ".$this->quantity."<br>";
        echo "Precio: ".$this->price."<br>";
        echo "Información: ".$this->info."<br>";
    }

    public function add(){
        $sql = "INSERT INTO accesories(name, price, info, quantity, img) VALUES ('$this->name','$this->price','$this->info','$this->quantity','$this->img')";
        return $sql;
    }
    public function delete(){
        $sql = "DELETE FROM accesories WHERE id = '$this->id_accesory'";
        return $sql;
    }
    public function edit(){
        $sql = "UPDATE accesories SET name = '$this->name', price = '$this->price', info = '$this->info', img = '$this->img', quantity = '$this->quantity' WHERE name = '$this->nameO'";  
        return $sql;
    }
    public function show(){
        $sql = "SELECT * FROM accesories WHERE quantity >= 1 AND id != 0 AND name = ('$this->name')";
        return $sql;
    }
    public function show2(){
        $sql = "SELECT * FROM accesories WHERE quantity >= 1 AND id != 0";
        return $sql;
    }

}

?>