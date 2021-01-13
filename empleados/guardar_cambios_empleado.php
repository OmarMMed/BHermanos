<?php
	//Validar si se quiere registrar un nuevo administrador
	if(isset($_POST['Clave']) && isset($_POST['Nombre']) && isset($_POST['Telefono']) && isset($_POST['Correo']))
	{
		$Clave_original = $_GET['original'];

		if($Clave_original == $_POST['Clave'])
		{
			require ("../../BHermanos/conexion.php");
			//Crear la conexion al servidor de base de datos
			$conn = new mysqli($servidor, $usuario, $pwd, $bd);
			
			//Verificar la conexion al servidor de base de datos
				if($conn->connect_error){
					die("Error al registrar empleado: " . $conn->connect_error);
				}

				$Nombre = $_POST['Nombre'];
				$Telefono = $_POST['Telefono'];
				$Correo = $_POST['Correo'];
				$Cargo = $_POST['Cargo'];
				$sql = "UPDATE usuarios SET nombre = '$Nombre', celular = '$Telefono', correo = '$Correo' WHERE idUsuarios = '$Clave_original'";

			if(mysqli_query($conn, $sql)){
				$conn->close();
				header('Location: empleados.php?cambiado=s');
			}else{
				$conn->close();
				header('Location: empleados.php?cambiado=n');
			}
		}else{
			$bandera = VerificarClave($_POST['Clave']);
			if(!$bandera && $_POST)
			{
				require ("../../BHermanos/conexion.php");
				//Crear la conexion al servidor de base de datos
				$conn = new mysqli($servidor, $usuario, $pwd, $bd);
				
				//Verificar la conexion al servidor de base de datos
					if($conn->connect_error){
						die("Error al registrar empleado: " . $conn->connect_error);
					}
					$Clave = $_POST['Clave'];
					$Nombre = $_POST['Nombre'];
					$Telefono = $_POST['Telefono'];
					$Correo = $_POST['Correo'];
					$Cargo = $_POST['Cargo'];
					$sql = "UPDATE usuarios SET idUsarios = $Clave, nombre = '$Nombre', celular = '$Telefono', correo = '$Correo WHERE idUsarios = '$Clave_original'";

				if(mysqli_query($conn, $sql)){
					$conn->close();
					header('Location: empleados.php?cambiado=s');
				}else{
					$conn->close();
					header('Location: empleados.php?cambiado=n');
				}
			}
			else
			{
				header("Location: editar_empleado.php?result=s&clave=$Clave_original;");
			}
		}
	} 
	
	function VerificarClave($id)
	{
		require ("../../BHermanos/conexion.php");
		$Clave_original = $_GET['original'];
		//Crear la conexion al servidor de base de datos
		$conn = new mysqli($servidor, $usuario, $pwd, $bd);
		
		//Verificar la conexion al servidor de base de datos
			if($conn->connect_error){
				die("Error al registrar empleados: " . $conn->connect_error);
			}
			$sql = "SELECT *FROM usuarios WHERE idUsarios = '$id'";
			
			$resultado = mysqli_query($conn, $sql);
			
		if(mysqli_num_rows($resultado)==0){
			$conn->close();
			return false;
		}else{
			$conn->close();
			return true;
		}
	}
?>

