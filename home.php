<?php
include("header.php");
?>

<?php
if(isset($_SESSION['userId'])){
    echo '
    <h1>Bienvenido al sistema de BHermanos</h1>';
}
else{
    
    Header("Location: index.php?error=NoHasIniciadoSesion");
}

?>



<?php 
include("footer.php");
 ?>