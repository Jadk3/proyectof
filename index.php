<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="estilo.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>

	<body>
		<?php
			include("lib/cabecera.html");
		?>

		<div class="contenido">
		<div class="destacados">
			<p class="titulo"><strong>DESTACADOS</strong></p>
			
				<!--<div class="cuadro">
					<a href="productos.php" class="productos"><img class="imagen" src="img/mando.jpg" alt="The Mandalorian Hot Toy" height="220px">
						<p class="detalles"><strong>The Mandalorian & The Child Star Wars Hot Toys Deluxe</strong></p><p>$11,999.00</p><p>754288458</p></a>
				</div>

				<div class="cuadro">
					<a href="productos.php" class="productos"><img class="imagen" src="img/bobafett.jpg" alt="Boba Fett" height="220px">
						<p class="detalles"><strong>Boba Fett Armadura Repintada Hot Toys</strong></p><p>$7,599.00</p><p>534798248</p></a>
				</div>

				<div class="cuadro">
					<a href="productos.php" class="productos"><img class="imagen" src="img/ghostface.jpg" alt="Ghostface" height="220px">
						<p class="detalles"><strong>NECA- Scream: Figura de acción Ghostface con Ropa</strong></p><p>$1,200.00</p><p>633378926</p></a>
				</div>

				<div class="cuadro">
					<a href="productos.php" class="productos"><img class="imagen" src="img/pyramidhead.jpg" alt="Pyramid Head" height="220px">
						<p class="detalles"><strong>Silent Hill 2: Red Pyramid Thing Edicion Estandar</strong></p><p>$15,999.00</p><p>35887322</p></a>
				</div>	-->

				<div>
					<?php
    					include './conexion.php';
						$re=mysqli_query($conexion,"SELECT * FROM yeren_pw2")/*or die(mysql_error())*/;
        				while ($f=mysqli_fetch_array($re)) {
        			?>
            
            		<div class="cuadro">
            			<img src="./<?php echo $f['imagen'];?>" height="220px" class="prods">
            			<ul>
            				<li><p class="titule"><strong><?php echo $f['nombre'];?></strong></p></li>
            				<li><p class="tiendotxt">$<?php echo $f['precio'];?></p></li>
            				<li><a class="productos" href="./carritocompras.php?id=<?php  echo $f['id'];?>"><p class="añadir"><strong>Añadir al carrito</strong></p></a></li>
            			</ul>            			
        			</div>
    		
    				<?php
        				}
    				?>
					
				</div>
		</div>

		<div class="aside">
			<div><center>
				<p class="titula"><strong>PRÓXIMAMENTE</strong></p>
				<img class="prox" src="img/moonknight.jpg" alt="Moonknight" >
			</center></div>
		</div>
		</div>

		<?php
			include("lib/footer.html");
		?>

	</body>
	
</html>