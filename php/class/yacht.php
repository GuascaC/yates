<?php

class yacht{

    public $modelO;
    public $model;
    public $owner;
    public $price;
    public $info;
    public $n_serie;
    public $brand;
    public $img;
    public $id_yatch;

    public function __construct($modelO,$model,$owner,$price,$info,$n_serie,$brand,$img,$id_yatch){

        $this->modelO = $modelO;
        $this->model = $model;
        $this->owner = $owner;
        $this->price = $price;
        $this->info = $info;
        $this->n_serie = $n_serie;
        $this->brand = $brand;
        $this->img = $img;
        $this->id_yatch = $id_yatch;
    }

    public function getInfo(){

        echo "Nombre: ".$this->name."<br>";
        echo "Propietario: ".$this->owner."<br>";
        echo "Precio: ".$this->price."<br>";
        echo "Información: ".$this->info."<br>";
        echo "Número de serie: ".$this->n_serie."<br>";
        echo "Marca: ".$this->brand."<br>";
        echo "Modelo: ".$this->model."<br>";
    }
    public function add(){
        $sql = "INSERT INTO yates(model, price, info, serie, img, id_users, id_brand) VALUES ('$this->model','$this->price','$this->info','$this->serie','$this->img','$this->owner','$this->brand')";
        return $sql;
    }
    public function delete(){
        $sql = "DELETE FROM yates WHERE id = $this->id_yatch AND id_users = 1";
        return $sql;
    }
    public function edit(){
        $sql = "UPDATE yates SET model = '$this->model', price = '$this->price', info = '$this->info', img = '$this->img', id_brand = '$this->brand' WHERE model = '$this->modelO'";      
        return $sql;
    }
    public function show(){
        $sql = "SELECT * FROM yates WHERE id_users = 1 AND id != 0";
        return $sql;
    }
    public function show2(){
        $sql = "SELECT * FROM yates WHERE model = ('$this->model')";
        return $sql;
    }
    public function show3(){
        $sql = "SELECT * FROM yates WHERE id_users = ($this->id_yatch)";
        return $sql;
    }

}

?>