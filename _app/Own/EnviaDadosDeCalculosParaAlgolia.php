<?php
/**
 * Esta classe faz o envio dos dados do usuário para o sistema da Algolia, caso o usuário queira tornar os mesmos
 * públicos
 * Version 1.0.0
 */

namespace Own;



use AlgoliaSearch\Client;

class EnviaDadosDeCalculosParaAlgolia extends Client
{
    protected $UserID;
    protected $Bandeira;
    protected $Kwh;
    protected $Valor;

    /**
     * EnviaDadosDeCalculosParaAlgolia constructor.
     * @param string $UserID
     */
    function __construct($UserID)
    {
        parent::__construct(getenv('ALGOLIA_APP'), getenv("ALGOLIA_SECRET"));
        $this->UserID = $UserID;
    }

    public function EnviaDadosParaAlgolia($Bndeira, $Kwh, $Valor)
    {
        $this->Bandeira = $Bndeira;
        $this->Kwh = $Kwh;
        $this->Valor = $Valor;

        return true;
        
        

    }

    /**************************************
     *********  PROTECTED METHODS  ********
     **************************************/

    protected function EnviaOsDadosViaAPiAlgolia()
    {

    }

}