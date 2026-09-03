# deploy-wordpress-lp — tema da LP (Versão B)

Tema WordPress **dedicado à landing page** de teste A/B. Aqui **a LP é a home**:
não existe página institucional. Serve para publicar a Versão B numa instalação
ou domínio próprio e rodar o teste independente do site principal.

```
andraco-lp/
├── style.css                "Andraco Engenharia — LP Construcao Residencial"
├── functions.php            enqueue, GTM + Consent Mode, Merlin, favicon
│                            (sem os redirects legados do site institucional)
├── inc/svg-sprite.php
├── header-lp.php  footer-lp.php    cabeçalho enxuto (logo + CTA) e rodapé curto
├── header-doc.php  footer-doc.php
├── front-page.php           A LP — é a home deste tema
├── template-residencial.php a mesma LP como template avulso, se quiserem em
│                            página interna em vez da home
├── template-privacidade.php
├── index.php                fallback
├── screenshot.png
└── assets/  logos · icons (4) · img + portfolio (6 projetos) · js
```

**4,8 MB** contra 11,3 MB do tema do site — leva só os assets da LP.

## Copy

Segue **literalmente** o doc aprovado do Drive (`residencial.md`), nas 8 seções.
**58 trechos conferidos um a um** — todos presentes. Botões com o rótulo
**"Fale Conosco"** e nenhum formulário, como o doc determina.

**Um acréscimo, registrado:** a banda com 4 números de autoridade. O doc dizia que
só havia uma métrica disponível; a premissa caiu com o `NÚMEROS DE AUTORIDADE.pdf`.
Reverter é remover a `<section class="band">` do `front-page.php`.

## Instalação

1. **Subir o tema** — compacte `andraco-lp` em `.zip` → *Aparência → Temas →
   Adicionar novo → Enviar tema*. Ative.
2. **Home** — *Configurações → Leitura → Sua página inicial exibe: Uma página
   estática* e escolha qualquer página como *Página inicial*. O `front-page.php`
   assume a home automaticamente e renderiza a LP.
3. **Política de Privacidade** — página com slug `privacidade`, modelo
   **Politica de Privacidade** (é a única página deste tema que fica indexável).
4. **Permalinks** — *Nome do post* → *Salvar* uma vez.

## Diferenças em relação ao tema do site

| | tema do site | tema da LP |
|---|---|---|
| Home | site institucional | **a LP** |
| `noindex` | só na LP | **todo o site**, menos a privacidade |
| Preload do hero | `hero-site.webp` | `hero-lp.webp` |
| Redirects legados do WP antigo | sim | **não** (não fazem sentido aqui) |
| Nav | completa (5 âncoras) | logo + CTA |
| Projetos / ícones | 15 / 6 | 6 / 4 |

## Medir o A/B

Os dois temas mandam para o mesmo `GTM-P6RVST79`. Para separar as versões, use o
`cta_pagina` que já vem no evento `cta_click`, ou uma variável de hostname no GTM.

## Atenção

- **Nenhum plugin de cache que reordene scripts** (o Merlin roda antes do `app.js`).
- **Nenhum plugin de consentimento** — já há banner + Consent Mode v2.

## Rastreamento (idêntico nos dois pacotes)

| Item | Valor |
|---|---|
| Google Tag Manager | `GTM-P6RVST79` |
| Popup Merlin | `.../popup/b7c9b5c8-49f5-4ab4-9217-a836686fb99b` |

**Consent Mode v2 (LGPD).** Antes do GTM, tudo entra como `denied`. O banner
dispara `gtag('consent','update', …)` no aceite e também empilha o evento próprio
`consent_update` no `dataLayer` — use esse evento como gatilho no GTM para as tags
**não-Google** (o Consent Mode só governa as do Google).

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
