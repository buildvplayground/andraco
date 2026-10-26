# deploy-vercel-lp — LP Construção Residencial (Versão B)

Pacote **estático e independente** da landing page de teste A/B.
**A LP é a raiz (`/`)** deste deploy — pode ir para um domínio ou subdomínio
próprio (ex.: `construir.andracoengenharia.com.br`) e rodar o teste sem depender
do site principal.

## Conteúdo

| Arquivo | Rota |
|---|---|
| `index.html` | `/` — a LP (é o `residencial.html` promovido a home) |
| `privacidade.html` | `/privacidade` |
| `css/`, `js/`, `assets/` | **só os assets da LP**: 6 projetos e 4 ícones, não os 15/6 do site |
| `vercel.json` | rotas limpas, redirect de `/residencial` para a raiz, cache, segurança |
| `robots.txt` | crawl liberado; o `noindex` fica na meta de cada página |

**4,3 MB** contra 10,8 MB do pacote do site — a LP não carrega o portfólio inteiro.

## Copy

Segue **literalmente** o doc aprovado do Drive
(`residencial.md`, pasta `1-rAyvd-SvdSXBNd6vuFmG-BKrgdXigLM`), nas 8 seções:
hero com 3 bullets · atuação (4 serviços) · diferenciais (4) · comparativo ·
projetos desenvolvidos · sobre nós · FAQ (6 perguntas) · CTA final.
**58 trechos da copy conferidos um a um** — todos presentes.
Todos os botões usam o rótulo do doc, **"Fale Conosco"**, e não há formulário.

**Um acréscimo, registrado:** o doc dizia "apenas uma métrica disponível (12+ anos),
por isso não há seção de métricas". A premissa caiu quando chegou o
`NÚMEROS DE AUTORIDADE.pdf` — a LP recebeu uma banda com 4 números reais, porque
prova numérica é um dos elementos que mais movem conversão em tráfego pago.
Reverter é remover a `<section class="band">`.

## Como publicar

1. Vercel → *Add New… → Project* → importe o repositório.
2. **Root Directory: `deploy-vercel-lp`**
3. **Framework Preset: `Other`**
4. Deploy → *Settings → Domains* → aponte o domínio/subdomínio da campanha.

Ou: `cd deploy-vercel-lp && vercel --prod`

## Sobre indexação

A LP tem `<meta name="robots" content="noindex, follow">` para não competir com a
home no orgânico. O `robots.txt` **libera o crawl de propósito**: o Google Ads
rastreia a landing para checagem de política, e bloquear ali causaria
"destino não rastreável". Quem barra o índice é a meta, não o robots.

## Medir o A/B

Os dois pacotes mandam para o mesmo `GTM-P6RVST79`. Para separar as versões no
relatório, use o campo `cta_pagina` que já vem no evento `cta_click`, ou crie uma
variável de hostname no GTM.

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
