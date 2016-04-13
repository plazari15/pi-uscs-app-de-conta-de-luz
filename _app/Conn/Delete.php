<?php

/**
 * <b>Delete.class</b>
 * Esta Classe se responsabiliza por deletar iténs genéricos no Banco de Dados!
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Conn;
use \Conn\Conn as Conn;
class Delete extends Conn {

    private $Tabela;
    private $Termos;
    private $Places;
    private $Result;

    /**
     * @var PDOStatments */
    private $Delete;

    /**
     * @var PDO */
    private $Conn;

    /**
     * <b>Exe Delete:</b> Deleta de forma simplificada os atributos de uma tabela no banco de dados
     * pelo uso de ParseString e prepare Statments deixando assim de forma bem simples o delete 
     * generico no banco. 
     * @param STRING $Tabela = Nome da Tabela
     * @param String $Termos = WHERE coluna = :link AND.. OR..
     * @param STRING $ParseString = link={$link}&link2={$link2}
     */
    public function ExeDelete($Tabela, $Termos, $ParseString) {
        $this->Tabela = (string) $Tabela;
        $this->Termos = (string) $Termos;

        parse_str($ParseString, $this->Places);
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
     * <b>Contar Registros: </b> Retorna o número de registros encontrados pelo select!
     * @return INT $Var = Quantidade de registros encontrados
     */
    public function GetRowCount() {
        return $this->Delete->rowCount();
    }

    public function SetPlaces($ParseString) {
        parse_str($ParseString, $this->Places);
        $this->getSyntax();
        $this->Execute();
    }

    /**
     * ****************************************
     * *********** PRIVATE METODOS ************
     * ****************************************
     */
    //Obtém o PDO e Prepara a query
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Delete = $this->Conn->prepare($this->Delete);
    }

    //Cria a sintaxe da query para Prepared Statements
    private function getSyntax() {
        $this->Delete = "DELETE FROM {$this->Tabela} {$this->Termos}";
    }

    //Obtém a Conexão e a Syntax, executa a query!
    private function Execute() {
        $this->Connect();
        try {
            $this->Delete->execute($this->Places);
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result = null;
            WSErro("<b>Erro ao Deletar:</b> {$e->getMessage()}", $e->getCode());
            die;
        }
    }

}
