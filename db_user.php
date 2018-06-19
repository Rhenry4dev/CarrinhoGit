<?php
require_once("connect.php");

public function searchUser($connect, $email, $password)
{
    $passwordMD5 = md5($password);
    $email = mysqli_real_escape_string($connect, $email);

    $query = "
    	SELECT * FROM users WHERE email='{$email}' AND password='{$passwordMD5}'
    ";

    $resultado = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($resultado);
    
    return $user;
}
