<?php
	if($_POST){
		session_start();

		$nombre=$_POST['nombreprod'];
		$precio=$_POST['precio'];
		$codigo=$_POST['codigo'];
		$imagen=$_POST['imagen'];

		include('conexion.php');
		/*$conexion=mysqli_connect("localhost","adoptamiwos","f0cb0bd70");
		mysqli_select_db($conexion, "adoptamiwos")or die("No se estableció la conexión");*/

		$validar="SELECT*FROM `adoptamiwos`.`yeren_pw2` WHERE nombre='$nombreprod' or codigo='$codigo'";
		$resultado=mysqli_query($conexion,$validar);
		$aux=mysqli_num_rows($resultado);

		if($aux){
?>
			<h1 >El producto ya ha sido registrado.</h1>
<?php
		} else {
			$consulta="INSERT INTO `adoptamiwos`.`yeren_pw2` (`id`, `nombre`, `precio`, `codigo`, `imagen`) VALUES (NULL,'$nombre','$precio','$codigo','$imagen')";

			if($conexion->query($consulta) === true){
  				$_SESSION["correo"]=$correo;
    			include("index.php");
			}
		}
		
		mysqli_close($conexion);
	}
?>