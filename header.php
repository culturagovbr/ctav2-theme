
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Generator" content="WordPress" />
    <meta name="Description" content="<?php bloginfo('description'); ?>" />
    <meta name="Keywords" content="" />
    <meta name="Robots" content="ALL" />
    <meta name="Distribution" content="Global" />
    <meta name="Author" content="Equipe Web MinC - http://xemele.cultura.gov.br" />
    <meta name="Resource-Type" content="Document" />

    <!-- Title -->
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

    <!-- Pingback -->
    <link href="<?php bloginfo('pingback_url'); ?>" rel="pingback" />

    <!-- Icon -->
    <link type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/icon/favicon.ico" rel="shortcut icon" />

    <!-- RSS -->
    <link type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="feeds de <?php bloginfo('name'); ?>" rel="alternate" />
    <?php if(is_category()) : ?><link type="application/rss+xml" href="<?php print get_category_feed_link($cat, 'rss2'); ?>" title="feeds de <?php single_cat_title(); ?>" rel="alternate" /><?php endif; ?>

    <!-- CSS -->
    <link type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" rel="stylesheet" media="print" />
    <link type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" rel="stylesheet" media="screen" />
    <link type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/pagenavi.css" rel="stylesheet" media="screen" />

   
    

    <?php wp_head(); ?>
     <!-- JavaScript -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle-2.3.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/menu.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/backtotop.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/limitchars.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/stripe.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
  </head>
  <body style="background: none;">
        <style>
            #header{
                height: 110px;
            }
            #logo {
                width:980px;
                height:85px;
                background:url('wp-content/themes/ctav2/img/logo/ctav.png') no-repeat;
                margin-bottom:-10px;
            }
            #inforbar {

            }
            #govbar {
                margin-top:8px;
            }
            #govbar .overflow {
                margin:-1px;
                top:-48px;
            }
            .overflow {
                margin-top:7px;
            }
        </style>

  	<?php //include( '/var/www/www.cultura.gov.br/govbar/govbar.php' ); ?>
        <?php
            $_tamanhoLayout   = '980';
            $_margemTopLayout = '485';
            $_margemMenu      = '16';
            require_once ( '/var/www/www.ctav.gov.br/menu.php' );
            ?>


    <!-- Container -->
    <div id="container">

      <!-- Barra do Governo -->
      <!--
      <div id="govbar">
        <a href="http://www.cultura.gov.br/" title="Ministério da Cultura" class="minc">Ministério da Cultura</a>
        <a href="http://www.brasil.gov.br/" title="Brasil - um país de todos" class="brasil">Brasil - um país de todos</a>
        <select name="destaque">
          <option>Destaques do governo</option>
          <option value="http://www.brasil.gov.br">Portal do Governo Federal</option>
          <option value="http://www.e.gov.br">Portal de Serviços do Governo</option>
          <option value="http://www.radiobras.gov.br">Portal da Agência de Notícias</option>
          <option value="http://www.brasil.gov.br/emquestao">Em Questão</option>
          <option value="http://www.fomezero.gov.br">Programa Fome Zero</option>
      	  <option value="http://www.ufmg.br/conselheirosnacionais">Programa Conselheiros Nacionais</option>
        </select>
      </div>
      -->

      <!-- Data
      <div id="date">
        <span><?php print __(date('l')).", ".date('j')." de ".__(date('F'))." de ".date('Y'); ?></span>
        <a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss">RSS</a>-->
        <!--<a href="<?php print get_page_link(x); ?>" title="Mapa do Site" class="site-map">Mapa do Site</a>
      </div>-->

      <!-- Header -->
        <!-- Title -->
        <div id="header" style="width:980px; height:85px; margin-bottom:-10px;">
        <!-- FlipBook -->

		<?php $artista = array(
				  1 => array('nome' => 'humberto-mauro', 'site' => '#'),
				  2 => array('nome' => 'onde-andara-petrucio-felker', 'site' => '#'),
				  3 => array('nome' => 'o-saci', 'site' => '#'),
				  4 => array('nome' => 'o-homem-do-pau-brasil', 'site' => '#'),
				  5 => array('nome' => 'limite', 'site' => '#'),
				  6 => array('nome' => 'bandido-da-luz-vermelha', 'site' => '#'),
				  7 => array('nome' => 'a-rainha-diaba', 'site' => '#'),
				  8 => array('nome' => 'aruanda', 'site' => '#'),
				  9 => array('nome' => 'ele-nao-usam-black-tie', 'site' => '#')
		); ?>
		<?php $arte = rand(1, count($artista)); ?>

            <div class="flipbook arte<?php print $arte; ?>" style="width:980px; height:85px;">
                  <a href="http://www.cultura.gov.br" style="display:block; float:left; width:200px; height:85px;"></a>
                  <a href="http://www.ctav.gov.br/" style="display:block; float:right; width:600px; height:85px;"></a>
            </div>
        </div>


      <!-- Menu -->
      <div id="menu">
        <ul id="listMenuRoot">
          <li>
          <a href="<?php print get_page_link(104); ?>" title="Institucional">Institucional</a>
          <ul>
            <?php wp_list_pages('depth=1&title_li=&sort_column=menu_order&hide_empty=0&child_of=104'); ?>
          </ul>
        </li>
<?php $inicial = get_category_by_slug('inicial')->term_id;?>
<?php wp_list_categories("depth=2&title_li=&use_desc_for_title=0&hide_empty=0&orderby=order&exclude=8&exclude_tree=$inicial"); ?>
<?php wp_list_pages("depth=2&title_li=&sort_column=menu_order&hide_empty=0&orderby=order&exclude=104,252,538,618"); ?>
        </ul>
      </div>

      <!-- BreadCrumb -->
      <div id="breadcrumb">
        <p>
          <?php
            if(class_exists('breadcrumb_navigation_xt'))
            {
              // New breadcrumb object
              $mybreadcrumb = new breadcrumb_navigation_xt;
              // Options for breadcrumb_navigation_xt
              $mybreadcrumb->opt["singleblogpost_category_display"] = true;
              $mybreadcrumb->opt["separator"] = " &raquo; ";
              // Display the breadcrumb
              $mybreadcrumb->display();
            }
          ?>
        </p>
      </div>
