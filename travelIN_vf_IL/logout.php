<?php
	session_start();

	session_destroy();
	//echo "lllllllllllllllllllllllllllllllllllll";
	header("Location: index.php");

?>