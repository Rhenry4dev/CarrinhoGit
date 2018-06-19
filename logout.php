<?php
require_once("user_logic.php");

logout();

$_SESSION['success'] = "Deslogado com sucesso!";

header("Location: index.php");
die();
