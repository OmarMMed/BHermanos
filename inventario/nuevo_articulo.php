<?php
include("../../BHermanos/header.php");

if(isset($_GET['accion'])){
    $accion = $_GET['accion'];
    if($accion == 'mismaclave'){
      echo "<script>alert('Ya existe articulo con esta clave ingrese una diferente, articulo no se registro');</script>";
    }
  }
?>

<br><br>
<h4 class="alert alert-primary" role="alert" style="text-align: center; margin-left:415px; margin-right:415px;">Nuevo articulo</h4>
<form class="col-md-5 border border-dark rounded mx-auto" style="padding: 1%;" action="procesar_registrar_inventario.php?id=echo $row->id" method="POST">

<div class="form-group"><br>
    <label for="exampleInputEmail1">ID</label>
    <input  class="form-control" type="number" name="id" required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Sucursal</label>
    <input type="text" class="form-control" name="sucursal" required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Marca</label>
    <input  class="form-control" type="text" name="marca" required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre del Calzado</label>
    <input  class="form-control" type="text" name="nombrezapato" required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Talla</label>
    <input  class="form-control" name="talla" type="number"  required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Color</label>
    <input  class="form-control" name="color" type="text"  required>
  </div><br>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio</label>
    <input  class="form-control" name="precio"  type="float" required>
  </div><br>
  <button type="submit" class="btn btn-success" name="btnregistrar">Registrar</button>

    
</form>
<a href="index.php"><button class="btn btn-danger" style="margin-left:915px; margin-top:-98px;">Cancelar</button></a>
