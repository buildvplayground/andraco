<?php
/**
 * Cabecalho do site institucional (nav completa).
 *
 * @package andraco
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Escritório de engenharia e arquitetura em Curitiba. Consultoria, projeto arquitetônico, renderização 3D, projeto executivo, execução de obras e reformas. Mais de 15 milhões em obras entregues.">
  <meta name="theme-color" content="#1A1A1C">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Andraco Engenharia — Projetos e obras residenciais em Curitiba">
  <meta property="og:description" content="Cuidamos de toda a burocracia bancária, financiamento e escolha do terreno, desenvolvimento dos projetos e execução da obra.">
  <meta property="og:image" content="<?php echo esc_url( ANDRACO_ASSETS ); ?>/img/hero-site.webp">
  <meta property="og:url" content="<?php echo esc_url( is_front_page() ? home_url( '/' ) : get_permalink() ); ?>">
  <meta property="og:locale" content="pt_BR">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<script>
  /* Gate do motor de movimento. Failsafe: se o JS principal não subir em 2.5s,
     o gate cai e todo o conteúdo aparece — nada depende de animação para existir. */
  document.documentElement.setAttribute('data-motion','on');
  setTimeout(function(){ if(!window.__motionReady) document.documentElement.removeAttribute('data-motion'); },2500);
</script>
<?php andraco_svg_sprite(); ?>

<a class="skip" href="#conteudo"><?php esc_html_e( 'Pular para o conteúdo principal', 'andraco' ); ?></a>

<!-- ============================== HEADER ============================== -->
<header class="hdr">
  <div class="container">
    <a class="hdr-logo" href="#top" aria-label="Andraco Engenharia — início">
      <img src="<?php echo ANDRACO_ASSETS; ?>/logos/logo-white.png" alt="Andraco Engenharia" width="900" height="192">
    </a>
    <nav class="nav" aria-label="Navegação principal">
      <a href="#servicos">Serviços</a>
      <a href="#financiamento">Financiamento</a>
      <a href="#projetos">Projetos</a>
      <a href="#processo">Processo</a>
      <a href="#sobre">Sobre</a>
    </nav>
    <a class="btn" data-wa-btn="contato">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    <button class="burger" type="button" aria-expanded="false" aria-controls="menu-mobile" aria-label="Abrir menu"><span></span></button>
  </div>
</header>

<div class="scrim"></div>
<nav class="drawer" id="menu-mobile" aria-label="Navegação">
  <a href="#servicos">Serviços</a>
  <a href="#financiamento">Financiamento</a>
  <a href="#projetos">Projetos</a>
  <a href="#processo">Processo</a>
  <a href="#sobre">Sobre</a>
  <a href="#contato">Contato</a>
  <a class="btn" data-wa-btn="contato">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</nav>
