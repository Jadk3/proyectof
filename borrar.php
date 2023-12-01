<?php
	session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript"  src="./js/scripts.js"></script>
	</head>
	
	<body>
		<?php
			header("Location: ".$_SERVER['HTTP_REFERER']."");
			unset($_SESSION['carrito']);
			echo '<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php">';
		?>
	</body>
</html>