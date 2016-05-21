<?php

/**
 * Login.class [MODEL]
 * Responsável por autenticar, validar e checar usuarios no sistema de login!
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Models;
class Login {

    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Informar Level:</b> Informe o nÃ­vel de acesso mÃ­nimo para a Ã¡rea a ser protegida.
     * @param INT $Level = NÃ­vel mÃ­nimo para acesso
     */
    function __construct($Level) {
        $this->Level = (int) $Level;
    }

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com Indices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login ao ser  feito!
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin(array $UserData) {
        $this->Email = (string) strip_tags(trim($UserData['Email']));
        $this->Senha = (string) strip_tags(trim($UserData['Senha']));
        $this->SetLogin();
    }

    /**
     * <b>Verificar Login:</b> Executando um getResult para verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse mÃ©todo para verificar a sessÃ£o USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessÃ£o e retorna false!
     */
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['level'] > $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function SetLogin() {
        if (!$this->Email || !$this->Senha || !Check::Email($this->Email)):
            $this->Error = ['Informe seu email e a sua senha para realizar o seu login.', WS_ALERT];
            $this->Result = false;
        elseif (!$this->GetUser()):
            $this->Error = ['Os dados informados não são compatíveis.', WS_ALERT];
            $this->Result = FALSE;
        elseif ($this->Result['level'] < $this->Level):
            $this->Error = ["<strong>{$this->Result['user_name']}</strong>, você não tem permissão para acessar esta área!", WS_ERROR];
            $this->Result = false;
        else:
            $this->Execute();

        endif;
    }

//Vetifica usuário e senha no banco de dados!
    private function GetUser() {
        $this->Senha = hash(Cript, $this->Senha);

        $read = new Read;
        $read->ExeRead("cloud_user", "WHERE user_email = :e AND user_pass = :p", "e={$this->Email}&p={$this->Senha}");
        if ($read->GetResult()):
            $this->Result = $read->GetResult()[0];
            return true;
        else:
            return false;
        endif;
    }

    //Executa o login armazenando a sessão!
    private function Execute() {
        if (!session_id()):
            session_start();
        endif;
        $_SESSION['userlogin'] = $this->Result;
        $this->Error = ["Olá {$this->Result['user_name']}, seja bem vindo(a). Aguarde Redirecionamento", WS_ACCEPT];
        $this->Result = true;
    
        // $_SESSION['userlogin'] = 
        }

}
