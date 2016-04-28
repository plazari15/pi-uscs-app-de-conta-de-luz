<?php
/**
 * Esta classe faz o envio dos dados do usuário para o sistema da Algolia, caso o usuário queira tornar os mesmos
 * públicos
 * Version 1.0.0
 */

namespace Own;



use AlgoliaSearch\Client as Algolia;

class EnviaDadosDeCalculosParaAlgolia extends Algolia
{
    private $Bandeira;
    private $Mes;
    private $DataProcessamento;
    private $Kwh;
    private $ValorConta;
    private $ValorComICMS;
    private $TipoConta;

    /**
     * EnviaDadosDeCalculosParaAlgolia constructor.
     * @param string $UserID
     */
    function __construct($Bandeira, $Mes, $DataProcessamento, $Kwh, $ValorConta, $ValorICMS, $TipoConta)
    {
        parent::__construct(getenv('ALGOLIA_APP'), getenv("ALGOLIA_SECRET"));
        $this->Bandeira = $Bandeira;
        $this->Mes = $Mes;
        $this->DataProcessamento;
        $this->Kwh = $Kwh;
        $this->ValorConta = $ValorConta;
        $this->ValorComICMS = $ValorICMS;
        $TipoConta = $TipoConta;

    }

    public function Resultado()
    {

        if($this->EnviaOsDadosViaAPiAlgolia()){
            return true;
        }

        return false;

    }

    /**************************************
     *********  PROTECTED METHODS  ********
     **************************************/

    private function EnviaOsDadosViaAPiAlgolia()
    {
        $Cliente = $this->initIndex('calculos');
        $Obj = $Cliente->addObject(array(
            "Mes" => $this->Mes,
            "Bandeira"      => $this->Bandeira,
            "DataProcessamento"    => $this->DataProcessamento,
            "kwh"             => $this->Kwh,
            "ValorConta"   => $this->ValorConta,
            "ValorComICMS" => $this->ValorComICMS,

        ));

        if(!empty($Obj['objectID'])){
            return true;
        }
        return false;
    }

}