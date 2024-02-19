<?php
session_start();

session_unset();
session_destroy();

header("Location: hompage2.php");
?>