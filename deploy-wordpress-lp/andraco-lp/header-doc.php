<?php
/**
 * Cabecalho das paginas de conteudo (politica de privacidade).
 *
 * @package andraco
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Como a Andraco Engenharia coleta, usa e protege dados pessoais, em conformidade com a Lei Geral de Proteção de Dados (LGPD).">
  <meta name="theme-color" content="#1A1A1C">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php andraco_svg_sprite(); ?>

<a class="skip" href="#conteudo"><?php esc_html_e( 'Pular para o conteúdo principal', 'andraco' ); ?></a>

<header class="hdr" data-solid="true">
  <div class="container">
    <a class="hdr-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Andraco Engenharia — início">
      <img src="<?php echo ANDRACO_ASSETS; ?>/logos/logo-white.png" alt="Andraco Engenharia" width="700" height="149">
    </a>
    <a class="btn" data-wa-btn="contato">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
  </div>
</header>
