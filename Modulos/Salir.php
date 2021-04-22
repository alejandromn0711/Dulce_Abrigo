<?php
   
   if(isset($_SESSION['active'])){

      session_destroy();
      
      header('location: ./Modulos/Logincliente.php');
      
      }

   
?>