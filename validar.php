<?php
	if($_POST){
		session_start();
  		include('./conexion.php');
  		
  		$correo=$_POST['correo'];
  		$contra=$_POST['contra'];

  		/*$conexion=mysqli_connect("localhost","adoptamiwos","f0cb0bd70", "adoptamiwos") or die("No se estableció la conexión");
  		

  		/*$conexion=mysqli_connect("localhost","adoptamiwos","f0cb0bd70");
  		
  		mysqli_select_db($conexion, "adoptamiwos")or die("Error de conexión con la base de datos");*/

		$consulta="SELECT*FROM `adoptamiwos`.`yeren_login` WHERE correo='$correo' and contra='$contra'";

		$resultado=mysqli_query($conexion,$consulta);

		$filas=mysqli_num_rows($resultado);

		if($filas){
			$_SESSION["correo"]=$correo;

  			include("index.php");
		} else{
    		include("error.html");
		}
mysqli_free_result($resultado);
mysqli_close($conexion);
}