<?php
/**
 * Rodape do site institucional + lightbox + banner de cookies.
 *
 * @package andraco
 */
?>
<!-- ============================== FOOTER ============================== -->
<footer class="ftr">
  <div class="pat-apex on-dark" aria-hidden="true"></div>
  <div class="container">
    <div class="ftr-top">
      <div class="ftr-brand">
        <img src="<?php echo ANDRACO_ASSETS; ?>/logos/logo-white.png" alt="Andraco Engenharia" width="900" height="192" loading="lazy">
        <p>Escritório de engenharia civil e arquitetura em Curitiba e região metropolitana. Projetos residenciais, execução de obras, reformas e ampliações.</p>
      </div>
      <div>
        <h4>Serviços</h4>
        <ul>
          <li><a href="#servicos">Consultoria em Projetos</a></li>
          <li><a href="#servicos">Projetos Arquitetônicos</a></li>
          <li><a href="#servicos">Renderizações 3D</a></li>
          <li><a href="#servicos">Execução de Obras</a></li>
          <li><a href="#servicos">Reformas e Ampliações</a></li>
        </ul>
      </div>
      <div>
        <h4>Contato</h4>
        <ul>
          <li><a href="tel:+5541984442181">(41) 9.8444-2181</a></li>
          <li><a href="mailto:andraco.engenharia@gmail.com">andraco.engenharia@gmail.com</a></li>
          <li><a href="https://www.instagram.com/andraco.engenharia/" target="_blank" rel="noopener">@andraco.engenharia</a></li>
          <li><a href="<?php echo esc_url( andraco_url( 'privacidade' ) ); ?>">Política de Privacidade</a></li>
        </ul>
      </div>
    </div>
    <div class="ftr-bot">
      <span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Andraco Engenharia. Todos os direitos reservados.</span>
      <span>Desenvolvido por BuildV — Marketing para Engenharia e Construção Civil</span>
    </div>
  </div>
</footer>

<!-- ============================== LIGHTBOX ============================== -->
<div class="lb" role="dialog" aria-modal="true" aria-label="Galeria do projeto" aria-hidden="true">
  <div class="lb-bar">
    <span class="lb-title">Projeto</span>
    <span class="lb-idx">1 / 1</span>
    <button class="lb-btn lb-close" type="button" aria-label="Fechar galeria"><svg width="16" height="16" aria-hidden="true"><use href="#i-close"/></svg></button>
  </div>
  <div class="lb-stage">
    <button class="lb-btn lb-nav lb-prev" type="button" aria-label="Imagem anterior"><svg width="16" height="16" aria-hidden="true"><use href="#i-prev"/></svg></button>
    <img alt="" hidden>
    <button class="lb-btn lb-nav lb-next" type="button" aria-label="Próxima imagem"><svg width="16" height="16" aria-hidden="true"><use href="#i-next"/></svg></button>
  </div>
  <div class="lb-foot"></div>
</div>

<!-- ============================== COOKIES (LGPD) ============================== -->
<aside class="ck" role="region" aria-label="Aviso de cookies">
  <p>Usamos cookies para entender como o site é usado e melhorar sua experiência. Saiba mais na <a href="<?php echo esc_url( andraco_url( 'privacidade' ) ); ?>">Política de Privacidade</a>.</p>
  <div class="ck-row">
    <button class="btn" type="button" data-consent="granted">Aceitar cookies</button>
    <button class="btn btn--ghost" type="button" data-consent="denied">Recusar</button>
  </div>
</aside>

<?php wp_footer(); ?>

<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"GeneralContractor",
  "name":"Andraco Engenharia",
  "url":"https://andracoengenharia.com.br/",
  "telephone":"+55-41-98444-2181",
  "email":"andraco.engenharia@gmail.com",
  "areaServed":"Curitiba e Região Metropolitana, PR",
  "description":"Escritório de engenharia civil e arquitetura: consultoria em projetos, projetos arquitetônicos, renderizações 3D, projeto executivo, execução de obras e reformas.",
  "sameAs":["https://www.instagram.com/andraco.engenharia/"]
}
</script>
</body>
</html>
