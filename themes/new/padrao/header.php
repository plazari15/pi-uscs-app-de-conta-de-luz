<nav class="lighten-1 header_color" role="navigation">
    <div class="nav-wrapper logo"><a id="logo-container" href="<?= HOME ?>" class="brand-logo"><img class="logo_header" src="<?= INCLUDE_PATH ?>/images/ecolights.png"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?= HOME ?>" class="menu_text" title="Home">Home</a></li>
            <li><a href="<?= HOME ?>/sobre/quem-somos" class="menu_text" title="Quem Somos">Nossa Missão</a></li>
            <li><a href="<?= HOME ?>/sobre/time"  class="menu_text" title="Nosso time">Nosso Time</a></li>
            <li><a href="<?= HOME ?>/sobre/time" class="menu_text" title="Nosso time">Ranking da Economia<span class="new badge"></span></a></li>
            <li><a href="<?= HOME ?>/graficos" class="menu_text" title="Nosso time">Graficos<span class="new badge"></span></a></li>
<!--            <li><a href="#" title="Como Calcular">Como Calcular<span class="new badge">Em Breve!</span></a></li>-->
            <li><a href="<?= HOME ?>/calculadora" class="waves-effect waves-light btn btn_calcule" title="Calcule">CALCULE!</a></li>
            <a class='waves-effect waves-light btn btn_login dropdown-button btn' href='#' data-activates='dropdown1'>Meu Painel</a>
        </ul>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="<?= HOME ?>/dashboard/login">Login</a></li>
            <li><a href="#!">Minha Conta</a></li>
            <li><a href="#!">Meus Calculos</a></li>
            <li><a href="#!">Ranking da Economia</a></li>
            <li class="divider"></li>
            <li><a href="#!">Sair</a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="<?= HOME ?>" title="Home">Home</a></li>
            <li><a href="<?= HOME ?>/sobre/quem-somos" title="Quem Somos">Quem Somos</a></li>
            <li><a href="<?= HOME ?>/sobre/time" title="Nosso time">Nosso Time</a></li>
            <!--            <li><a href="#" title="Como Calcular">Como Calcular<span class="new badge">Em Breve!</span></a></li>-->
            <li><a href="<?= HOME ?>/calculadora" class="waves-effect waves-light btn btn_calcule" title="Calcule">CALCULE!</a></li>
            <!--            <li><a href="#" class="waves-effect waves-light btn btn_login" title="Login">Login!</a></li>-->
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
