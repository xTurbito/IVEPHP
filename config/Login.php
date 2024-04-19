<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		die ("<script>parent.location.href = 'login.php'</script>");
	}
?>