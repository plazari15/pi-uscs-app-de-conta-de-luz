<?php

/**
 * <b>Read.class</b>
 * Esta Classe se responsabiliza pelo leitura generica no Banco de Dados!
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Conn;
use \Conn\Conn as Conn;
class Read extends Conn {

    private $Select;
    private $Places;
    private $Result;

    /**
     * @var PDOStatments */
    private $Read;

    /**
     * @var PDO */
    private $Conn;
/**
     * <b>Exe Read:</b> Executa uma leitura simplificada com Prepared Statments. Basta informar o nome da tabela,
     * os termos da seleção e uma analize em cadeia (ParseString) para executar.
     * @param STRING $Tabela = Nome da tabela
     * @param STRING $Termos = WHERE | ORDER | LIMIT :limit | OFFSET :offset
     * @param STRING $ParseString = link={$link}&link2={$link2}
     */
    public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
        if (!empty($ParseString)):
            $this->Places = $ParseString;
            parse_str($ParseString, $this->Places);
        endif;
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
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
        return $this->Read->rowCount();
    }

    /**
     * <b>Full Read:</b> Executa leitura de dados via query que deve ser montada manualmente para possibilitar
     * seleção de multiplas tabelas em uma única query!
     * @param STRING $Query = Query Select Syntax
     * @param STRING $ParseString = link={$link}&link2={$link2}
     */
    public function FullRead($Query, $ParseString = null) {

        $this->Select = (string) $Query;
        if (!empty($ParseString)):
            $this->Places = $ParseString;
            parse_str($ParseString, $this->Places);
        endif;
        $this->Execute();
    }
    
    public function SetPlaces($ParseString) {
        parse_str($ParseString, $this->Places);
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
        $this->Read = $this->Conn->prepare($this->Select);
        $this->Read->setFetchMode(\PDO::FETCH_ASSOC);
    }

    //Cria a sintaxe da query para Prepared Statements
    private function getSyntax() {
        if ($this->Places):
            foreach ($this->Places as $Vinculo => $Valor):
                if ($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int) $Valor;
                endif;
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? \PDO::PARAM_INT : \PDO::PARAM_STR));
            endforeach;
        endif;
    }

    //Obtém a Conexão e a Syntax, executa a query!
    private function Execute() {
        $this->Connect();
        try {
            $this->getSyntax();
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            WSErro("<b>Erro ao Ler:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
