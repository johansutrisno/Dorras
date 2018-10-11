<?php
	session_start();
	session_destroy();
    //echo "kamu telah logout";
    header("Location: index.php");
?>