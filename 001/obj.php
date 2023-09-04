<?php

include_once './class.php';

$obj = new location(

$location = $_POST['location'],
$name = $_POST['name'],
$schedule = $_POST['schedule'],
);

$obj->getLocation();
$obj->getName();
$obj->getSchedule();

?>