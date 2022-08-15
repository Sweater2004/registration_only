<?php
$conect = mysqli_connect('localhost', 'root', 'root', 'rigistration_bd');
if (!$conect) {
    die("Error connect to DataBase");
}
