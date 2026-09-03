<?php
/**
 * Home — site institucional (Versao A do teste A/B).
 *
 * @package andraco
 */

get_header();
?>
<!-- ============================== HERO ==============================
     Espaçamento equilibrado: grade [corpo 1fr][trilho auto], espaço do header
     reservado por padding-top e padding simétrico no corpo. -->
<section class="hero" id="top">
  <div class="hero-media">
    <img src="<?php echo ANDRACO_ASSETS; ?>/img/hero-site.webp" alt="Projeto Akhenaton: residência horizontal em concreto, madeira e vidro, desenvolvida pela Andraco Engenharia" width="2000" height="1125" fetchpriority="high">
  </div>
  <div class="hero-veil" aria-hidden="true"></div>
  <div class="hero-tex" aria-hidden="true"></div>

  <div class="hero-body">
    <div class="container">
      <div class="hero-inner" data-reveal>
        <span class="eyebrow">Engenharia e arquitetura · Curitiba</span>
        <h1 data-hero-h>Solução completa para construir sua casa sem burocracia e com tranquilidade</h1>
        <p class="lede">Cuidamos de toda a burocracia bancária, financiamento e escolha do terreno, desenvolvimento dos projetos e execução da obra.</p>
        <div class="hero-actions">
          <a class="btn" data-wa-btn="hero">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
          <a class="btn btn--ghost" href="#projetos">Ver projetos</a>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-rail">
    <div class="container">
      <ul>
        <li><b>+ de 15 milhões</b> em obras entregues</li>
        <li><b>+ de 70</b> projetos e obras</li>
        <li><b>+ de 9 anos</b> de mercado</li>
      </ul>
    </div>
  </div>
</section>

<main id="conteudo">

<!-- ============================== NÚMEROS DE AUTORIDADE ============================== -->
<section class="band" aria-label="Andraco em números">
  <div class="pat-rule" aria-hidden="true"></div>
  <div class="container">
    <ul>
      <li data-reveal>
        <span class="pre">Gerenciamos</span>
        <span class="n">+ de 15 <em>milhões</em></span>
        <span class="l">de reais em obras executadas e entregues sob nossa responsabilidade técnica</span>
      </li>
      <li data-reveal>
        <span class="pre">Construímos uma história de</span>
        <span class="n">+ de 9 <em>anos</em></span>
        <span class="l">de mercado, entregando solidez e segurança jurídica em cada contrato assinado</span>
      </li>
      <li data-reveal>
        <span class="pre">Já entregamos</span>
        <span class="n">+ de 70</span>
        <span class="l">projetos e obras dentro de um período de 6 anos</span>
      </li>
      <li data-reveal>
        <span class="pre">Somamos</span>
        <span class="n">+ de 12 <em>anos</em></span>
        <span class="l">de experiência prática em engenharia de campo e gestão de obras complexas</span>
      </li>
      <li data-reveal>
        <span class="pre">Contamos com</span>
        <span class="n">+ de 100</span>
        <span class="l">colaboradores parceiros para entregar a sua obra de maneira assertiva e dentro do prazo</span>
      </li>
    </ul>
  </div>
</section>

<!-- ============================== FINANCIAMENTO (split) ============================== -->
<section class="sec" id="financiamento">
  <div class="container">
    <div class="split split--wide-text">
      <div class="split-body" data-rv="left" data-reveal>
        <span class="eyebrow">Financiamento</span>
        <h2>Seu imóvel financiado com as melhores taxas do mercado</h2>
        <div class="prose">
          <p>Muitas famílias deixam de avançar no projeto da casa própria por insegurança no processo de financiamento ou por dúvidas quanto à aprovação do crédito junto à Caixa Econômica.</p>
          <p>Atuamos com profundo conhecimento das diferentes faixas do programa <strong>Minha Casa Minha Vida</strong>, orientando cada etapa de forma estratégica.</p>
          <p>Fazemos a análise completa do perfil, organizamos toda a documentação necessária e buscamos a aprovação do crédito <strong>antes mesmo do início do projeto</strong>, garantindo mais previsibilidade.</p>
        </div>
        <ul class="checklist">
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Análise de perfil e viabilidade do terreno</span></li>
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Organização de toda a documentação exigida</span></li>
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Aprovação do crédito antes do início do projeto</span></li>
        </ul>
        <div class="cta-row">
          <a class="btn" data-wa-btn="financiamento">Falar sobre financiamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <figure class="split-fig" data-reveal="fig">
        <img src="<?php echo ANDRACO_ASSETS; ?>/img/split-financiamento.webp" alt="Projeto Hórus: residência de dois pavimentos com estrutura aparente e jardim frontal" width="1300" height="731" loading="lazy" decoding="async">
        <figcaption>Projeto Hórus</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- ============================== SERVIÇOS (6 · ícones oficiais) ============================== -->
<section class="sec bg-paper pat-grid" id="servicos">
  <div class="container">
    <div class="sec-head" data-reveal>
      <span class="eyebrow">Serviços</span>
      <h2>Cuidamos de todas as etapas para que você não precise se preocupar com nada</h2>
      <p class="lede">Do primeiro estudo de viabilidade até a entrega das chaves — você contrata só a etapa que precisa ou o pacote completo.</p>
    </div>

    <div class="svc">
      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">01</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/consultoria.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Consultoria em Projetos</h3>
        <p>Avaliamos terreno, viabilidade e orçamento antes de qualquer contratação, para você decidir com base técnica e não em suposição.</p>
      </article>

      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">02</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/arquitetonico.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Projetos Arquitetônicos</h3>
        <p>Criamos o projeto ideal para suas necessidades e cuidamos de toda a parte técnica e legal até a aprovação nos órgãos competentes.</p>
      </article>

      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">03</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/render3d.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Renderizações 3D</h3>
        <p>Você vê a casa pronta antes de a obra começar: imagens realistas do projeto para validar cada decisão com segurança.</p>
      </article>

      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">04</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/executivo.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Projeto Executivo Completo</h3>
        <p>Projetos complementares detalhados e compatibilizados entre si, para a obra sair do papel sem retrabalho no canteiro.</p>
      </article>

      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">05</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/execucao.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Execução de Obras</h3>
        <p>Executamos a obra com gestão completa de prazos, equipe e materiais, garantindo qualidade e transparência em cada etapa.</p>
      </article>

      <article class="svc-item" data-reveal>
        <span class="svc-badge"><span class="svc-n">06</span><img src="<?php echo ANDRACO_ASSETS; ?>/icons/reformas.png" alt="" width="34" height="34" loading="lazy" aria-hidden="true"></span>
        <h3>Reformas e Ampliações</h3>
        <p>Reformas rápidas ou ampliações estruturais, com o mesmo padrão de controle e responsabilidade técnica das obras completas.</p>
      </article>
    </div>

    <div class="cta-row" data-reveal>
      <p class="cta-note">Encontrou o serviço que você precisa? Vamos falar sobre o seu projeto.</p>
      <a class="btn" data-wa-btn="servicos">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ============================== FAIXA 1 ============================== -->
<section class="strip" aria-label="Projeto Vértice">
  <div class="strip-media"><img src="<?php echo ANDRACO_ASSETS; ?>/img/faixa-projeto.webp" alt="Projeto Vértice: residência em madeira e alvenaria implantada em terreno inclinado" width="1900" height="1069" loading="lazy" decoding="async"></div>
  <div class="strip-body">
    <div class="container">
      <p class="q" data-reveal>Mais tranquilidade financeira e nenhuma surpresa ao longo da obra.</p>
      <p class="src" data-reveal="soft">Projeto Vértice</p>
    </div>
  </div>
</section>

<!-- ============================== PROCESSO — 7 etapas com imagem ============================== -->
<section class="sec" id="processo">
  <div class="container">
    <div class="sec-split">
      <div class="sec-split__aside">
        <div class="sec-split__sticky" data-rv="left" data-reveal>
          <span class="eyebrow">Processo</span>
          <h2>Veja nosso fluxo de trabalho</h2>
          <p class="lede">Sete etapas, do primeiro encontro ao gerenciamento da obra. Você sabe sempre em qual delas o seu projeto está.</p>
        </div>
      </div>

      <ol class="journey">
        <li class="jn" data-reveal>
          <span class="jn-n">01</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-1.webp" alt="Reunião inicial entre o cliente e a equipe da Andraco" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Encontro com o cliente</h3><p>Entendemos o momento em que você está: terreno, orçamento disponível e expectativa de prazo.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">02</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-2.webp" alt="Levantamento do programa de necessidades da família" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Análise completa do desejo</h3><p>Levantamos o programa de necessidades da família e as restrições técnicas e legais do terreno.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">03</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-3.webp" alt="Estudos de conceito e croquis do projeto" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Ideação do conceito</h3><p>Definimos a direção arquitetônica que resolve o programa dentro do orçamento acordado.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">04</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-4.webp" alt="Composição técnica do anteprojeto em prancheta e computador" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Composição e desenvolvimento do anteprojeto</h3><p>Materializamos o conceito em plantas e volumetria para você validar antes do detalhamento.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">05</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-5.webp" alt="Validação do projeto com o cliente antes da aprovação" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Aprovação e desenvolvimento do projeto</h3><p>Conduzimos a aprovação nos órgãos competentes e desenvolvemos os projetos complementares.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">06</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-6.webp" alt="Entrega do pacote de projetos aprovados ao cliente" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Entrega do projeto finalizado</h3><p>Você recebe o pacote completo de projetos aprovados, pronto para execução.</p></div>
        </li>
        <li class="jn" data-reveal>
          <span class="jn-n">07</span>
          <figure class="jn-fig"><img src="<?php echo ANDRACO_ASSETS; ?>/img/jornada-7.webp" alt="Acompanhamento técnico da obra em canteiro" width="900" height="563" loading="lazy" decoding="async"></figure>
          <div class="jn-body"><h3>Gerenciamento da obra</h3><p>Assumimos prazos, equipe e materiais até a vistoria final e a entrega das chaves.</p></div>
        </li>
      </ol>
    </div>
  </div>
</section>

<!-- ============================== PROJETOS (15) ============================== -->
<section class="sec bg-dark pat-hatch" id="projetos">
  <div class="container">
    <div class="sec-head" data-reveal>
      <span class="eyebrow">Projetos desenvolvidos</span>
      <h2>Veja algumas obras e projetos que assinamos</h2>
      <p class="lede">Quinze projetos residenciais desenvolvidos pela nossa equipe de engenharia e arquitetura. Clique para abrir a galeria de cada um.</p>
    </div>

    <div class="pf">
      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Outbox"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'outbox', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/outbox/cover.webp" alt="Projeto Outbox: residência de três pavimentos com volumes em concreto e madeira sobre espelho d'água" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Outbox</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Luxor"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'luxor', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/luxor/cover.webp" alt="Projeto Luxor: volume branco escultórico suspenso com fechamento em vidro" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Luxor</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Sakkara"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'sakkara', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/sakkara/cover.webp" alt="Projeto Sakkara: sobrado de fachada branca com painel em madeira e portão metálico" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Sakkara</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Hórus"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'horus', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/horus/cover.webp" alt="Projeto Hórus: residência de dois pavimentos com estrutura aparente e jardim frontal" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Hórus</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Andirá"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'andira', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/andira/cover.webp" alt="Projeto Andirá: fachada com torre em madeira ripada e garagem recuada entre palmeiras" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Andirá</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Ísis"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'isis', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/isis/cover.webp" alt="Projeto Ísis: residência horizontal com grandes beirais e revestimento em pedra" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Ísis</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Akhenaton"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'akhenaton', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/akhenaton/cover.webp" alt="Projeto Akhenaton: residência horizontal em concreto, madeira e vidro" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Akhenaton</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Delta"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'delta', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/delta/cover.webp" alt="Projeto Delta: casa térrea com cobertura inclinada em terreno arborizado" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Delta</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Vértice"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'vertice', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/vertice/cover.webp" alt="Projeto Vértice: residência em madeira e alvenaria implantada em terreno inclinado" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Vértice</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Ventus"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'ventus', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/ventus/cover.webp" alt="Projeto Ventus: fachada branca com jardim suspenso e porta pivotante em madeira" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Ventus</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Gaia"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'gaia', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/gaia/cover.webp" alt="Projeto Gaia: volumes brancos com painel vertical em madeira e garagem coberta" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Gaia</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Infinity"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'infinity', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/infinity/cover.webp" alt="Projeto Infinity: fachada com painel em madeira e cobogó metálico escuro" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Infinity</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Solarium"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'solarium', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/solarium/cover.webp" alt="Projeto Solarium: sobrado com brises verticais e garagem para dois carros" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Solarium</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Estela"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'estela', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/estela/cover.webp" alt="Projeto Estela: fachada com painel de cobogó em terracota e revestimento em pedra" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Alto padrão</span><h3>Estela</h3><span class="pf-count">3 imagens</span></span>
      </button>

      <button class="pf-card" type="button" data-reveal="fig" data-title="Projeto Neo"
        data-gallery="<?php echo esc_attr( andraco_gallery( 'neo', 3 ) ); ?>">
        <span class="pf-thumb"><img src="<?php echo ANDRACO_ASSETS; ?>/img/portfolio/neo/cover.webp" alt="Projeto Neo: sobrado contemporâneo com volume em balanço sobre a garagem" width="1000" height="563" loading="lazy" decoding="async"><span class="pf-zoom"><svg width="16" height="16" aria-hidden="true"><use href="#i-zoom"/></svg></span></span>
        <span class="pf-meta"><span class="pf-cat">Residencial</span><h3>Neo</h3><span class="pf-count">3 imagens</span></span>
      </button>
    </div>

    <p class="pf-note" data-reveal="soft">As imagens são <strong>renderizações dos projetos desenvolvidos</strong> pela nossa equipe — representações do projeto aprovado, não fotografias de obra concluída.</p>

    <div class="cta-row" data-reveal>
      <p class="cta-note">Gostou do que viu? Vamos desenhar o projeto da sua casa.</p>
      <a class="btn" data-wa-btn="projetos">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ============================== FAIXA 2 ============================== -->
<section class="strip" aria-label="Interiores de projeto desenvolvido">
  <div class="strip-media"><img src="<?php echo ANDRACO_ASSETS; ?>/img/faixa-interior.webp" alt="Área gourmet integrada com bancada em pedra e marcenaria sob medida" width="1900" height="1069" loading="lazy" decoding="async"></div>
  <div class="strip-body">
    <div class="container">
      <p class="q" data-reveal>Surgimos da vontade de unir a criatividade dos projetos arquitetônicos com a precisão da engenharia.</p>
      <p class="src" data-reveal="soft">Projetos de interiores</p>
    </div>
  </div>
</section>

<!-- ============================== SOBRE (split invertido) ============================== -->
<section class="sec" id="sobre">
  <div class="container">
    <div class="split split--flip">
      <figure class="split-fig" data-reveal="fig">
        <img src="<?php echo ANDRACO_ASSETS; ?>/img/split-sobre.webp" alt="Sala de estar integrada com marcenaria sob medida, projeto de interiores da Andraco" width="1200" height="800" loading="lazy" decoding="async">
        <figcaption>Projeto de interiores · Apê Home</figcaption>
      </figure>
      <div class="split-body" data-rv="right" data-reveal>
        <span class="eyebrow">Sobre nós</span>
        <h2>Saiba mais sobre a Andraco Engenharia</h2>
        <div class="prose">
          <p>Fundada com o objetivo de valorizar ainda mais a engenharia civil e a arquitetura, atuamos há <strong>mais de 9 anos</strong> no mercado, somando <strong>mais de 12 anos</strong> de experiência prática em obra.</p>
          <p>Surgimos da vontade de unir a criatividade dos projetos arquitetônicos com a precisão da engenharia, buscando sempre o melhor resultado.</p>
          <p>Nossa missão é oferecer segurança patrimonial e melhorar a qualidade de vida das pessoas, entregando projetos que superam expectativas — seja em reformas rápidas ou em grandes empreendimentos.</p>
        </div>
        <ul class="checklist">
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Responsabilidade técnica sobre cada obra que assinamos</span></li>
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Mais de 70 projetos e obras entregues em 6 anos</span></li>
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Mais de 100 colaboradores parceiros mobilizados</span></li>
          <li><svg width="17" height="17" aria-hidden="true"><use href="#i-check"/></svg><span>Atendimento em Curitiba e região metropolitana</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================== FAIXA 3 ============================== -->
<section class="strip strip--tall" aria-label="Engenharia e arquitetura andando juntas">
  <div class="strip-media"><img src="<?php echo ANDRACO_ASSETS; ?>/img/faixa-entrega.webp" alt="Projeto Delta: casa térrea com cobertura inclinada entre árvores" width="1900" height="1069" loading="lazy" decoding="async"></div>
  <div class="strip-body">
    <div class="container">
      <span class="eyebrow" data-reveal="soft">Nossos números</span>
      <p class="q" data-reveal>Engenharia e arquitetura andando juntas.</p>
      <p class="src" data-reveal="soft">Nossa equipe trabalha para que o design inovador que você sonha esteja sempre apoiado em soluções de engenharia confiáveis, seguras e de acordo com as normas.</p>
    </div>
  </div>
</section>

<!-- ============================== FAQ ============================== -->
<section class="sec bg-paper" id="faq">
  <div class="container">
    <div class="sec-head" data-reveal>
      <span class="eyebrow">Perguntas frequentes</span>
      <h2>Tire suas dúvidas antes de começar</h2>
    </div>
    <div class="faq" data-reveal>
      <details>
        <summary><span class="q-n">01</span><span class="q-t">Vocês fazem só o projeto ou também executam a obra?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">Os dois. Você pode contratar apenas o projeto arquitetônico, apenas a execução (se já tem projeto pronto) ou o pacote completo, com projeto executivo e gerenciamento da obra até a entrega das chaves.</p>
      </details>
      <details>
        <summary><span class="q-n">02</span><span class="q-t">Como funciona a aprovação do financiamento?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">Fazemos a análise completa do perfil, organizamos toda a documentação e buscamos a aprovação do crédito junto à Caixa Econômica antes mesmo do início do projeto — com conhecimento das diferentes faixas do Minha Casa Minha Vida.</p>
      </details>
      <details>
        <summary><span class="q-n">03</span><span class="q-t">O orçamento pode mudar no meio da obra?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">Trabalhamos com orçamento fechado e detalhado desde o início. No primeiro contato levantamos todas as informações para apresentar um valor claro antes de você decidir.</p>
      </details>
      <details>
        <summary><span class="q-n">04</span><span class="q-t">Consigo ver como a casa vai ficar antes de construir?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">Sim. A renderização 3D faz parte do nosso processo: você vê imagens realistas do projeto e valida cada decisão antes de a obra começar.</p>
      </details>
      <details>
        <summary><span class="q-n">05</span><span class="q-t">Atendem reforma e ampliação, ou só obra nova?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">Atendemos os dois. Reformas e ampliações seguem o mesmo padrão de controle e responsabilidade técnica das obras completas.</p>
      </details>
      <details>
        <summary><span class="q-n">06</span><span class="q-t">Qual é o primeiro passo para começar?</span><span class="q-i" aria-hidden="true"></span></summary>
        <p class="faq-a">É só falar com a gente pelo botão desta página. Em pouco tempo alguém da nossa equipe entra em contato para entender seu projeto e já apresentar os próximos passos.</p>
      </details>
    </div>
    <div class="cta-row" data-reveal>
      <p class="cta-note">Ainda com dúvidas? Fale direto com nossa equipe.</p>
      <a class="btn" data-wa-btn="faq">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ============================== CTA FINAL ============================== -->
<section class="sec bg-dark" id="contato">
  <div class="container">
    <div class="close">
      <div class="close-lead" data-reveal>
        <span class="eyebrow">Contato</span>
        <h2>Somos a parceira ideal para atuar em todas as etapas da sua construção</h2>
        <p class="lede">Entre em contato e veja como podemos financiar e construir sua casa.</p>
        <a class="btn" data-wa-btn="contato">Solicitar orçamento <svg width="15" height="15" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        <div class="contacts">
          <a href="tel:+5541984442181"><svg width="16" height="16" aria-hidden="true"><use href="#i-phone"/></svg>(41) 9.8444-2181</a>
          <a href="mailto:andraco.engenharia@gmail.com"><svg width="16" height="16" aria-hidden="true"><use href="#i-mail"/></svg>andraco.engenharia@gmail.com</a>
          <a href="https://www.instagram.com/andraco.engenharia/" target="_blank" rel="noopener"><svg width="16" height="16" aria-hidden="true"><use href="#i-insta"/></svg>@andraco.engenharia</a>
        </div>
      </div>

      <div data-reveal="soft">
        <h3 class="sr-only">Como solicitar seu orçamento</h3>
        <ol class="flow">
          <li>
            <span class="dot">01</span>
            <h3>Fale com um engenheiro</h3>
            <p>Você manda uma mensagem e conversa direto com quem vai conduzir o seu projeto.</p>
          </li>
          <li>
            <span class="dot">02</span>
            <h3>Entendemos o seu projeto</h3>
            <p>Levantamos terreno, programa de necessidades, prazo e a viabilidade do financiamento.</p>
          </li>
          <li>
            <span class="dot">03</span>
            <h3>Receba o orçamento fechado</h3>
            <p>Apresentamos o escopo e o valor detalhados antes de você decidir qualquer coisa.</p>
          </li>
        </ol>
      </div>
    </div>
  </div>
</section>

</main>

<?php
get_footer();
