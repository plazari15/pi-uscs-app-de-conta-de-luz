<?php

/* index.php */
class __TwigTemplate_f5a753fcb654bfa74774f3a41b45ca82cd136e3fe6480c9ec2e4bed554b12083 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script src=\"//cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js\"></script>
<script src=\"//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js\"></script>
<script>
    var client = \$.algolia.Client('678TC4WEYV', '0f9edc3a259de0b4d22ed10cabdd8ac8');
    var index = client.initIndex('bandeiras');
    index.search('3.10', function searchDone(err, content) {
        console.log(err, content)
    });
</script>
<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 13/04/16
 * Time: 17:39
 */



\$algolia = new \\AlgoliaSearch\\Client(\"678TC4WEYV\", \"0f9edc3a259de0b4d22ed10cabdd8ac8\");
\$Index = \$algolia->initIndex(\"bandeiras\");
\$File = json_decode(file_get_contents(\"algolia/bandeiras.json\", true));
//\$Index->addObjects(\$File);

echo '<pre>';
print_r(\$Index->search('3,10'));";
    }

    public function getTemplateName()
    {
        return "index.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <script src="//cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>*/
/* <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js"></script>*/
/* <script>*/
/*     var client = $.algolia.Client('678TC4WEYV', '0f9edc3a259de0b4d22ed10cabdd8ac8');*/
/*     var index = client.initIndex('bandeiras');*/
/*     index.search('3.10', function searchDone(err, content) {*/
/*         console.log(err, content)*/
/*     });*/
/* </script>*/
/* <?php*/
/* /***/
/*  * Created by PhpStorm.*/
/*  * User: pedro*/
/*  * Date: 13/04/16*/
/*  * Time: 17:39*/
/*  *//* */
/* */
/* */
/* */
/* $algolia = new \AlgoliaSearch\Client("678TC4WEYV", "0f9edc3a259de0b4d22ed10cabdd8ac8");*/
/* $Index = $algolia->initIndex("bandeiras");*/
/* $File = json_decode(file_get_contents("algolia/bandeiras.json", true));*/
/* //$Index->addObjects($File);*/
/* */
/* echo '<pre>';*/
/* print_r($Index->search('3,10'));*/
