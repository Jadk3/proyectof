<?php
	ob_start();
	include './conexion.php';
	session_start();
	/*$arreglo = $_SESSION['carrito'];*/
?>

<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PDF</title>
		
		<style>
			table, th, td {
			  border: solid black;
			  padding: 1em;
			  font-family: Arial;
			}
		</style>
	</head>

	<body>
		<?php
			if(isset($_POST['btnEnviar'])){
		?>
			<table>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Codigo</th>
					<!--<th>Cantidad</th>-->
					<th>Imagen</th>
				</tr>
				
				<?php
					$re=mysqli_query($conexion,"SELECT * FROM producto /*where id='carrito'*/");
					if (mysqli_num_rows($re) > 0) {
						while ($f=mysqli_fetch_array($re)) {
							$nombre=$f['nombre'];
							$precio=$f['precio'];
							$codigo=$f['codigo'];
							$imagen=$f['imagen'];
					
				?>
							<tr>
								<td><?php echo $nombre ?></td>
								<td><?php echo $precio ?></td>
								<td><?php echo $codigo ?></td>
								<!--<td><?php echo $cantidad ?></td>-->
								<td><img src="<?php echo $imagen ?>" height="100" alt=""></td>
							</tr>
				<?php
						}
					} else {
                        echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">sin elementos</td></tr>';
                    }
				?>
			</table>

		<?php } ?>
			
	</body>
</html>

<?php
	$html = ob_get_clean();
	require_once 'lib/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	use Dompdf\Options;
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new Dompdf();
	$options = $dompdf->getOptions();
	$options->set(array('isRemoteEnabled' => true));
	$dompdf->setOptions($options);
	$dompdf->loadHtml($html);
	$dompdf->setPaper('letter');
	$dompdf->render();
	$dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>