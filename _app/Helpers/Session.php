<?php

/**
 * Session.class [HELPER]
 * Classe responsável pelas estátisticas, sessões e atualizações de trafego do sistema!
 * 
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Helpers
class Session {

    private $Date;
    private $Cache;
    private $Traffic;
    private $Browser;

    function __construct($Cache = NULL) {
        session_start();
        $this->CheckSession($Cache);
    }

//Verifica e executa todos os metodos da Classe!
    private function CheckSession($Cache = null) {
        $this->Date = date('Y-m-d');
        $this->Cache = ((int) $Cache ? $Cache : 20);

        if (empty($_SESSION['useronline'])):
            $this->setTraffic();
            $this->setSession();
            $this->CheckBrowser();
            $this->SetUsuario();
            $this->BrowserUpdate();
        else:
            $this->TrafficUpdate();
            $this->SessionUpdate();
            $this->CheckBrowser();
            $this->UsuarioUpdate();
        endif;

        $this->Date = null;
    }

    /*
     * ***************************************
     * ********   SESSÃO DO USUÁRIO   ********
     * ***************************************
     */

//Inicia a sessao do Usuario
    private function SetSession() {
        $_SESSION['useronline'] = [
            "online_session" => session_id(),
            "online_startview" => date('Y-m-d H:i:s'),
            "online_endview" => date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes")),
            "online_ip" => filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP),
            "online_url" => filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT),
            "online_agent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT", FILTER_DEFAULT)
        ];
    }

    //Atualiza a sessao do Usuario
    private function SessionUpdate() {
        $_SESSION['useronline']['online_endview'] = date('Y-m-d H:i:s', strtotime("+{$this->Cache}minutes"));
        $_SESSION['useronline']['online_url'] = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }

    /*
     * ***************************************
     * *** USUÁRIOS, VISITAS, ATUALIZAÇÕES ***
     * ***************************************
     */

    //verifica e insere o tráfico na Tabela
    private function setTraffic() {
        $this->getTraffic();
        if (!$this->getTraffic()):
            $ArrSiteViews = ['siteviews_date' => $this->Date, 'siteviews_users' => 1, 'siteviews_views' => 1, 'siteviews_pages' => 1];
            $createSiteViews = new Create;
            $createSiteViews->ExeCreate('ws_siteviews', $ArrSiteViews);
        else:
            if (!$this->getCokie()):
                $ArrSiteViews = ['siteviews_users' => $this->Traffic['siteviews_users'] + 1, 'siteviews_views' => $this->Traffic['siteviews_views'] + 1, 'siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
            else:
                $ArrSiteViews = ['siteviews_views' => $this->Traffic['siteviews_views'] + 1, 'siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
            endif;

            $updateSiteViews = new Update;
            $updateSiteViews->ExeUpdate('ws_siteviews', $ArrSiteViews, 'WHERE siteviews_date = :date', "date={$this->Date}");
        endif;
    }

    //Verifica e atualiza os PageViews
    private function TrafficUpdate() {
        $this->getTraffic();
        $ArrSiteViews = ['siteviews_pages' => $this->Traffic['siteviews_pages'] + 1];
        $updatePageViews = new Update;
        $updatePageViews->ExeUpdate('ws_siteviews', $ArrSiteViews, 'WHERE siteviews_date = :date', "date={$this->Date}");

        $this->Traffic = null;
    }

    //Obtem dados da Tabela! [HELPER TRAFIC]
    private function getTraffic() {
        //ws_siteviews
        $readSiteviews = new Read;
        $readSiteviews->ExeRead('ws_siteviews', "WHERE siteviews_date = :date", "date={$this->Date}");
        if ($readSiteviews->GetRowCount()):
            $this->Traffic = $readSiteviews->GetResult()[0];
        endif;
    }

    //Verifica, cria e atualiza os cookies do usuario!
    private function getCokie() {
        $Cookie = filter_input(INPUT_COOKIE, 'user online', FILTER_DEFAULT);
        //pode ser alterado "PedroLazari" para o nome do novo site!
        setcookie('user online', base64_encode("PedroLazari"), time + 86400);
        if (!$Cookie):
            return false;
        else:
            return TRUE;
        endif;
    }

    /*
     * ***************************************
     * *******  NAVEGADORES DE ACESSO   ******
     * ***************************************
     */

//Indentifica navegador do usuario
    private function CheckBrowser() {
        $this->Browser = $_SESSION['useronline']['online_agent'];
        if (strpos($this->Browser, 'Chrome')):
            $this->Browser = 'Chrome';
        elseif (strpos($this->Browser, 'Firefox')):
            $this->Browser = 'Firefox';
        elseif (strpos($this->Browser, 'MSIE') || strpos($this->Browser, 'Trident/')):
            $this->Browser = 'Internet Explorer';
        else:
            $this->Browser = 'Outros';
        endif;
    }

//    atualiza tabela com dados de navegadores
    private function BrowserUpdate() {
        $readAgent = new Read;
        $readAgent->ExeRead('ws_siteviews_agent', "WHERE agent_name = :agent", "agent={$this->Browser}");
        if (!$readAgent->GetResult()):
            $ArrAgent = [
                'agent_name' => $this->Browser,
                'agent_views' => 1
            ];
            $CreateAgent = new Create;
            $CreateAgent->ExeCreate('ws_siteviews_agent', $ArrAgent);
        else:
            $ArrAgent = ['agent_views' => $readAgent->GetResult()[0]['agent_views'] + 1];
            $updateAgent = new Update;
            $updateAgent->ExeUpdate('ws_siteviews_agent', $ArrAgent, 'WHERE agent_name = :name', "nema={$this->Browser}");

        endif;
    }

    /*
     * ***************************************
     * *********   USUÁRIOS ONLINE   *********
     * ***************************************
     */

    //Cadastra Usuario Online na Tabela!

    private function SetUsuario() {
        $sesOnline = $_SESSION['useronline'];
        $sesOnline['agent_name'] = $this->Browser;

        var_dump($sesOnline);

        $userCreate = new Create;
        $userCreate->ExeCreate('ws_siteviews_online', $sesOnline);
    }

    //Atualiza navegação do usuario Online
    private function UsuarioUpdate() {
        $ArrOnline = [
            'online_endview' => $_SESSION['useronline']['online_endview'],
            'online_url' => $_SESSION['useronline']['online_url']
        ];
        $onlineUpdate = new Update;
        $onlineUpdate->ExeUpdate('ws_siteviews_online', $ArrOnline, "WHERE online_session = :ses", "ses={$_SESSION['useronline']['online_session']}");


        if (!$onlineUpdate->GetRowCount()):
            $readSes = new Read;
            $readSes->ExeRead('ws_siteviews_online', "WHERE online_session = :onses", "onses={$_SESSION['useronline']['online_session']}");
            if(!$readSes->GetRowCount()):
            $this->SetUsuario();
            endif;
        endif;

//        var_dump($ArrOnline);
    }

}
