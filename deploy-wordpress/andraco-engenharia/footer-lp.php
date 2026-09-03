<?php
/**
 * Rodape curto da LP + lightbox + banner de cookies.
 *
 * @package andraco
 */
?>
<!-- ============================== FOOTER (curto — é LP) ============================== -->
<footer class="ftr">
  <div class="pat-apex on-dark" aria-hidden="true"></div>
  <div class="container">
    <div class="ftr-bot" style="margin-top:0;padding-top:0;border:0">
      <span><img src="<?php echo ANDRACO_ASSETS; ?>/logos/logo-white.png" alt="Andraco Engenharia" width="900" height="192" style="height:30px;width:auto" loading="lazy"></span>
      <span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Andraco Engenharia · <a href="<?php echo esc_url( andraco_url( 'privacidade' ) ); ?>">Política de Privacidade</a></span>
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
  "@type":"FAQPage",
  "mainEntity":[
    {"@type":"Question","name":"Como funciona a aprovação do financiamento pela Andraco?","acceptedAnswer":{"@type":"Answer","text":"Nosso correspondente bancário parceiro analisa seu perfil e cuida de toda a burocracia do crédito, incluindo apoio na escolha do terreno. Você só assina depois que tudo já está resolvido."}},
    {"@type":"Question","name":"O orçamento pode mudar no meio da obra?","acceptedAnswer":{"@type":"Answer","text":"Trabalhamos com orçamento fechado e detalhado desde o início. No primeiro contato, levantamos todas as informações para apresentar um valor claro antes de você decidir."}},
    {"@type":"Question","name":"Quanto tempo leva do primeiro contato até a obra começar?","acceptedAnswer":{"@type":"Answer","text":"Depende do seu projeto e da etapa em que você está hoje. Assim que falamos com você, já organizamos um cronograma com prazos definidos para cada etapa."}},
    {"@type":"Question","name":"Esse serviço serve para quem já tem o terreno e o projeto prontos?","acceptedAnswer":{"@type":"Answer","text":"Sim. Se você já tem projeto e terreno, assumimos a execução com o mesmo padrão de controle dos pacotes completos. Se ainda não tem nada disso, também cuidamos de tudo desde o início."}},
    {"@type":"Question","name":"Por que escolher a Andraco e não outra construtora?","acceptedAnswer":{"@type":"Answer","text":"Poucas construtoras têm parceria direta com correspondente bancário para resolver seu financiamento antes da obra. Somamos isso a mais de 12 anos de gestão completa e atendimento próximo."}},
    {"@type":"Question","name":"Qual é o primeiro passo para começar?","acceptedAnswer":{"@type":"Answer","text":"É só falar com a gente pelo botão desta página. Em pouco tempo, alguém da nossa equipe entra em contato para entender seu projeto e já apresentar os próximos passos."}}
  ]
}
</script>
</body>
</html>
