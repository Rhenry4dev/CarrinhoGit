<?php
require_once("db_user.php");
require_once("user_logic.php");

 $user = searchUser($connect, $_POST['email'], $_POST['password']);
 
if ($user == null) {
    $_SESSION['danger'] = "Usuário ou senha inválida.";
    header("Location: index.php");
} else {
    $_SESSION['success'] = "Logado com sucesso!";
    userLogin($user['email']);
    header("Location: index.php");
}

die();
