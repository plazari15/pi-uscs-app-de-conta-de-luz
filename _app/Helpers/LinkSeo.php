<?php

/**
 * LinkSeo.class.php [HELPER]
 * Responsável por informar metadados, links e SEO
 * @copyright (c) 2014, Pedro Lazari Pedro Lazari Desenvolvimentos
 */
namespace Helpers;
class LinkSeo {

     private $url;
     //META
     private $descricao;
     private $image;
     private $link;
     private $base;
     private $title;
     private $locale;
     private $site_name;
     private $RssXml;
     private $type;
     public $retun;
     public $RetunTitle;
     public $public;
     //GOOGLE 
     private $google_author;
     private $google_publisher;
     //FACEBOOK
     private $app_id;
     private $face_author;
     private $face_page;
     //TWITTER
     private $domain;
     private $twitter;
     
     //BLOG CAPTURA DE LINK
     private $blog;

     //URLS REDES SOCIAIS
     const googleplus = 'http://plus.google.com/';
     const facebook = 'http://www.facebook.com/';

     /**
      * <b>Inicia:</b> Inicie apenas informando a $url que o sistema automaticamente pega a $url[0].
      * Visite a Classe para informar os outros parametros solicitados
      * @param string $url
      * @param string $blog é uma $url[1] aparece somente em blogs
      */
     public function Inicia($url, $blog) {
          if ($url):
               $this->url = $url;
               $this->google_author = self::googleplus . '100967053549533795937/posts'; //perfil do autor
               $this->google_publisher = self::googleplus . '104781216075778718124'; //página do site
               $this->face_author = self::facebook . 'pedroabucarma'; //perfil do autor
               $this->face_page = self::facebook . 'cloudsp'; //pagina do site
               $this->app_id = '559165610851815'; //app do facebook
               $this->RssXml = HOME . '/rss.xml'; //XML do Site, normalmente encontrado na RAIZ
               $this->twitter = ''; //twitter conta
               $this->domain = 'www.cloudsp.com.br'; //dominio do site
               $this->site_name = 'CloudSP - Serviços de Hospedagem'; //NOME DA EMPRESA
               $this->locale = 'pt_BR'; //localização do site
               //CASO O SITE TENHA UM BLOG
               $blog = (!empty($blog) ? $blog : null); //verifica a existencia da URL
               $this->blog = $blog; //USADA SOMENTE EM CASO DE TER BLOG
               //FIM CASO SITE TENHA UM BLOG
               

               $this->Cases();
          //var_dump($this);
          endif;
     }

     /**
      * <b>GetReturnTitle:</b> Retorna para o Shared Boxes os dados pedidos, encontre esses dados nas últimas linhas
      * 
      */
     public function getRetunTitle() {
          return $this->RetunTitle;
     }

     /**
      * <b>GetReturn:</b> Retorna para o primeiro nó do HTML o titulo do site
      * 
      */
     public function getRetun() {
          return $this->retun;
     }

     /**
      * Cases funciona de acordo com $this->link, ele se baseia no
      * $this->link[0] => que executa o link principa, no caso do index, por exemplo, ele vai pegar o case index, 
      * se você for trabalhar a partir de um dado que precise buscar no banco de dados, crie um case com o $this->link[0],
      * e dentro do case execute no Banco de dados, uma query para pegar o $this->link[1], que pode ser um post,
      * página ou noticia.
      */
     private function Cases() {
          switch ($this->url[0]):
               case 'index':
                    $this->link = HOME;
                    $this->base = HOME;
                    $this->descricao = 'As melhores Soluções em Hospedagem para o seu negócio. Fale com nossa equipe, com certeza teremos a melhor solução!';
                    $this->title = 'CloudSP - Serviços de Hospedagem';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               case 'hospedagem-linux':
                    $this->link = HOME . '/hospedagem-linux';
                    $this->base = HOME;
                    $this->descricao = 'Serviço de Hospedagem Linux ISOLADA para melhor desempenho da sua aplicação. Todos os planos com recursos quase ilimitados e servidores nos EUA';
                    $this->title = 'Hospedagem de Sites Linux - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook-host.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               case 'dominios':
                    $this->link = HOME . '/dominios';
                    $this->base = HOME;
                    $this->descricao = 'Registre ou transfira seu dominio para a CloudSP. Suporte Dedicado e qualidade no atendimento';
                    $this->title = 'Registro, Renovação e Transferência  - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook-dom.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
               case 'cadastro':
                    $this->link = HOME . '/cadastro';
                    $this->base = HOME;
                    $this->descricao = 'Cadastre-se para receber emails com promoções e novidades da CloudSP!';
                    $this->title = 'Cadastre-se em nossos Emails  - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               case 'pesquisa':
                    $this->link = HOME . '/pesquisa';
                    $this->base = HOME;
                    $this->descricao = 'Cadastre-se para receber emails com promoções e novidades da CloudSP!';
                    $this->title = "Pesquisa na CloudSP. Encontre tudo o que precisar!";
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
               case 'dados-atualizados':
                    $this->link = HOME . '/dados-atualizados';
                    $this->base = HOME;
                    $this->descricao = 'Seus dados foram Atualizados, e agora nossos emails virão corretos para você!';
                    $this->title = 'Dados Atualizados - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->public = 'no-index, follow';
                    $this->type = 'article';
                    $this->MetaDados();
                    break;
               
                case 'email-confirmado':
                    $this->link = HOME . '/email-confirmado';
                    $this->base = HOME;
                    $this->descricao = 'Você agora está cadastrado em nossa lista de Emails';
                    $this->title = 'Email Confirmado - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                    $this->public = 'no-index, follow';
                    $this->MetaDados();
                    break;
               
                case 'email-cancelado':
                    $this->link = HOME . '/email-cancelado';
                    $this->base = HOME;
                    $this->descricao = 'A partir de hoje você não receberá mais nossas newsletter';
                    $this->title = 'Email Excluido com Sucesso - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'no-index, follow';
                    $this->MetaDados();
                    break;
               
               case 'login':
                    $this->link = HOME . '/login';
                    $this->base = HOME;
                    $this->descricao = 'Realize seu login em nossa central do Cliente, gerencie sua Hospedagem, Contas e tickets!';
                    $this->title = 'Acesso a Central do Cliente CloudSP';
                    $this->image = INCLUDE_PATH . '/images/facebook.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
               case 'blog':
                    $this->link = HOME . '/blog';
                    $this->base = HOME;
                    $this->descricao = 'Saiba tudo que é importante sobre Tecnologia, Negócios e sobre o que ocorre na CloudSP';
                    $this->title = 'Dicas, Novidades e muita Informação no Blog CloudSP';
                    $this->image = INCLUDE_PATH . '/images/blog-blog.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
               case 'post':
                    //PEGA OS DADOS DO POST
                    $read = new Read;
                    $read->ExeRead('cloud_post', "WHERE link = :l", "l={$this->blog}");
                    $link = $read->GetResult()[0]['link'];
                    $descricao = Check::Words($read->GetResult()[0]['text'], 20);
                    $titulo = $read->GetResult()[0]['nome'];
                    $image = $read->GetResult()[0]['cover'];
                    //PREEENCHE OS CAMPOS COM OS DADOS OBTIDOS
                    $this->link = HOME . '/post/' . $link;
                    $this->base = HOME;
                    $this->descricao = $descricao;
                    $this->title = $titulo . ' - CloudSP';
                    $this->image = HOME . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $image;
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
                
                 case 'empresa':
                    //PEGA OS DADOS DA PÁGINA
                    $read = new Read;
                    $read->ExeRead('cloud_pagina', "WHERE pagina_name = :l", "l={$this->blog}");
                    $link = $read->GetResult()[0]['pagina_name'];
                    $image = null;
                    $descricao = Check::Words($read->GetResult()[0]['pagina_content'], 20);
                    $titulo = $read->GetResult()[0]['pagina_name'];
                    //PREEENCHE OS CAMPOS COM OS DADOS OBTIDOS
                    $this->link = HOME . '/post/' . $link;
                    $this->base = HOME;
                    $this->descricao = $descricao;
                    $this->title = $titulo . ' - CloudSP';
                    $this->image = null;
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
                case 'categoria':
                    //PEGA OS DADOS DO POST
                    $read = new Read;
                    $read->ExeRead('cloud_categoria', "WHERE slug = :l", "l={$this->blog}");
                    $link = $read->GetResult()[0]['slug'];
                    $descricao = Check::Words($read->GetResult()[0]['descricao'], 20);
                    $titulo = $read->GetResult()[0]['nome'];
                    $cover = '/uploads/cover/' . $read->GetResult()[0]['cover'];
                    //PREEENCHE OS CAMPOS COM OS DADOS OBTIDOS
                    $this->link = HOME . '/categoria/' . $link;
                    $this->base = HOME;
                    $this->descricao = $descricao;
                    $this->title = 'Categoria ' . $titulo . ' - CloudSP';
                    $this->image = HOME . $cover;
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
                case 'autor':
                    //PEGA OS DADOS DO POST
                    $read = new Read;
                    $read->ExeRead('cloud_user', "WHERE user_name = :n", "n={$this->blog}");
                    $nome = $read->GetResult()[0]['user_name'];
                    //PREEENCHE OS CAMPOS COM OS DADOS OBTIDOS
                    $link = $read->GetResult()[0]['user_name'];
                    $this->link = HOME . '/autor/' . $link;
                    $this->base = HOME;
                    $this->descricao = "Saiba quem é o {$nome} e quais os posts que ele já escrever para a CloudSP";
                    $this->title = 'Página do Autor ' . $nome . ' - CloudSP';
                    $this->image = INCLUDE_PATH . '/images/blog-autor.fw.png';
                    $this->RetunTitle = $this->title;
                    $this->type = 'article';
                     $this->public = 'index, follow';
                    $this->MetaDados();
                    break;
               
               default:
                    $this->link = HOME . '/404';
                    $this->base = HOME;
                    $this->descricao = 'Oppsss, página solicitada não encontrada';
                    $this->title = 'Oppsss, página solicitada não encontrada';
                    $this->image = HOME . '/img/site.jpg';
                    $this->public = 'no-index, no-follow';
                    $this->RetunTitle = $this->title;
                    $this->MetaDados();
          endswitch;
     }

     //Responsável por apresentar ao site os metadados em HTML
     private function MetaDados() {
          echo
          " <title>$this->title</title>
            <meta name=\"description\" content=\"$this->descricao\"/>
            <meta name=\"robots\" content=\"$this->public\"/>
            
            
            <link rel=\"author\" href=\"$this->google_author\"/>
            <link rel=\"publisher\" href=\"$this->google_publisher\"/>
            <link rel=\"canonical\" href=\"$this->link\"/>
            <link rel=\"base\" href=\"$this->base\"/>
            <link rel=\"alternate\" type=\"application/rss+xml\" href=\"$this->RssXml\"/>
                 
            <meta itemprop=\"name\" content=\"$this->site_name\"/>
            <meta itemprop=\"description\" content=\"$this->descricao\"/>
            <meta itemprop=\"image\" content=\"$this->image\"/>
            <meta itemprop=\"url\" content=\"$this->link\"/>
                 
            <meta property=\"og:type\" content=\"$this->type\" />
            <meta property=\"og:title\" content=\"$this->title\" />
            <meta property=\"og:description\" content=\"$this->descricao\" />
            <meta property=\"og:image\" content=\"$this->image\" />
            <meta property=\"og:url\" content=\"$this->link\" />
            <meta property=\"og:site_name\" content=\"$this->site_name\" />
            <meta property=\"og:locale\" content=\"$this->locale\" />
            <meta property=\"og:app_id\" content=\"$this->app_id\"/>
            <meta property=\"article:author\" content=\"$this->face_author\"/>
            <meta property=\"article:publicher\" content=\"$this->face_page\"/>
                 
            <meta property=\"twitter:card\" content=\"summary_large_image\"/>
            <meta property=\"twitter:site\" content=\"$this->twitter\"/>
            <meta property=\"twitter:domain\" content=\"$this->domain\"/>
            <meta property=\"twitter:title\" content=\"$this->title\"/>
            <meta property=\"twitter:description\" content=\"$this->descricao\"/>
            <meta property=\"twitter:image:src\" content=\"$this->image\"/>
            <meta property=\"twitter:url\" content=\"$this->link\"/>
                 
                 
";

          $this->retun = [
          'facebook_app' => $this->app_id,
          'Link' => $this->link,
          'Title' => $this->title,
              ];
     }

}
