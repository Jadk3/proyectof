<?php
	if($_POST){
		session_start();

		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];
		$contra=$_POST['contra'];

		include('conexion.php');
		/*$conexion=mysqli_connect("localhost","adoptamiwos","f0cb0bd70");
		mysqli_select_db($conexion, "adoptamiwos")or die("No se estableció la conexión");*/

		$validar="SELECT*FROM `adoptamiwos`.`yeren_login` WHERE nombre='$nombre' or correo='$correo'";
		$resultado=mysqli_query($conexion,$validar);
		$aux=mysqli_num_rows($resultado);

		if($aux){
?>
			<h1 >El email ingresado no está disponible.</h1>
<?php
		} else {
			$consulta="INSERT INTO `adoptamiwos`.`yeren_login` (`nombre`, `correo`, `contra`) VALUES ('$nombre','$correo','$contra')";

			if($conexion->query($consulta) === true){
  				$_SESSION["correo"]=$correo;
    			include("index.php");
			}
		}
		
		mysqli_close($conexion);
	}
?>