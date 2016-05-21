<?php

/**
 * Pager.class [HELPER]
 * Realiza a Gestão e a páginação dos resultados do sistema!
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Helpers;
class Pager {

    /** DEFINE O PAGER */
    private $Page;
    private $Limit;
    private $Offset;

    /** REALIZA A LEITURA */
    private $Tabela;
    private $Termos;
    private $Places;

    /** DEFINE O PAGINATOR */
    private $Rows;
    private $Link;
    private $MaxLinks;
    private $First;
    private $Last;

    /** RENDERIZA O PAGINATOR */
    private $Paginator;
/**
     * <b>Iniciar PaginaÃ§Ã£o:</b> Defina o link onde a paginaÃ§Ã£o serÃ¡ recuperada. VocÃª ainda pode mudar os textos
     * do primeiro e Ãºltimo link de navegaÃ§Ã£o e a quantidade de links exibidos (opcional)
     * @param STRING $Link = Ex: index.php?pagina&page=
     * @param STRING $First = Texto do link (Primeira PÃ¡gina)
     * @param STRING $Last = Texto do link (Ãšltima PÃ¡gina)
     * @param STRING $MaxLinks = Quantidade de links (5)
     */
    function __construct($Link, $First = null, $Last = null, $MaxLinks = null) {
        $this->Link = (string) $Link;
        $this->First = ( (string) $First ? $First : 'Primeira Página' );
        $this->Last = ( (string) $Last ? $Last : 'Última Página' );
        $this->MaxLinks = ( (int) $MaxLinks ? $MaxLinks : 5);
    }
/**
     * <b>Executar Pager:</b> Informe o Indice da URL que vai recuperar a navegaÃ§Ã£o e o limite de resultados por pÃ¡gina.
     * Você devere usar LIMIT getLimit() e OFFSET getOffset() na query que deseja paginar. A página atual está em getPage()
     * @param INT $Page = Recupere a pÃ¡gina na URL
     * @param INT $Limit = Defina o LIMIT da consulta
     */
    public function ExePager($Page, $Limit) {
        $this->Page = ( (int) $Page ? $Page : 1 );
        $this->Limit = (int) $Limit;
        $this->Offset = ($this->Page * $this->Limit) - $this->Limit;
    }
 /**
     * <b>Retornar:</b> Caso informado uma page com número maior que os resultados, este método navega a páginação
     * em retorno atÃ© a pÃ¡gina com resultados!
     * @return LOCATION = Retorna a página
     */
    public function ReturnPage() {
        if ($this->Page > 1):
            $nPage = $this->Page - 1;
            header("Location: {$this->Link}{$nPage}");

        endif;
    }
/**
     * <b>Obter Página:</b> Retorna o nÃºmero da pÃ¡gina atualmente em foco pela URL. Pode ser usada para validar
     * a navegaÃ§Ã£o da paginação!
     * @return INT = Retorna a pÃ¡gina atual
     */
    public function getPage() {
        return $this->Page;
    }
 /**
     * <b>Limite por PÃ¡gina:</b> Retorna o limite de resultados por página da paginaçã. Deve ser usada na SQL que obtém
     * os resultados. Ex: LIMIT = getLimit();
     * @return INT = Limite de resultados
     */
    public function getLimit() {
        return $this->Limit;
    }
/**
     * <b>Offset por PÃ¡gina:</b> Retorna o offset de resultados por página da paginação. Deve ser usada na SQL que obtém
     * os resultado. Ex: OFFSET = getLimit();
     * @return INT = Offset de resultados
     */
    public function getOffset() {
        return $this->Offset;
    }
/**
     * <b>Executar PaginaÃ§Ã£o:</b> Cria o menu de navegaÃ§Ã£o de paginaÃ§Ã£o dentro de uma lista nÃ£o ordenada com a class paginator.
     * Informe o nome da tabela e condiÃ§Ãµes caso exista. O resto Ã© feito pelo mÃ©todo. Execute um <b>echo getPaginator();</b>
     * para exibir a paginaÃ§Ã£o na view.
     * @param STRING $Tabela = Nome da tabela
     * @param STRING $Termos = CondiÃ§Ã£o da seleÃ§Ã£o caso tenha
     * @param STRING $ParseString = Prepared Statements
     */
    public function ExePaginator($Tabela, $Termos = null, $ParseString = null) {
        $this->Tabela = (string) $Tabela;
        $this->Termos = (string) $Termos;
        $this->Places = (string) $ParseString;
        $this->GetSyntax();
    }
/**
     * <b>Exibir Paginação:</b> Retorna os links para a paginação de resultados. Deve ser usada com um echo para exibição.
     * Para formatar as classes são: ul.paginator, li a e li .active.
     * @return HTML = PaginaÃ§Ã£o de resultados
     */
    public function GetPaginator() {
        return $this->Paginator;
    }

    /**
     * ****************************************
     * *********** PRIVATE METODOS ************
     * ****************************************
     */
    private function GetSyntax() {
        $Read = new Read;
        $Read->ExeRead($this->Tabela, $this->Termos, $this->Places);
        $this->Rows = $Read->GetRowCount();
        if ($this->Rows > $this->Limit):
            $Paginas = ceil($this->Rows / $this->Limit);
            $MaxLinks = $this->MaxLinks;

            $this->Paginator = "<ul class=\"paginator\">";
            $this->Paginator .= "<li><a title=\"{$this->First}\" href=\"{$this->Link}1\">{$this->First}</a></li>";
            for ($iPag = $this->Page - $MaxLinks; $iPag <= $this->Page - 1; $iPag ++):
                if ($iPag >= 1):
                    $this->Paginator .= "<li><a title=\"Página {$iPag}\" href=\"{$this->Link}{$iPag}\">{$iPag}</a></li>";
                endif;
            endfor;
            
            $this->Paginator .="<li><span class=\"current\">{$this->Page}</span></li>";
            
             for ($dPag = $this->Page + 1; $dPag <= $this->Page + $MaxLinks; $dPag ++):
                if ($dPag <= $Paginas):
                    $this->Paginator .= "<li><a title=\"Página {$dPag}\" href=\"{$this->Link}{$dPag}\">{$dPag}</a></li>";
                endif;
            endfor;

            $this->Paginator .= "<li><a title=\"{$this->Last}\" href=\"{$this->Link}{$Paginas}\">{$this->Last}</a></li>";
            $this->Paginator .="</ul>";
        endif;
    }

}
