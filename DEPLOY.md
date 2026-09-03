# Deploy — Andraco Engenharia

Este repositório é um **monorepo com 4 pacotes de deploy**. A raiz **não tem**
`index.html` nem configuração de build — de propósito.

> ## ⚠️ O Root Directory é obrigatório
> Sem apontar o Root Directory, a Vercel tenta buildar a raiz do repositório,
> não encontra saída e falha com
> **“No Output Directory named `public` found after the Build completed”**.
> É a causa mais comum de falha aqui.

## Matriz de deploy

| Projeto na Vercel | **Root Directory** | Framework Preset | Home publicada |
|---|---|---|---|
| `andraco-site` | `deploy-vercel-site` | **Other** | site institucional (Versão A) |
| `andraco-lp` | `deploy-vercel-lp` | **Other** | a LP (Versão B) |

São **dois projetos separados** na Vercel, apontando para o mesmo repositório em
pastas diferentes. É isso que permite rodar o teste A/B com domínios distintos.

Os dois `vercel.json` já declaram `framework: null`, `buildCommand: null`,
`installCommand: null` e `outputDirectory: "."`. Isso **sobrepõe o painel**: mesmo
que o Framework Preset venha auto-detectado, nenhum build roda e a própria pasta
é servida. Só o Root Directory precisa estar certo.

### WordPress
Não vai para a Vercel. São temas para instalar em WordPress:

| Pacote | Tema | Home |
|---|---|---|
| `deploy-wordpress-site/` | `andraco-engenharia` | site institucional |
| `deploy-wordpress-lp/` | `andraco-lp` | a LP |

Instruções em cada `LEIA-ME.md`.

## Publicar pela CLI (caminho mais curto)

Dispensa configuração de painel — a pasta e o `vercel.json` mandam:

```bash
npm i -g vercel
vercel login

# site institucional
cd deploy-vercel-site && vercel --prod

# LP (projeto separado)
cd ../deploy-vercel-lp && vercel --prod
```

Na primeira execução em cada pasta, o CLI pergunta o nome do projeto — use
`andraco-site` e `andraco-lp`. Ele grava um `.vercel/` local (já ignorado no git).

## Se um deploy falhar

```bash
vercel login                       # o CLI precisa de token válido
vercel inspect <deployment-id> --logs
vercel ls                          # lista os deploys recentes
```

Antes de investigar o pacote, confira nesta ordem:

1. **Root Directory** — de longe a causa mais comum (ver o aviso no topo).
2. **Framework Preset** — deve ser `Other`. Os `vercel.json` já forçam isso.
3. **Branch de produção** — os pacotes estão em `main`.
4. **O commit chegou ao remoto** — `git log origin/main -1` deve bater com o local.

## O que já está verificado nos pacotes

Checado por script, não por inspeção visual:

- `vercel.json` validado contra o **schema oficial** (`openapi.vercel.sh/vercel.json`):
  **0 erros** nos dois.
- Todos os padrões `source` de `redirects`/`headers` **compilam com path-to-regexp**
  (é o que a Vercel usa) — 11 padrões testados.
- Nomes de arquivo seguros em Linux: sem espaço, sem não-ASCII, **sem colisão de
  caixa** (o build roda em sistema case-sensitive).
- Paridade disco ↔ git: **43/43** na LP e **91/91** no site.
- `index.html` presente na raiz de cada pacote.
- Nenhum arquivo que a Vercel trataria como serverless function.
- Nenhum arquivo acima de 50 MB. Pesos: LP **4,3 MB**, site **10,8 MB**.
- Os 4 pacotes auditados **isoladamente**, cada um servido na sua porta:
  overflow horizontal 0 de 320 a 1920 px, 0 par de contraste abaixo do AA,
  0 imagem sem `alt` ou quebrada, 0 falha de rede em recurso próprio.
