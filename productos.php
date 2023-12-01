<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="zoom.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>

	<body>
		<?php
			include("lib/cabecera.html");
		?>

		<div class="paper">
			<?php
    			include './conexion.php';
				$re=mysqli_query($conexion,"SELECT * FROM yeren_pw2")/*or die(mysql_error())*/;
        		while ($f=mysqli_fetch_array($re)) {
        	?>
            
            <div class="producto">
            	<a class="tiendatable" href="./detalles.php?id=<?php  echo $f['id'];?>"><img src="./<?php echo $f['imagen'];?>" height="150px"><p class="tiendatxt"><?php echo $f['nombre'];?><br>$<?php echo $f['precio'];?></p></a>
        	</div>
    		
    		<?php
        		}
    		?>
		</div>

		<?php
			include("lib/pie.html");
		?>
	</body>
</html>