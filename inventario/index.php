<?php
include("../../BHermanos/header.php");
?>
     <form style="background-color: #ff621b; opacity: 0.90;">
        <div style="border: 1px solid #292b2c;" >
            <h4 class="mx-auto" style=" padding:2%; color:white; text-align:center;">Inventario</h4>
        </div>
        </form>

        <!--Contenido de la tabla-->
        
        
        <table class="table table-striped table-hover">
        <thead class="">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Marca</th>
            <th scope="col">Nombre del Calzado</th>
            <th scope="col">Talla</th>
            <th scope="col">Color</th>
            <th scope="col">Precio</th>
            <th scope="col">Existencia</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        
        

    <?php 
    //Crear conexion a la bd
    require("../../BHermanos/conexion.php");

    $conn = new mysqli($servidor,$usuario,$pwd,$bd);

    //Verificar conexion a la bd
    if($conn->connect_error){
        die("Error al momento de conectar al servidor :". $conn->connect_error);
    }

    //Obtener registros de la bd
    $sql = "SELECT * from sistemainventario";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row = $result->fetch_object()){
            echo "<tr>";
                echo "<td>".$row->id . "</td>";
                echo "<td>".$row->sucursal . "</td>";
                echo "<td>".$row->marca . "</td>";
                echo "<td>".$row->nombrezapato . "</td>";
                echo "<td>".$row->talla . "</td>";
                echo "<td>".$row->color . "</td>";
                echo "<td>$".$row->precio . "</td>";
                echo "<td>".$row->existencia . "</td>";
                echo"<td><a href='inventario_editar.php?id=".$row->id."''><button class='btn btn-warning'>Editar</button></a></td>";
                echo"<td><a href='inventario_eliminar.php?id=".$row->id."''><button class='btn btn-danger'>Eliminar</button></a></td>";
            echo "<tr>";
        }
    }
    $conn->close();

    ?>
  
    </table>
    <a href="../../BHermanos/venta/nuevo_articulo.php"><button style="float:right" class="btn btn-primary">Registrar nuevo articulo</button></a>

