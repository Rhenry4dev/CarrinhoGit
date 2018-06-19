<?php
session_start();

public function showAlert($type)
{
    if (isset($_SESSION[$type])) {
        ?>
        <p class="text-<?= $type ?>"> <?= $_SESSION[$type]?> </p>
        <?php
        unset($_SESSION["$type"]);
    }
}
