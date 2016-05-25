<?php
/**
 * Created by PhpStorm.
 * User: Plazari
 * Date: 20/05/2016
 * Time: 14:29
 */

namespace Own;


use Conn\Create;
use Helpers\Check;

class CadastroUsuario
{
    protected $Array;


    function __construct($Array)
    {
        $this->Array = $Array;
        if(Check::Email($this->Array['email'])){
            //Vai Cadastrar
        }

        return false;

    }

    public function CriarConta(){
        if($this->CriaConta()){
            return true;
        }
        return false;
    }

    
    protected function CriaConta(){
        $this->Array['timestamp'] = date('Y-m-d H:i:s');
        $this->Array['level'] = 1;
        $this->Array['password'] = hash(Cript, $this->Array['password']);
        $this->Array['token'] = hash(Cript, $this->Array['token']);
        $Create = new Create();
        $Create->ExeCreate('usuarios', $this->Array);
        if($Create->GetResult()){
            return true;
        }
        return false;
    }
}