<style type="text/css">
    input[type=checkbox]:checked ~ label {
        text-decoration: line-through;
    }
</style>


<?php
require 'Tarefa.php';

//echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">";
echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>";

$dados = new Tarefa;
$dados->conectar();

$tarefas = $dados->getTarefas();

echo "<div class='card'>";

    echo "<div class='card-header'>";
        echo "<h2 class='h2'>TODOList</h2>";
    echo "</div>";

    echo "<div class='card-body text-center'>";
        echo "<h3 class='h3'>Tarefas</h3>";

        echo "<form method='post' action='adicionar.php' class='form-inline justify-content-center'>";

            echo "<div class='form-group mx-sm-3 mb-2'>";
                echo "<input type='text' name='conteudo' placeholder='Nova Tarefa' class='form-control'>";
            echo "</div>";
            echo "<input class='btn btn-primary mb-2' type='submit' name='adicionar' value='Adicionar'><br>";

        echo "</form>";

        $i=0;
        foreach ($tarefas as $tarefa) {

            echo "<div class='row justify-content-center'>";

                echo "<div class='col-auto my-1'>";
                echo "<div class='custom-control custom-checkbox'>";
                    echo "<input type='checkbox' class='custom-control-input' id='$i'>";
                        echo "<label class='custom-control-label mr-2' for='$i'>" .$tarefa['conteudo']."</label>";
                        echo "<a href='excluir.php?id=" .$tarefa['id']. "'><img src='/img/x.png' style='height: 20px; width: 20px;'></a>";
                echo "</div>";
                echo "</div>";

            echo "</div>";
            $i++;
        }

    echo "</div>";

echo "</div>";
?>


