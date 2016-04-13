<?php

//require('_app/Library/PHPMailer/class.phpmailer.php');
//require ('../_app/Library/PHPMailer/class.phpmailer.php');
if (file_exists('../_app/Library/PHPMailer/class.phpmailer.php')):
 require '../_app/Library/PHPMailer/class.phpmailer.php';
 else:
    require '_app/Library/PHPMailer/class.phpmailer.php';

endif;

//if (!file_exists('../_app/Library/PHPMailer/class.phpmailer.php')):
//   require '../../_app/Library/PHPMailer/class.phpmailer.php';
//endif;
/**
 * Email.class [MODEL]
 * Modelo responsável por configurar a PHP mailer, validar os dados e disparar os emails do sistema!    
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Models;
class Email {

    /** @var PHPMailer */
    private $Mail;

    /** EMAIL DATA */
    private $Data;
    //** CORPO DO EMAIL */
    private $Assunto;
    private $Mensagem;

    /** REMETENTE */
    private $RemetenteNome;
    private $RemetenteEmail;

    /** DESTINO */
    private $DestinoNome;
    private $DestinoEmail;

    /*     * Private Controller */
    private $Error;
    private $Result;

    function __construct() {
        $this->Mail = new PHPMailer;
        $this->Mail->Host = MAILHOST;
        $this->Mail->Port = MAILPORT;
        $this->Mail->Username = MAILUSER;
        $this->Mail->Password = MAILPASS;
        $this->Mail->CharSet = 'UTF-8';
    }

    public function Enviar(array $Data) {
        $this->Data = $Data;
        $this->Clear();

        if (in_array('', $this->Data)):  //Verifica aqui se tem campos em branco
            $this->Error = ['Erro ao enviar mensagem, para enviar o email preencha todos os campos', WS_ALERT];
            $this->Result = FALSE;
        elseif (!Check::Email($this->Data['RemetenteEmail'])):
            $this->Error = ['Erro ao enviar mensagem, para enviar o email preencha todos os campos', WS_ALERT];
            $this->Result = FALSE;
        else:
            $this->SetMail();
            $this->Config();
            $this->SendMail();
        endif;
    }

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    //privates

    private function Clear() {
        array_map('strip_tags', $this->Data);
        array_map('trim', $this->Data);
    }

    private function SetMail() {
        $this->Assunto = $this->Data['Assunto'];
        $this->Mensagem = $this->Data['Mensagem'];
        $this->RemetenteNome = $this->Data['RemetenteNome'];
        $this->RemetenteEmail = $this->Data['RemetenteEmail'];
        $this->DestinoNome = $this->Data['DestinoNome'];
        $this->DestinoEmail = $this->Data['DestinoEmail'];
        $this->Data = null;
        $this->setMsg();
    }

    private function SetMsg() {
        $this->Mensagem = "{$this->Mensagem}<hr><small> Recebida em " . date('d/m/Y H:i') . "</small>";
    }

    private function Config() {
        //SMTP AUTH
        $this->Mail->IsSMTP();
        $this->Mail->SMTPAuth = true;
        $this->Mail->IsHTML();

        //REMETENTE E RETORNO
        $this->Mail->From = MAILUSER;
        $this->Mail->FromName = $this->RemetenteNome;
        $this->Mail->AddReplyTo($this->RemetenteEmail, $this->RemetenteNome);

        //ASSUNTO, MENSAGEM E DESTINO
        $this->Mail->Subject = $this->Assunto;
        $this->Mail->Body = $this->Mensagem;
        $this->Mail->AddAddress($this->DestinoEmail, $this->DestinoNome);
    }

    private function SendMail() {
        if ($this->Mail->Send()):
            $this->Error = ['Obrigado por entrar em contato. Seu email será respondido em breve!', WS_ACCEPT];
            $this->Result = true;
        else:
            $this->Error = ["Erro ao enviar email. Entre em contato com o desenvolvedor. ({$this->Mail->ErrorInfo})", WS_ERROR];
            $this->Result = FALSE;
        endif;
    }

}
