<?php
/**
 * Cabecalho da LP de teste A/B (enxuto: logo + CTA).
 *
 * @package andraco
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Correspondente bancário parceiro cuida de toda a aprovação do crédito. Gestão completa da obra, do orçamento à entrega das chaves. Mais de 12 anos em construção residencial em Curitiba.">
  <meta name="theme-color" content="#1A1A1C">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Construa sua casa com o financiamento já resolvido">
  <meta property="og:description" content="Correspondente bancário parceiro cuida de toda a aprovação do crédito. Gestão completa da obra, do orçamento à entrega das chaves.">
  <meta property="og:image" content="<?php echo esc_url( ANDRACO_ASSETS ); ?>/img/hero-lp.webp">
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

<!-- ============================== HEADER (enxuto — é LP) ============================== -->
<header class="hdr hdr--lp">
  <div class="container">
    <a class="hdr-logo" href="#top" aria-label="Andraco Engenharia">
      <img src="<?php echo ANDRACO_ASSETS; ?>/logos/logo-white.png" alt="Andraco Engenharia" width="900" height="192">
    </a>
    <span class="lp-badge">Construção residencial</span>
    <a class="btn" data-wa-btn="hero">Fale Conosco <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
  </div>
</header>
