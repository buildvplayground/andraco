# Andraco Engenharia — site institucional + LP de teste A/B

**Cliente:** Andraco Engenharia — engenharia civil e arquitetura, Curitiba e região
**Site atual:** https://andracoengenharia.com.br/ (WordPress + Elementor)
**Início:** 03/09/2026
**Escopo:** reestruturar o site (Versão A) + criar LP nova para teste A/B (Versão B),
com pastas de deploy para Vercel **e** WordPress para as duas páginas.

> ### 🔁 Rodada 2 — material oficial recebido (03/09/2026)
> O cliente enviou a **pasta oficial de materiais** (Drive `1Gk9K5Xh…`) com três
> correções de rumo importantes:
> 1. **A Andraco não tem amarelo.** A paleta é preto, branco e cinzas. A rodada 1
>    havia usado as variáveis globais do Elementor (`accent #E8970C`,
>    `primary #FFBC00`), que são defaults do tema — não a marca.
> 2. **Existem 6 ícones de serviço oficiais** — e eles definem a lista real de serviços.
> 3. **Manter a copy do site antigo, adaptando os conteúdos.**
> Somado a isso, o material trouxe: **15 projetos de fachada nomeados**,
> **5 números de autoridade**, as **7 imagens da jornada** (que batem 1:1 com o
> fluxo de trabalho do site antigo) e **7 coleções de interiores**.
> Todo o design system, os assets e o conteúdo foram refeitos sobre essa base.

---

## Checklist

| # | Etapa | Status | Observação |
|---|---|---|---|
| 1 | Extrair material | ✅ done | **Pasta oficial do Drive** (`1Gk9K5Xh…`) via rclone: 352 MB, 123 arquivos |
| 2 | Organizar pastas | ✅ done | `_raw/drive/`, `Marca/`, `Copys/`, `imagens/tratadas/`, `design-system/`, `Site/` |
| 2b | Repo GitHub | ⏸️ pending | Não há git nesta pasta e o `gh` não foi acionado — ver P6 |
| 3 | Design system | ✅ done | **Monocromático** (brandbook) + Alfa Slab One + 4 patterns de marca |
| 4 | Copy estruturada | ✅ done | Copy do site antigo mantida, conteúdo adaptado — `Copys/institucional_v2_adaptado.md` |
| 5 | Front-end | ✅ done | 3 páginas · 15 projetos · 6 ícones oficiais · jornada com foto |
| 6 | Ajustes finais | ✅ done | webp **175,7 MB → 9,71 MB (-94,5%)**; overflow zero de 320 a 1920 px |
| 7 | Tags e módulos | ✅ done | GTM `GTM-P6RVST79` + Consent Mode v2 + Merlin + banner LGPD |
| 8 | Revisão humana | 🛑 **aqui** | Preview local rodando — ver §Preview |
| 9 | Deploy | ⏸️ blocked | Pastas prontas e verificadas; falta domínio/repo — ver pendências |

---

## Inventário do material

### Origem (rodada 2 — material oficial)
`_raw/drive/` — pasta oficial do cliente, baixada por rclone (**352 MB, 123 arquivos**):

| Conteúdo | O que trouxe |
|---|---|
| `IDENTIDADE VISUAL.pdf` + pasta de logos | **Paleta oficial** `#272727 #4E555E #80858B #CDD6DF #D9D9D9` · tipografia **Alfa Slab One + Lastica** · **9 arquivos de logo** (completo/logotipo/ícone × preto/ink/branco) |
| `ÍCONES - SERVIÇOS` | **6 ícones oficiais** — e com eles a lista real de serviços |
| `NÚMEROS DE AUTORIDADE.pdf` | **5 números** com o texto exato do cliente |
| `PROJETOS FACHADAS` | **15 projetos nomeados**, 3 imagens cada (capa titulada + 2 limpas) |
| `PROJETOS INTERIORES` | 7 coleções (39 imagens) — 3 usadas nas faixas e splits |
| `IMAGENS - JORNADA` | **7 fotos** que batem 1:1 com o fluxo de trabalho do site antigo |
| `FLUXO DE PROJETO.pdf` | Confirma os 7 passos |
| `PALAVRAS CHAVES.docx` | 47 termos de SEO (ainda não aplicados — ver P12) |

Do **site em produção** continuam vindo: a copy institucional, o telefone, o e-mail
(decodificado da proteção Cloudflare), o **GTM `GTM-P6RVST79`** e o **popup Merlin**.

### O que foi descartado da rodada 1
- **A paleta âmbar/ouro.** Vinha de `--e-global-color-accent/primary` do Elementor —
  defaults do tema, não a marca. As cores mais *usadas* no CSS de produção já eram as
  certas (`#4e555e` 57×, `#272727` 53×, `#cdd6df` 30×): o sinal estava lá.
- **Os logos recolorizados** do WordPress → substituídos pelos 9 oficiais de 2024.
- **As 7 fotos de banco** (`Item-Andraco-*`) e os 32 renders sem nome da biblioteca de
  mídia → substituídos pelos 15 projetos nomeados.
- **IBM Plex Sans/Mono** → Alfa Slab One + Archivo.

### Imagens tratadas
Todas para `.webp` (q 74–80, `method=6`): **175,7 MB → 9,71 MB (-94,5%)**.
Espelhadas em `Site/assets/img/` e `imagens/tratadas/`.

---

## O que foi construído

### Versão A — site institucional (`Site/index.html`)
Página única que **consolida as 3 internas do site atual** (`/financiamento`,
`/projetos`, `/execucao-e-reforma`), com redirect 301 nos dois deploys.

Ritmo (nenhum par adjacente do mesmo tipo, 3 faixas full-bleed):
`hero → banda dos 5 números → split financiamento → 6 serviços com ícone oficial →
faixa → jornada de 7 etapas com foto → 15 projetos → faixa → sobre → faixa → FAQ →
CTA animado → rodapé`

### Versão B — LP de teste A/B (`Site/residencial.html` → `/residencial`)
Copy do Drive à risca. Mesmo design system, mas **tipos de seção diferentes** dos da
Versão A: bullets no hero, serviços 2×2, diferenciais em numeral grande, **tabela
comparativa** (vira cartões ≤900px), 6 projetos.

**Exceção registrada:** o doc da copy dizia "apenas uma métrica disponível, por isso
não há seção de métricas". A premissa caiu — agora há 5 números oficiais, e a LP
recebeu 4 deles. Número de autoridade é um dos elementos que mais movem conversão em
página de tráfego pago.

### Identidade aplicada
- **Sem acento cromático.** A hierarquia vem de **inversão** (bloco escuro vs. claro),
  **textura** (4 patterns) e **escala tipográfica**.
- **4 patterns de marca**, todos em cinzas e sem arquivo externo: `.pat-grid` (grade de
  prancheta), `.pat-hatch` (hachura de corte 45°), `.pat-apex` (chevron do símbolo do
  logo), `.pat-rule` (régua de cotas).
- **Os 6 ícones do cliente** em selo de 62px com a grade atrás — não soltos e
  centralizados acima do título, que é o clichê de card gerado por IA.
- **Fotos da jornada em P&B**, desaturando no hover: integra a fotografia de banco à
  marca monocromática **e** a distingue dos renders de projeto, que ficam coloridos.

---

## Verificação executada (medida, não estimada)

Rodada nas **3 páginas** e depois **repetida contra a saída do tema WordPress**:

| Suíte | Resultado |
|---|---|
| Overflow horizontal em 320/360/375/414/560/768/900/1024/1200/1440/1920 px | **0 px em todas** |
| Contraste WCAG AA (fundo efetivo resolvido elemento a elemento) | **0 pares abaixo do mínimo** |
| Requisitos BuildV + anti-"cara de IA" (32 checagens) | **sem achados** |
| Interações: lightbox, teclado, foco, menu, FAQ, cookies, reduced-motion, sem-JS | **todas OK** |
| GTM + Consent Mode + Merlin + fallback WhatsApp | **OK nas 3 páginas** |
| `php -l` em todos os 12 arquivos do tema | **sem erro** |
| Ícones, logos e imagens de projeto referenciados existem no disco | **87/87 OK** |
| Os **4 pacotes de deploy** auditados isoladamente, cada um na sua porta | **passam sozinhos** |
| Fidelidade da LP à copy oficial do Drive | **58/58 trechos** |

### Bugs reais encontrados e corrigidos no caminho
1. `overflow-x:hidden` no `body` **matava todo `position:sticky`** da página.
2. `position:sticky` em item de grid com `align-items:start` não tem trilho para viajar.
3. `.pf-thumb` era `<span>` (inline): `aspect-ratio` não se aplicava e a legenda do
   card invadia a linha seguinte da grade.
4. `translateX(26px)` do reveal estourava a viewport onde as colunas empilham (8 px em
   320 px, 6 px em 768 px).
5. `var HDR_OFF` declarada depois de um `return` antecipado → `scrollTo(0, NaN)`: as
   âncoras não funcionavam com `prefers-reduced-motion`.
6. Botão fantasma com texto escuro sobre fundo escuro em 4 contextos.
7. `--grey` (`#80858B`) nos numerais de 9px e 15px: **3,35:1**. A cor mais clara da
   paleta não serve para texto pequeno — a hierarquia tem de vir de tamanho e peso.
8. `<img src="">` do lightbox contava como imagem quebrada.
9. Widget do Merlin (z-index 10000) **cobria os botões do banner de cookies** no mobile.
10. `<img>` do Merlin sem `alt` e gatilho sem nome acessível (markup de terceiro,
    corrigido via JS defensivo).
11. `data-gallery` não era reescrito na geração do tema → as galerias dariam 404 no
    WordPress.
12. **Fonte display larga precisa de escala própria.** Alfa Slab One na escala de uma
    grotesca fazia o `h1` ocupar a tela e quebrava os números da banda em 2 linhas
    irregulares. Corrigido reduzindo `--fs-display` e dando **tratamento de stat** ao
    número (algarismo grande + unidade em `<em>` a 0.56em).
13. **Ler variável global de page builder não é ler a marca** — origem do erro de
    paleta da rodada 1.
14. **Windows: `shutil.rmtree` falha com `WinError 32`** se algo tem handle na pasta.
    Esvazie o conteúdo de baixo para cima em vez de remover o diretório.
15. **Trocar a fonte não é trocar o `font-family`.** Instrument Sans é bem mais
    estreita que Alfa Slab One: sem recalibrar a escala (+25%), as medidas de
    leitura em `ch` e o tracking, os títulos ficariam pequenos e as colunas
    desbalanceadas. Escala, medida e tracking mudam **junto** com a família.
16. **Ordem de geração importa no pipeline.** Os temas WordPress foram gerados
    antes da troca de fontes e saíram com o par antigo — a auditoria dos pacotes
    pegou. O gerador do tema passou a criar o `screenshot.png` sozinho pelo mesmo
    motivo (o `limpar()` apagava e o passo seguinte quebrava).

Todos registrados em `design-system/README.md` §8 para alimentar o `revisar-frontend`.

---

## Preview local

Servidor estático (com MIME de `.webp` registrado):
```bash
python "<scratchpad>/serve.py"     # serve Site/ (primeira porta livre a partir de 8850)
```
- Site: http://127.0.0.1:8851/
- LP: http://127.0.0.1:8851/residencial.html
- Privacidade: http://127.0.0.1:8851/privacidade.html

---

## Pastas de deploy — 4 pacotes INDEPENDENTES

Site e LP têm pacotes separados: cada um pode ir para um projeto/domínio próprio e
o teste A/B roda sem acoplamento.

| Pasta | Alvo | Peso | Home |
|---|---|---|---|
| `deploy-vercel-site/` | Vercel · Versão A | 10,8 MB | site institucional |
| `deploy-vercel-lp/` | Vercel · Versão B | **4,3 MB** | **a LP** |
| `deploy-wordpress-site/andraco-engenharia/` | tema WP · Versão A | 11,3 MB | site institucional |
| `deploy-wordpress-lp/andraco-lp/` | tema WP · Versão B | **4,8 MB** | **a LP** |

Cada pacote leva **só os assets que a sua própria página referencia** — a LP não
carrega os 15 projetos nem os 6 ícones do site, só os 6 e 4 que usa. Por isso é
menos da metade do peso.

O tema da LP difere do tema do site em cinco pontos: a LP é a `front-page`, o
`noindex` vale para todo o site (menos a privacidade), o preload aponta para o
`hero-lp`, os redirects legados do WordPress antigo não existem, e a nav é só
logo + CTA.

Instruções em cada `LEIA-ME.md`.

### Fidelidade da LP à copy do Drive
A LP segue o doc aprovado (`residencial.md`) nas 8 seções. Um script confere
**58 trechos da copy um a um** — todos presentes, botões com o rótulo "Fale
Conosco" e nenhum formulário, como o doc determina.
Um acréscimo registrado: a banda de números (o doc supunha que só havia uma
métrica; a premissa caiu com o `NÚMEROS DE AUTORIDADE.pdf`).

---

## Pendências (dependem do cliente/usuário)

| # | Pendência | Impacto |
|---|---|---|
| P1 | **Confirmar que `(41) 9.8444-2181` é o WhatsApp comercial ativo.** Foi o número publicado no site atual. Trocar em `WA_NUMBER` (`js/app.js`) se mudou. | Todos os CTAs |
| P2 | **`AW-1234` no container do GTM não é um ID de Google Ads válido** — parece placeholder. Conferir e corrigir dentro do GTM. | Conversão do Ads não registra |
| P3 | **Pixel do LinkedIn dispara antes do consentimento.** O Consent Mode só governa tags do Google. Usar o evento `consent_update` como gatilho da tag do LinkedIn no GTM. | Conformidade LGPD |
| P4 | **Definir domínio/hospedagem:** Vercel (importar repo, Root Directory `deploy-vercel`) ou manter WordPress (subir o tema). | Publicação |
| P10 | **Licenciar a fonte Lastica** (ou aprovar a substituta). O brandbook pede Lastica no texto; ela é licenciada e não está no Google Fonts. O site usa **Archivo**, a grotesca larga mais próxima. Alfa Slab One, do display, é a oficial mesmo. | Fidelidade de marca |
| P11 | **Categoria de cada projeto.** Os 15 nomes são os reais do Drive, mas o rótulo ("Residencial" / "Alto padrão") foi inferido da imagem. Cidade e ano de entrega, se existirem, aumentam a prova. | Credibilidade |
| P12 | **Material do Drive ainda não aproveitado:** `PORTFÓLIO ANDRACO.pdf`, `MENU DE SERVIÇOS - PLAYBOOK.pdf`, `MENU DE REFORMAS PACOTES.pdf`, `SITE INSPIRAÇÃO.pdf`, `RELATÓRIOS FANTHOM` (10 PDFs), `PALAVRAS CHAVES.docx` (47 termos de SEO), `Concorrentes diretos.docx` e 36 das 39 imagens de interiores. Dá páginas de serviço, seção de interiores e conteúdo de SEO numa próxima rodada. | Escopo futuro |
| P6 | **Criar o repositório GitHub** (`dev-buildv/andraco-site`, privado) e versionar só a pasta de deploy. Não foi feito: a pasta não é um repo git. | Histórico/deploy |
| P7 | **Confirmar `andraco.engenharia@gmail.com`** como e-mail de contato público (foi decodificado da proteção Cloudflare do site atual). | Rodapé, privacidade |
| P8 | **Fotos de obra entregue.** Todo o material visual é render. A seção está rotulada "Projetos desenvolvidos" com nota explícita. Fotos de obra concluída mudariam o patamar da prova. | Honestidade + conversão |
| P9 | **LP com `noindex, follow`** para não canibalizar a home no orgânico (é teste em tráfego pago). Reversível se a intenção for indexar. | SEO |

---

## Decisões registradas

- **Paleta monocromática do brandbook** — preto, branco e os 5 cinzas. Sem âmbar
  (erro da rodada 1) e sem o navy do wireframe da LP. A autoridade é o brandbook.
- **Tipografia (rodada 3):** **Instrument Sans** nos títulos + **Geist** no corpo,
  com os 3 pesos misturados de propósito — 700 bold (h1/h2/numerais), 600 semibold
  (h3, eyebrow, botão, ênfase, rótulo), 400 regular (corpo). 500 só na nav.
  Trocou o par Alfa Slab One + Archivo da rodada 2.
- **Ícones:** os 6 do kit do cliente, nunca biblioteca genérica.
- **Eyebrow sem `::before`** (pedido explícito): o registro vem do monoespaçado +
  tracking `.16em`.
- **Hero com espaçamento equilibrado:** grade `[corpo 1fr][trilho auto]`, espaço do
  header reservado por `padding-top` e padding vertical **simétrico** no corpo
  (67,5 px / 67,5 px medidos) — o bloco fica opticamente centrado.
- **Movimento pela especificação** de `sistema-de-movimento.md`, escrito do zero: o
  código em `motion/` é geração anterior (sem gate `data-motion`, sem split de
  título, sem variantes de reveal, sem lerp de wheel).
- **FAQ da LP reaproveitado na Versão A** — é copy aprovada do cliente sobre os
  mesmos serviços.
- **Merlin como destino do CTA, com `wa.me` como fallback real** — atende a copy
  ("WhatsApp via Merlin") sem nunca deixar CTA morto.
