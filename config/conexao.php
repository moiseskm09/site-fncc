<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "u596471878_sistema_fncc";

$conexao = mysqli_connect ($host, $user, $pass) or die (mysqli_error("falha na conexao"));
mysqli_set_charset($conexao, "utf8");
mysqli_select_db($conexao, $banco) or die (mysqli_error("banco de dados nao encontrado"));
