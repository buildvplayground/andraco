<?php
/**
 * Andraco Engenharia — setup do tema.
 *
 * Site estático servido pelo WordPress: nada de jQuery, nada de biblioteca de
 * animação. O CSS e os dois JS são os mesmos arquivos validados na versão estática.
 *
 * @package andraco
 */

defined( 'ABSPATH' ) || exit;

define( 'ANDRACO_VERSION', '1.0.0' );
define( 'ANDRACO_ASSETS', get_template_directory_uri() . '/assets' );

/* IDs de rastreamento — os MESMOS do site em produção, extraídos do HTML atual.
   Trocar aqui (e só aqui) se o container ou o popup mudarem. */
define( 'ANDRACO_GTM_ID', 'GTM-P6RVST79' );
define( 'ANDRACO_MERLIN_POPUP', 'https://tools.gomerlin.com.br/popup/b7c9b5c8-49f5-4ab4-9217-a836686fb99b' );

require_once get_template_directory() . '/inc/svg-sprite.php';

/**
 * Permalink de uma página do site pelo slug, com fallback para /slug/.
 * Evita link quebrado caso a página ainda não tenha sido criada no painel.
 *
 * @param string $slug Slug da página.
 * @return string
 */
function andraco_url( $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post ) {
		return get_permalink( $page );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Monta o valor de `data-gallery` de um projeto do portfólio.
 * As imagens seguem `assets/img/portfolio/<slug>/NN.webp`, de 01 até $total.
 * O JS do lightbox lê essa lista separada por "|".
 *
 * @param string $slug  Pasta do projeto.
 * @param int    $total Quantidade de imagens.
 * @return string
 */
function andraco_gallery( $slug, $total ) {
	$paths = array();
	for ( $i = 1; $i <= (int) $total; $i++ ) {
		$paths[] = ANDRACO_ASSETS . '/img/portfolio/' . $slug . '/' . sprintf( '%02d', $i ) . '.webp';
	}
	return implode( '|', $paths );
}

/**
 * Suportes do tema.
 */
function andraco_setup() {
	load_theme_textdomain( 'andraco', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	// Miniaturas nos tamanhos que o portfólio realmente usa.
	add_image_size( 'andraco-capa', 1000, 750, true );
	add_image_size( 'andraco-galeria', 1600, 0, false );
}
add_action( 'after_setup_theme', 'andraco_setup' );

/**
 * CSS e JS. Versões atreladas ao mtime do arquivo: o cache quebra sozinho a cada
 * ajuste, sem depender de trocar ANDRACO_VERSION na mão.
 */
function andraco_assets() {
	$dir = get_template_directory();

	/* Instrument Sans (títulos) + Geist (corpo). Os 3 pesos usados pelo design
	   system: 700 bold, 600 semibold, 400 regular (+500 só no chrome da nav). */
	wp_enqueue_style(
		'andraco-fonts',
		'https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600&family=Instrument+Sans:wght@600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'andraco',
		get_stylesheet_uri(),
		array( 'andraco-fonts' ),
		(string) filemtime( $dir . '/style.css' )
	);

	wp_enqueue_script(
		'andraco-motion',
		ANDRACO_ASSETS . '/js/motion.js',
		array(),
		(string) filemtime( $dir . '/assets/js/motion.js' ),
		true
	);

	/* Merlin — popup de qualificação que encaminha o lead para o WhatsApp.
	   Registrado como dependência do app.js: o WordPress garante a ordem
	   (merlin.js -> init -> app.js), que é o que a integração exige. */
	wp_enqueue_script(
		'andraco-merlin',
		'https://scripts.gomerlin.com.br/merlin.js',
		array(),
		null,
		true
	);
	wp_add_inline_script(
		'andraco-merlin',
		'window.ANDRACO_MERLIN_POPUP="' . esc_js( ANDRACO_MERLIN_POPUP ) . '";'
		. 'if(window.Merlin&&window.Merlin.Popup){window.Merlin.Popup.initFromSource(window.ANDRACO_MERLIN_POPUP);}',
		'after'
	);

	wp_enqueue_script(
		'andraco-app',
		ANDRACO_ASSETS . '/js/app.js',
		array( 'andraco-merlin' ),
		(string) filemtime( $dir . '/assets/js/app.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'andraco_assets' );

/**
 * Consent Mode v2 + Google Tag Manager.
 *
 * Ordem é o que importa aqui: o `consent default` (tudo negado) tem de rodar
 * ANTES do snippet do GTM, senão as tags disparam antes do consentimento.
 * Por isso vai em `wp_head` com prioridade 0, e não como script enfileirado.
 */
function andraco_gtm_head() {
	$gtm = ANDRACO_GTM_ID;
	?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments); }
  gtag('consent','default',{
    ad_storage:'denied', ad_user_data:'denied', ad_personalization:'denied',
    analytics_storage:'denied',
    functionality_storage:'granted', security_storage:'granted',
    wait_for_update: 500
  });
  /* visitante que já aceitou antes: libera na carga, sem esperar novo clique */
  try {
    if (localStorage.getItem('andraco_consent_v1') === 'granted') {
      gtag('consent','update',{
        ad_storage:'granted', ad_user_data:'granted',
        ad_personalization:'granted', analytics_storage:'granted'
      });
    }
  } catch (e) { /* modo privado: segue negado */ }
</script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;
j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})
(window,document,'script','dataLayer','<?php echo esc_js( $gtm ); ?>');</script>
	<?php
}
add_action( 'wp_head', 'andraco_gtm_head', 0 );

/**
 * Fallback do GTM para quem navega sem JavaScript.
 */
function andraco_gtm_noscript() {
	$src = 'https://www.googletagmanager.com/ns.html?id=' . rawurlencode( ANDRACO_GTM_ID );
	echo '<noscript><iframe src="' . esc_url( $src ) . '" height="0" width="0"'
		. ' style="display:none;visibility:hidden" title="Google Tag Manager"></iframe></noscript>' . PHP_EOL;
}
add_action( 'wp_body_open', 'andraco_gtm_noscript' );

/**
 * Preconnect para as fontes.
 */
function andraco_resource_hints( $hints, $relation ) {
	if ( 'preconnect' === $relation ) {
		$hints[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
		$hints[] = 'https://fonts.googleapis.com';
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'andraco_resource_hints', 10, 2 );

/**
 * Preload da imagem de hero, escolhida pelo template em uso.
 * O hero é a maior imagem acima da dobra — sem preload ele entra tarde no LCP.
 * A página de conteúdo não tem hero, então não preloada nada.
 */
function andraco_preload_hero() {
	if ( is_page_template( 'template-privacidade.php' ) ) {
		return;
	}
	$img = is_page_template( 'template-residencial.php' ) ? 'hero-lp.webp' : 'hero-site.webp';
	printf(
		'<link rel="preload" as="image" href="%s" fetchpriority="high">' . "\n",
		esc_url( ANDRACO_ASSETS . '/img/' . $img )
	);
}
add_action( 'wp_head', 'andraco_preload_hero', 1 );

/**
 * Favicon do tema (o cliente pode sobrescrever em Aparência → Personalizar → Identidade).
 */
function andraco_favicon() {
	if ( has_site_icon() ) {
		return;
	}
	printf(
		'<link rel="icon" href="%s" sizes="32x32">' . "\n",
		esc_url( ANDRACO_ASSETS . '/logos/favicon-32.png' )
	);
	printf(
		'<link rel="apple-touch-icon" href="%s">' . "\n",
		esc_url( ANDRACO_ASSETS . '/logos/favicon-180.png' )
	);
	echo '<meta name="theme-color" content="#16161A">' . "\n";
}
add_action( 'wp_head', 'andraco_favicon', 2 );

/**
 * A LP é página de teste A/B em tráfego pago: fora do índice orgânico, para não
 * competir com a home pelas mesmas palavras-chave.
 */
function andraco_noindex_lp() {
	if ( is_page_template( 'template-residencial.php' ) ) {
		echo '<meta name="robots" content="noindex, follow">' . "\n";
	}
}
add_action( 'wp_head', 'andraco_noindex_lp', 1 );

/**
 * Enxuga o <head>: sem emoji script, sem versão do WP, sem oEmbed e sem RSD/wlw.
 * São bytes e superfície de exposição que este site não usa.
 */
function andraco_clean_head() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'andraco_clean_head' );

/**
 * Remove o CSS de blocos do Gutenberg no front: o tema não usa blocos.
 */
function andraco_dequeue_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'andraco_dequeue_block_styles', 100 );

/**
 * Redirects 301 das URLs do site WordPress anterior. O site novo é de página
 * única, então /financiamento, /projetos e /execucao-e-reforma virariam 404 —
 * e são endereços já indexados.
 */
function andraco_legacy_redirects() {
	if ( is_admin() ) {
		return;
	}
	$path = trim( (string) wp_parse_url( add_query_arg( array() ), PHP_URL_PATH ), '/' );

	$map = array(
		'financiamento'      => '/#financiamento',
		'projetos'           => '/#projetos',
		'execucao-e-reforma' => '/#atuacao',
		'reforma'            => '/#atuacao',
	);

	if ( isset( $map[ $path ] ) && ! get_page_by_path( $path ) ) {
		wp_safe_redirect( home_url( $map[ $path ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'andraco_legacy_redirects' );
