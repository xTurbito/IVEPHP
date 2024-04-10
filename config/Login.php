<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		die ("<script>parent.location.href = 'http://localhost/login.php'</script>");
	}
?>