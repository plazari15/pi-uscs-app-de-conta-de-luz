<?php

/**
 * Upload [HELPER]
 * Classe especializada no Upload de arqivos genéricos do sistema.
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Helpers;
class Upload {

    private $File;
    private $Name;
    Private $Send;

    /** IMAGE UPLOAD */
    private $Widht;
    private $Image;

    /** RESULT SET */
    private $Result;
    private $Error;

    /** DIRETORIOS */
    private $Folder;
    private static $BaseDir;

    function __construct($BaseDir = null) {
        self::$BaseDir = ( (string) $BaseDir ? $BaseDir : '../uploads/');
        if (!file_exists(self::$BaseDir) && !is_dir(self::$BaseDir)):
            mkdir(self::$BaseDir, 0777);
        endif;
    }

    /**
     * 
     * @param type $Image
     * @param type $Name
     * @param INT $Widht Define a largura padrão da imagem que será enviada. Caso não seja informada o sistema define 1024 como padrão, podendo
     * redimencionar acessando a classe e alterando o valor.
     * @param type $Folder
     */
    public function Image(array $Image, $Name = null, $Widht = null, $Folder = null) {
        $this->File = $Image;
        $this->Name = ((string) $Name ? $Name : substr($Image['name'], 0, strrpos($Image['name'], '.')));
        $this->Widht = ( (int) $Widht ? $Widht : 1024);
        $this->Folder = ( (string) $Folder ? $Folder : 'images');

        $this->CheckFolder($this->Folder);
        $this->SetFileName();
        $this->UploadImages();
    }

    public function File(array $File, $Name = null, $Folder = Null, $MaxFileSize = null) {
        $this->File = $File;
        $this->Name = ((string) $Name ? $Name : substr($File['name'], 0, strrpos($File['name'], '.')));
        $this->Folder = ( (string) $Folder ? $Folder : 'files');
        $MaxFileSize = ((int) $MaxFileSize ? $MaxFileSize : 10);

        $FileAccept = [
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf',
            
        ];

        if ($this->File['size'] > ($MaxFileSize * (1024 * 1024))):
            $this->Result = false;
            $this->Error = "Arquivo maior que o tamanho permitido de {$MaxFileSize} MB";
            elseif(!in_array($this->File['type'], $FileAccept)):
                $this->Result = false;
                $this->Error = 'Tipo de arquivo não aceito';
        else:
            $this->CheckFolder($this->Folder);
            $this->SetFileName();
            $this->MoveFile();
        endif;
    }
 public function Media(array $Media, $Name = null, $Folder = Null, $MaxFileSize = null) {
        $this->File = $Media;
        $this->Name = ((string) $Name ? $Name : substr($Media['name'], 0, strrpos($Media['name'], '.')));
        $this->Folder = ( (string) $Folder ? $Folder : 'media');
        $MaxFileSize = ((int) $MaxFileSize ? $MaxFileSize : 10);

        $FileAccept = [
           'audio/mp3',
            'audio/mp4'
        ];

        if ($this->File['size'] > ($MaxFileSize * (1024 * 1024))):
            $this->Result = false;
            $this->Error = "Arquivo maior que o tamanho permitido de {$MaxFileSize} MB";
            elseif(!in_array($this->File['type'], $FileAccept)):
                $this->Result = false;
                $this->Error = 'Tipo de arquivo não aceito';
        else:
            $this->CheckFolder($this->Folder);
            $this->SetFileName();
            $this->MoveFile();
        endif;
    }
    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    /**
     * ****************************************
     * *********** PRIVATE METODOS ************
     * ****************************************
     */
    private function CheckFolder($Folder) {
        list($y, $m) = explode('/', date('Y/m'));
        $this->CreateFolder("{$Folder}");
        $this->CreateFolder("{$Folder}/{$y}");
        $this->CreateFolder("{$Folder}/{$y}/{$m}/");
        $this->Send = "{$Folder}/{$y}/{$m}/";
    }

    private function CreateFolder($Folder) {
        if (!file_exists(self::$BaseDir . $Folder) && !is_dir(self::$BaseDir . $Folder)):
            mkdir(self::$BaseDir . $Folder, 0777);
        endif;
    }

    private function SetFileName() {
        $FileName = Check::Name($this->Name) . strrchr($this->File['name'], '.');
        if (file_exists(self::$BaseDir . $this->Send . $FileName)):
            $FileName = Check::Name($this->Name) . '-' . time() . strrchr($this->File['name'], '.');

        endif;
        $this->Name = $FileName;
    }

//Reliza o upload de imagens redirecionando a mesma!
    private function UploadImages() {
        switch ($this->File['type']):
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                $this->Image = imagecreatefromjpeg($this->File['tmp_name']);
                break;
            case 'image/png':
            case 'image/x-png':
                $this->Image = imagecreatefrompng($this->File['tmp_name']);
                break;

        endswitch;

        if (!$this->Image):
            $this->Result = false;
            $this->Error = "Arquivo Enviado não é válido, enviar imagens em Jpg ou PNG!";
        else:
            $x = imagesx($this->Image);
            $y = imagesy($this->Image);
            $ImageX = ($this->Widht < $x ? $this->Widht : $x);
            $ImageH = ($ImageX * $y) / $x;

            $newImage = imagecreatetruecolor($ImageX, $ImageH);
            imagealphablending($newImage, false);
            imagealphablending($newImage, true);
            imagecopyresampled($newImage, $this->Image, 0, 0, 0, 0, $ImageX, $ImageH, $x, $y);

            switch ($this->File['type']):
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($newImage, self::$BaseDir . $this->Send . $this->Name);
                    break;
                case 'image/png':
                case 'image/x-png':
                    imagepng($newImage, self::$BaseDir . $this->Send . $this->Name);
                    break;
            endswitch;
            if (!$newImage):
                $this->Result = false;
                $this->Error = "Arquivo Enviado não é válido, enviar imagens em Jpg ou PNG!";
            else:
                $this->Result = $this->Send . $this->Name;
                $this->Error = NULL;

                imagedestroy($this->Image);
                imagedestroy($newImage);
            endif;
        endif;
    }

//envia arquivos e mídias

    public function MoveFile() {
        if (move_uploaded_file($this->File['tmp_name'], self::$BaseDir . $this->Send . $this->Name)):
            $this->Result = $this->Send . $this->Name;
            $this->Error = null;
        else:
            $this->Result = false;
            $this->Error = 'Erro ao mover o arquivo. Por favor tente novamente mais tarde.';
        endif;
    }

}
