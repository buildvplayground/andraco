<?php
/**
 * Fallback. O site tem uma home estatica (front-page.php) e duas paginas com
 * template proprio; este arquivo existe porque o WordPress exige e serve
 * qualquer outra rota mostrando o conteudo da pagina.
 *
 * @package andraco
 */

get_header( 'doc' );
?>
<main id="conteudo" class="sec" style="padding-top:calc(var(--header-h) + 56px)">
	<div class="container">
		<article class="doc">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<?php
				endwhile;
			else :
				?>
				<h1><?php esc_html_e( 'Página não encontrada', 'andraco' ); ?></h1>
				<p><?php esc_html_e( 'O endereço que você acessou não existe mais.', 'andraco' ); ?></p>
				<p style="margin-top:32px"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr; <?php esc_html_e( 'Voltar para a página inicial', 'andraco' ); ?></a></p>
			<?php endif; ?>
		</article>
	</div>
</main>
<?php
get_footer( 'doc' );
