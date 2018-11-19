<?php
/**
 * 
 */
class Tarefa
{
	protected $conexao = null;
	
	public function __construct()
	{
		$this->conectar();
	}

	public function conectar()
	{
		$this->conexao = new PDO("mysql:host=localhost;dbname=todolist", "root", "root");
	}

	public function getTarefas()
	{
		$comando = $this->conexao->prepare("SELECT * FROM tarefas ORDER BY id DESC");
		$comando->execute();
		return $comando;
	}

	public function getTarefa($id)
    {
        $sql = "SELECT * FROM tarefas WHERE id = :id LIMIT 1";
        $comando = $this->conexao->prepare($sql);

        $valor = [':id' => $id];
        $comando->execute($valor);

        return $comando->fetch(PDO::FETCH_ASSOC);
    }

	public function adicionar($dados)
    {
        $comando = $this->conexao->prepare(
            "INSERT INTO tarefas (conteudo) 
                VALUES (:conteudo)"
        );
        $dados = [
            ':conteudo' => $dados['conteudo'],
        ];

        $comando->execute($dados);
    }

    public function excluir($id)
    {
        $comando = $this->conexao->prepare(
            "DELETE FROM tarefas WHERE id = :id"
        );
        $dados = [
            ':id' => $id,
        ];
        return $comando->execute($dados);
    }
}

?>