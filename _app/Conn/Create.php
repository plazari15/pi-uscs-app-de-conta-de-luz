<?php

/**
 * <b>Create.class</b>
 * Esta Classe se responsabiliza pelo cadastro generico no Banco de Dados!
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Conn;
use Conn\Conn as Conn;
class Create extends Conn {

    private $Tabela;
    private $Dados;
    private $Result;

    /**
     * @var PDOStatments */
    private $Create;

    /**
     * @var PDO */
    private $Conn;

    /**
     * <b>ExeCreate:</b> Executa um cadastro simplificado no Banco de dados, usando prepare statments.
     * Basta informar o nome da tabela e um array atribuitivo com o nome da coluna e o valor.
     * 
     * @param STRING $Tabela = Informe o nome da Tabela no Banco.
     * @param ARRAY $Dados = Informe um Array atribuitivo. (Nome da Coluna => Valor;)
     */
    public function ExeCreate($Tabela, array $Dados) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;

        $this->getSyntax();
        $this->Execute();
    }

    /**
     * <b>GetResult</b> Retorna um resultado falso ou retorna o último ID inserido na tabela caso cadastro seja bem sucedido.
     * @return Result Retorna false, ou retorna o último ID inserido na tabela criada usando ExeCriate. 
     */
    public function GetResult() {
        return $this->Result;
    }

    /**
     * ****************************************
     * *********** PRIVATE METODOS ************
     * ****************************************
     */
    //Obtem as informações e prepara a Query para ser executada
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($this->Create);
    }

    //Cria a sintaxe da Query para que ela possa ser executada no banco, isso usando Prepared Statments que fará com que possa ser executada
    //a sintaxe de uma forma dinamica, mudando os dados no próprio arquivo.
    private function getSyntax() {
        $Fields = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $this->Create = "INSERT INTO {$this->Tabela} ({$Fields}) VALUES ({$Places})";
    }

    //Obtem todos os dados acima como a Syntaxe e a conexão com o banco de dados para no fim executar a Query.
    //Obtém a Conexão e a Syntax, executa a query!
    private function Execute() {
        $this->Connect();
        try {
            $this->Create->execute($this->Dados);
            $this->Result = $this->Conn->lastInsertId();
        } catch (Exception $e) {
            $this->Result = null;
            WSErro("<b>Erro ao Cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
