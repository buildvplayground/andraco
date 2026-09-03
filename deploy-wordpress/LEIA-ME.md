# deploy-wordpress — Andraco Engenharia

Tema WordPress com o site institucional (**Versão A**) e a LP de teste A/B
(**Versão B**). Mesmo HTML/CSS/JS validado da versão estática — sem page builder,
sem jQuery, sem biblioteca de animação.

Identidade **oficial do brandbook**: paleta monocromática (`#272727` `#4E555E`
`#80858B` `#CDD6DF` `#D9D9D9` + preto e branco), Alfa Slab One no display e os
**6 ícones de serviço** do kit do cliente.

```
andraco-engenharia/          <- a pasta do tema (é isso que sobe)
├── style.css                cabeçalho do tema + todo o CSS (inclui os 4 patterns)
├── functions.php            enqueue, GTM + Consent Mode, Merlin, redirects, favicon
├── inc/svg-sprite.php       sprite de ícones de interface
├── header.php               cabeçalho do site (nav completa)
├── header-lp.php            cabeçalho da LP (logo + CTA)
├── header-doc.php           cabeçalho das páginas de conteúdo
├── footer.php               rodapé + lightbox + banner de cookies
├── footer-lp.php            rodapé curto da LP
├── footer-doc.php           rodapé das páginas de conteúdo
├── front-page.php           HOME (Versão A) — 15 projetos, 6 serviços, jornada
├── template-residencial.php TEMPLATE da LP (Versão B)
├── template-privacidade.php TEMPLATE da Política de Privacidade
├── index.php                fallback
├── screenshot.png           print para a tela de temas
└── assets/
    ├── logos/               9 variantes oficiais + 2 favicons
    ├── icons/               6 ícones de serviço (ink + branco)
    ├── img/                 heroes, faixas, splits, jornada
    │   └── portfolio/       15 projetos × 3 imagens + capa
    └── js/                  motion.js + app.js
```

## Instalação

1. **Subir o tema** — compacte a pasta `andraco-engenharia` em `.zip` e vá em
   *Aparência → Temas → Adicionar novo → Enviar tema*. Ou envie por FTP para
   `wp-content/themes/`. Ative.

2. **Definir a home** — *Configurações → Leitura → Sua página inicial exibe:
   **Uma página estática***. Crie/escolha uma página (ex.: "Home") como *Página inicial*.

3. **Criar a LP** — *Páginas → Adicionar nova*
   - Título: `Construção Residencial`
   - **Slug: `residencial`** (os links internos apontam para esse slug)
   - *Atributos da página → Modelo:* **LP Construção Residencial (Teste A/B - Versão B)**

4. **Criar a Política de Privacidade** — slug `privacidade`, modelo
   **Politica de Privacidade**. Aponte também em *Configurações → Privacidade*.

5. **Permalinks** — *Configurações → Links permanentes* → **Nome do post**, e
   clique em *Salvar* uma vez (regenera as regras).

## O que o tema já resolve

| Item | Onde |
|---|---|
| **GTM `GTM-P6RVST79`** + fallback `noscript` | `andraco_gtm_head()` / `andraco_gtm_noscript()` |
| **Consent Mode v2** (tudo negado até o aceite) | `andraco_gtm_head()`, prioridade 0 no `wp_head` |
| **Merlin** (popup → WhatsApp) | enfileirado como dependência do `app.js`, garantindo a ordem |
| Galeria de cada projeto | `andraco_gallery( slug, total )` monta o `data-gallery` |
| Redirects 301 de `/financiamento`, `/projetos`, `/execucao-e-reforma` | `andraco_legacy_redirects()` |
| `noindex` só na LP | `andraco_noindex_lp()` |
| Preload do hero por template (LCP) | `andraco_preload_hero()` |
| `<head>` enxuto (sem emoji script, sem versão do WP, sem oEmbed) | `andraco_clean_head()` |
| CSS do Gutenberg removido do front | `andraco_dequeue_block_styles()` |
| Cache-busting automático por `filemtime()` | `andraco_assets()` |

## Onde editar o quê

- **Texto das seções** → nos templates (`front-page.php`, `template-residencial.php`).
  O conteúdo é estático de propósito: é copy aprovada em teste A/B.
- **Número do WhatsApp** → constante `WA_NUMBER` no topo de `assets/js/app.js`.
  É o **único** lugar.
- **IDs de GTM e do popup Merlin** → constantes `ANDRACO_GTM_ID` e
  `ANDRACO_MERLIN_POPUP` no topo de `functions.php`.
- **Cores, tipografia e patterns** → tokens em `:root` e §3 do `style.css`.
  Os pares de contraste foram medidos: leia `design-system/README.md` antes de trocar.
- **Ícones de serviço** → `assets/icons/`. Cada um tem versão ink e branca.
  São arquivos do cliente: não substitua por ícone de biblioteca.

## Atenção

- **Não instale plugin de cache que reordene ou combine scripts.** A integração do
  Merlin depende de `merlin.js` rodar antes do `app.js`; o tema garante a ordem via
  dependência do `wp_enqueue_script`. O site anterior usava LiteSpeed com
  `type="litespeed/javascript"`, que atrasava os dois — se reativar, exclua
  `merlin.js` e `app.js` do defer/combine.
- **Não instale plugin de consentimento de cookies.** O tema já tem banner +
  Consent Mode v2. Dois sistemas se anulam.
- **Não troque a paleta por uma com acento colorido.** A marca é monocromática por
  definição do brandbook; a hierarquia vem de textura (os 4 patterns), inversão e
  escala tipográfica. Introduzir uma cor de acento quebra o sistema.
