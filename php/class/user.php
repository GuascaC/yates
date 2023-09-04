<?php

class user{

    public $name;
    public $doc;
    public $t_doc;
    public $mail;
    public $password;
    public $rol;
    public $id_user;

    public function __construct($name,$doc,$t_doc,$mail,$password,$rol,$id_user) {
        $this->name = $name;
        $this->doc = $doc;
        $this->t_doc = $t_doc;
        $this->mail = $mail;
        $this->password = $password;
        $this->rol = $rol;
        $this->id_user = $id_user;
    }

    public function login(){
        $sql = "SELECT * FROM users WHERE mail = '$this->mail' AND password = '$this->password'";
        return $sql;
    }
    public function login2(){
        $sql = "SELECT * FROM users WHERE mail = '$this->mail' AND password = '$this->password' AND id_status = '2'";
        return $sql;
    }
    public function register(){
        $sql = "INSERT INTO users(name, mail, id_documents, document, password, id_roles, id_status) VALUES ('$this->name','$this->mail','$this->t_doc','$this->doc','$this->password','$this->rol',1)";
        return $sql;
    }
    public function edit(){
        $sql = "UPDATE users SET name = '$this->name', mail = '$this->mail',id_documents = '$this->t_doc',document = '$this->doc',password = '$this->password' WHERE id = '$this->id_user'";
        return $sql;
    }
    public function inactivate(){
        $sql = "UPDATE users SET id_status = '2' WHERE id = $this->id_user";
        return $sql;
    }
    public function authenticateA(){
        $sql = "SELECT * FROM users WHERE mail = '$this->mail' AND password = '$this->password' AND id_roles = '2'";
        return $sql;
    }
    public function authenticateU(){
        $sql = "SELECT * FROM users WHERE mail = '$this->mail' AND password = '$this->password' AND id_roles = '1'";
        return $sql;
    }

}

?>