<?php 
    
    require ("../../BHermanos/conexion.php");

    //Crear la conexion a la base de datos
    $conexion = new mysqli($servidor,$usuario,$pwd,$bd);

    // //Verificar la conexion al servidor de base de datos
    if($conexion->connect_error){
        die("Error al momento de conectar al servidor : "
         . $conexion->connect_error);
    }
    
        $id  = $_REQUEST['id'];
        $sucursal = $_POST['sucursal'];
        $marca = $_POST['marca'];
        $nombrezapato = $_POST['nombrezapato'];
        $talla = $_POST['talla'];
        $color = $_POST['color'];
        $precio = $_POST['precio'];
        
        $insertar = "INSERT INTO sistemainventario (id,sucursal,marca,nombrezapato,talla,color,precio) 
        VALUES ('$id','$sucursal','$marca','$nombrezapato','$talla','$color','$precio')";

        $verificar_clave = mysqli_query($conexion,"SELECT * FROM sistemainventario WHERE id = '$id'");
        if(mysqli_num_rows($verificar_clave) > 0){    
            header("location: nuevo_articulo.php?accion=mismaclave");
       
        exit;
        }else
        $result = mysqli_query($conexion,$insertar);
        //Ejecutar consulta 
        mysqli_close($conexion);
        //Cerrar conexion
        header("location: index.php?");
        
        

?>