<?php

class meeting{

    public $type;
    public $hour;
    public $date;
    public $location;
    public $id_meeting;

        public function __construct($type, $hour, $date, $location,$id_meeting) {
        $this->type = $type;
        $this->hour = $hour;
        $this->date = $date;
        $this->location = $location;
        $this->id_meeting = $id_meeting;
        }
        public function add(){
            $sql = "INSERT INTO meetings(id_services, id_hour, date, id_location, id_mech, id_users) VALUES ('$this->type','$this->hour','$this->date','$this->location','1','$this->id_meeting')";
            return $sql;
        }
        public function delete(){
            $sql = "DELETE FROM meetings WHERE id = $this->id_meeting";
            return $sql;
        }
        public function edit(){
            $sql = "UPDATE meetings SET id_services = '$this->type', id_hour = '$this->hour', date = '$this->date', id_location= '$this->location' WHERE id = '$this->id_meeting'";    
            return $sql;
        }
        public function show() {
            $sql = "SELECT * FROM meetings";
        return $sql;
        }
        public function show2() {
            $sql = "SELECT * FROM meetings WHERE id = $this->id_meeting";        
        return $sql;
    }
    public function show3() {
        $sql = "SELECT * FROM meetings WHERE id_users = ('$this->id_meeting')";      
    return $sql;
}
}

?>