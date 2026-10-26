# deploy-wordpress-site — tema do site (Versão A)

Tema WordPress **só do site institucional**. Sem page builder, sem jQuery, sem
biblioteca de animação — o mesmo HTML/CSS/JS validado da versão estática.

> A LP tem tema próprio em `deploy-wordpress-lp/`, para poder viver em outra
> instalação/domínio e rodar o A/B de forma independente.

```
andraco-engenharia/
├── style.css                cabeçalho do tema + todo o CSS (inclui os 4 patterns)
├── functions.php            enqueue, GTM, Merlin, redirects, favicon
├── inc/svg-sprite.php       sprite de ícones de interface
├── header.php  footer.php   cabeçalho com nav completa + rodapé
├── header-doc.php  footer-doc.php
├── front-page.php           HOME — 15 projetos, 6 serviços, jornada de 7 etapas
├── template-privacidade.php
├── index.php                fallback
├── screenshot.png
└── assets/  logos · icons (6) · img + portfolio (15 projetos) · js
```

## Instalação

1. **Subir o tema** — compacte `andraco-engenharia` em `.zip` → *Aparência → Temas
   → Adicionar novo → Enviar tema*. Ou por FTP em `wp-content/themes/`. Ative.
2. **Home** — *Configurações → Leitura → Sua página inicial exibe: Uma página
   estática*. Crie/escolha uma página (ex.: "Home") como *Página inicial*.
3. **Política de Privacidade** — página com slug `privacidade`, modelo
   **Politica de Privacidade**. Aponte também em *Configurações → Privacidade*.
4. **Permalinks** — *Configurações → Links permanentes* → **Nome do post** →
   *Salvar* uma vez (regenera as regras).

## O que o tema já resolve

| Item | Onde |
|---|---|
| GTM + `noscript` | `andraco_gtm_head()` / `andraco_gtm_noscript()` |
| Merlin | enfileirado como dependência do `app.js` (garante a ordem) |
| Galeria de cada projeto | `andraco_gallery( slug, total )` monta o `data-gallery` |
| Redirects 301 de `/financiamento`, `/projetos`, `/execucao-e-reforma` | `andraco_legacy_redirects()` |
| Preload do hero (LCP) | `andraco_preload_hero()` |
| `<head>` enxuto e CSS do Gutenberg fora do front | `andraco_clean_head()` / `andraco_dequeue_block_styles()` |
| Cache-busting por `filemtime()` | `andraco_assets()` |

## Onde editar o quê

- **Texto das seções** → `front-page.php` (estático de propósito: é copy aprovada).
- **WhatsApp** → constante `WA_NUMBER` no topo de `assets/js/app.js`. Único lugar.
- **GTM / Merlin** → constantes `ANDRACO_GTM_ID` e `ANDRACO_MERLIN_POPUP` em
  `functions.php`.
- **Cores, tipografia e patterns** → `:root` e §3 do `style.css`.

## Atenção

- **Nenhum plugin de cache que reordene ou combine scripts.** O Merlin precisa
  rodar antes do `app.js`. O site anterior usava LiteSpeed com
  `type="litespeed/javascript"`, que atrasava os dois.
- **Nenhum plugin de consentimento de cookies** — o tema já tem o aviso de cookies;
  dois sistemas se atrapalham.
- **Não introduza cor de acento.** A marca é monocromática por definição do
  brandbook; a hierarquia vem de textura, inversão e escala.

## Rastreamento (idêntico nos dois pacotes)

| Item | Valor |
|---|---|
| Google Tag Manager | `GTM-P6RVST79` |
| Popup Merlin | `.../popup/b7c9b5c8-49f5-4ab4-9217-a836686fb99b` |

**Aviso de cookies (LGPD).** O GTM carrega no carregamento da página, sem Consent
Mode e sem gate. O banner é só informativo: "Entendi" grava
`localStorage cookie_notice = 'ok'` e "Ver finalidades" abre a lista (Essenciais,
Análise, Publicidade). Não há evento de consentimento no `dataLayer`.

**CTAs.** Todo botão é um `<a href="wa.me/5541984442181">` de verdade:
Merlin carregou → abre o popup de qualificação; Merlin não carregou → o link
funciona e o lead cai direto no WhatsApp. Nunca existe CTA morto.
Cada clique empilha `cta_click` no `dataLayer` com `cta_secao` e `cta_destino`.

⚠️ **Não use otimização de JS que reordene scripts** no host/CDN: o `merlin.js`
tem de rodar antes do `app.js`.

## Design system (o mesmo nos dois)

- **Paleta monocromática do brandbook:** `#272727` `#4E555E` `#80858B` `#CDD6DF`
  `#D9D9D9` + preto e branco. **Sem acento cromático.**
- **Tipografia:** **Instrument Sans** nos títulos (700 bold / 600 semibold) e
  **Geist** no corpo (400 regular, 500 só na nav, 600 em ênfase e rótulo).
- **4 patterns de marca** (grade de prancheta, hachura 45°, chevron do símbolo,
  régua de cotas) — é o que substitui a cor de destaque.
- **Ícones de serviço:** arquivos do próprio cliente, em selo com grade.
- Contrastes **medidos no navegador**: 0 pares abaixo do AA.

Detalhes e armadilhas: `design-system/README.md`.
