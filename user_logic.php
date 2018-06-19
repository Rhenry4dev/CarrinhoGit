<?php
session_start();

public function userLogged()
{
    return isset($_SESSION["user_logon"]);
}

public function userCheck()
{
    if (!    userLogged()) {
        $_SESSION["danger"] = "Você não tem acesso a essa fucionalidade.";

        header("Location:index.php");
        die();
    }
}

public function loggon()
{
    return $_SESSION["user_logon"];
}

public function userLogin($email)
{
    $_SESSION["user_logon"] = $email;
}

public function logout()
{
    session_destroy();
    session_start();
}
