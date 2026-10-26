# deploy-vercel-site — Andraco Engenharia (Versão A)

Pasta **estática** e **independente** do site institucional. Padrão BuildV:
HTML + CSS + JS vanilla, sem build step.

> É a **Versão A** do teste A/B. A Versão B (LP) tem pacote próprio em
> `deploy-vercel-lp/` e pode ir para outro projeto/domínio.

## Conteúdo

| Arquivo | Rota |
|---|---|
| `index.html` | `/` — site institucional (15 projetos, 6 serviços, jornada de 7 etapas) |
| `privacidade.html` | `/privacidade` |
| `css/`, `js/`, `assets/` | só o que estas duas páginas usam |
| `vercel.json` | rotas limpas, redirects 301 das URLs antigas, cache, segurança |
| `robots.txt`, `sitemap.xml` | indexação liberada |

## Como publicar

1. Vercel → *Add New… → Project* → importe o repositório.
2. **Root Directory: `deploy-vercel-site`**
3. **Framework Preset: `Other`** (sem build command, sem output directory)
4. Deploy → *Settings → Domains* → `andracoengenharia.com.br` e `www`.

Ou, pela CLI: `cd deploy-vercel-site && vercel --prod`

## O que o `vercel.json` resolve

- **`cleanUrls`** — `/privacidade` funciona sem o `.html`.
- **Redirects 301 das URLs do WordPress atual** — `/financiamento`, `/projetos` e
  `/execucao-e-reforma` virariam 404 (o site novo é de página única). Agora vão
  para a âncora equivalente, preservando o que já está indexado.
- Redirects de `/wp-admin`, `/wp-content` e `/xmlrpc.php` para a home, encerrando
  as varreduras automáticas herdadas do WordPress.
- **Cache** — 1 ano *immutable* em `assets/`; 1 dia revalidável em `css/` e `js/`.
- Cabeçalhos de segurança: `nosniff`, `SAMEORIGIN`, `Referrer-Policy`, HSTS.

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
