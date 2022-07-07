<?php

session_start();

$_SESSION["LOGIN"] = "";
unset($_SESSION["LOGIN"]);

header("location: ../index.php")


?>