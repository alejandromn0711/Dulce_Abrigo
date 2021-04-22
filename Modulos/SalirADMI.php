/*Se cierra Sesion con el usuario ADMIN*/
<?php


if(isset($_SESSION['ADMI'])){

session_destroy();
}
?>
<html>
    <script>window.location.href="index.php"</script>
</html>
