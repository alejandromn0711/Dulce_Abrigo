<?php


if(isset($_SESSION['ADMI'])){

session_destroy();

header('location: ./Modulos/LoginADMI.php');

}



?>