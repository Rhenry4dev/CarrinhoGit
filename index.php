<?php
require_once("header.php");
require_once("user_logic.php");
include("composer.json");
?>
            <h1>Bem vindo! </h1>

<?php

if (userLogged()) {
    ?>
        <p class ="text-success">Você está logado como <?= loggon()?>. <a href="logout.php">Deslogar</a> </p>
    <?php

    die();
} else {
    ?>
            <h2>Login:</h2>
            <form class= "table" action="login.php" method="post">
            <table class = "table">
                <tr>
                    <td>Email: </td>
                    <td><input class="form-control" type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input class="form-control" type="password" name="password"></td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary">Login</button></td>
                </tr>
            </table>
    <?php
}
    require_once("footer.php");
?>
