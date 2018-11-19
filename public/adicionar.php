<?php
require 'Tarefa.php';

if (isset($_POST) && sizeof($_POST) > 0)
{
    $dados = new Tarefa();
    $dados->adicionar($_POST);

    header("Location: /");
    exit;
}

?>