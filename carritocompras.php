<?php
	
	session_start();
	include './conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			
			for($i=0;$i<count($arreglo);$i++){
				if($arreglo[$i]['Id']==$_GET['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			
			if($encontro==true){
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['carrito']=$arreglo;
			}

			else{
				$nombre="";
				$precio=0;
				$codigo="";
				$imagen="";
				$re=mysqli_query($conexion,"SELECT * FROM yeren_pw2 where id=".$_GET['id']);
				
				while ($f=mysqli_fetch_array($re)) {
					$nombre=$f['nombre'];
					$precio=$f['precio'];
					$codigo=$f['codigo'];
					$imagen=$f['imagen'];
				}
				
				$datosNuevos=array('Id'=>$_GET['id'],
					'Nombre'=>$nombre,
					'Precio'=>$precio,
					'Codigo'=>$codigo,
					'Imagen'=>$imagen,
					'Cantidad'=>1);

				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito']=$arreglo;
			}
		}

	}

	else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$codigo="";
			$imagen="";
			$re=mysqli_query($conexion,"SELECT * FROM yeren_pw2 where id=".$_GET['id']);
			
			$arreglo[]=array('Id'=>$_GET['id'],
				'Nombre'=>$nombre,
				'Precio'=>$precio,
				'Codigo'=>$codigo,
				'Imagen'=>$imagen,
				'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>

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

		<div class="anadidos">

			<?php
				$total=0;
				if(isset($_SESSION['carrito'])){
					$datos=$_SESSION['carrito'];
					$total=0;
					
					for($i=0;$i<count($datos);$i++){
			?>
			
			<div class="cuadrito">
					<img height="280px" src="./<?php echo $datos[$i]['Imagen'];?>">
					<p class="titule"><strong><?php echo $datos[$i]['Nombre'];?></strong></p>
					<p class="tiendotxt"><strong>Precio:</strong> $<?php echo $datos[$i]['Precio'];?></p>
					<p class="tiendotxt"><strong>Código:</strong> <?php echo $datos[$i]['Codigo'];?></p>
					<p class="tiendotxt"><strong>Cantidad:</strong> 
						<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
					</p><br>						
			</div>
			
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
					}
				
				}
				else{
					echo '<p class="tiendatxt">No has añadido productos</p><p class="cartxt"></p>';
					//echo '<center><img src="img/neninew.png" height="300px"></center>';
				}
				
				echo '<center><p class="tiendatxt" id="total"><strong>Total: $'.$total.'</></strong></center>';
		
			?>
			
			<center><a class="botones" href="./borrar.php">Vaciar Carrito</a><a class="botones" href="./index.php">Regresar</a></center>
		</div>

		<div class="anadidos"><center>
			<p class="tiendatxt"><strong> Estás a punto de pagar la cantidad de:
				<?php
					echo '<p class="tiendatxt">$'.$total.'</p>';
				?>

				<div id="paypal-button-container"></div>
			</strong></p>

    		<script src="https://www.paypal.com/sdk/js?client-id=test&currency=MXN"></script>
    		<div id="paypal-button-container"></div>
    		<script>
      			paypal.Buttons({
        			createOrder: (data, actions) => {
        	  			return actions.order.create({
            				purchase_units: [{
              					amount: {
                					value: '.$total.'
    	          				}
        	    			}]
          				});
        			},

    	    		// Finalizar la transacción después de la aprobación del pagador
        	
        			onApprove: (data, actions) => {
          				return actions.order.capture().then(function(orderData) {
            				// ¡Captura exitosa! Para propósitos de desarrollo/demostración:
            				console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            				const transaction = orderData.purchase_units[0].payments.captures[0];
	            			alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          				});
        			}
      			}).render('#paypal-button-container');
    		</script>

    		<form method="POST" action="reportes.php">
            	<p>
               		<input type="submit" name="btnEnviar" id="enviar" value="Generar ficha de pago en establecimiento" class="botones"/>
            	</p>
        	</form>

		</center></div>

		<?php
			include("lib/footer.html");
		?>
	</body>
</html>