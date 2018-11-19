<?php
require 'Tarefa.php';

if (!isset($_GET['id']) || empty($_GET['id']))
{
    echo "Você não passou um ID";
    exit();
}

$dados = new Tarefa();
$tarefa = $dados->getTarefa($_GET['id']);

if ($tarefa == false)
{
    echo "Tarefa não encontrada";
    exit();
}

if ($dados->excluir($_GET['id']))
{
    header("Location: /");
    exit();
} else
{
    echo "Ocorreu um erro";
    exit();
}

?>