<?php
	session_start();
	session_destroy();

	echo'<META HTTP-EQUIV="REFRESH" CONTENT=".5;URL=index.php">';
?>