/* ==========================================================================
   Andraco — comportamento da interface
   Número de WhatsApp centralizado numa constante única.
   ========================================================================== */
(function () {
  "use strict";

  /* ------------------------------------------------------------------ WhatsApp
     ⚠️ Fonte: telefone publicado no site atual — (41) 9.8444-2181.
     Trocar aqui (e SÓ aqui) se o número comercial mudar.
     Se a Merlin for contratada, ela substitui este destino — ver report. */
  var WA_NUMBER = "5541984442181";

  var WA_TEXT = {
    default: "Olá! Vim pelo site da Andraco Engenharia e quero falar sobre meu projeto.",
    hero: "Olá! Vim pelo site da Andraco e quero saber como construir minha casa com o financiamento resolvido.",
    financiamento: "Olá! Quero entender como funciona o financiamento da minha obra com a Andraco.",
    projeto: "Olá! Quero falar sobre o projeto arquitetônico da minha casa.",
    execucao: "Olá! Já tenho o projeto e quero um orçamento de execução de obra.",
    pacote: "Olá! Quero o pacote completo: projeto, financiamento e execução.",
    servicos: "Olá! Vi os serviços da Andraco no site e quero falar sobre o meu projeto.",
    projetos: "Olá! Vi os projetos desenvolvidos pela Andraco e quero desenhar o projeto da minha casa.",
    comparativo: "Olá! Quero construir com a Andraco e começar pelo financiamento.",
    faq: "Olá! Ainda tenho dúvidas e quero falar com a equipe da Andraco.",
    contato: "Olá! Quero solicitar um orçamento com a Andraco Engenharia.",
    reforma: "Olá! Quero falar sobre uma reforma residencial."
  };

  function waHref(key) {
    var t = WA_TEXT[key] || WA_TEXT.default;
    return "https://wa.me/" + WA_NUMBER + "?text=" + encodeURIComponent(t);
  }

  document.querySelectorAll("[data-wa-btn]").forEach(function (a) {
    a.setAttribute("href", waHref(a.getAttribute("data-wa-btn")));
    a.setAttribute("target", "_blank");
    a.setAttribute("rel", "noopener");
  });

  /* ------------------------------------------------------------------- Merlin
     O popup do Merlin qualifica o lead (tipo de projeto, faixa de investimento,
     prazo) e encaminha para o WhatsApp — é o destino que a copy aprovada define.

     Estratégia: o CTA continua sendo um `<a href="wa.me/...">` de verdade.
     - Merlin carregou  -> o clique abre o popup (preventDefault no link).
     - Merlin não veio  -> o link funciona e o lead cai direto no WhatsApp.
     Nunca existe CTA morto, e o href continua legível para leitor de tela. */
  var MERLIN_BTN = ".merlin-button";
  var merlinReady = false;

  function merlinTrigger() {
    return document.querySelector(MERLIN_BTN);
  }

  /* O widget do Merlin é markup de terceiro e vem com um <img> sem alt e sem
     nome acessível no gatilho. Não podemos editar o script deles, então
     corrigimos o DOM injetado — senão o site inteiro perde a conformidade AA
     por causa de um elemento que não é nosso. */
  function patchMerlinA11y(btn) {
    btn.querySelectorAll("img:not([alt])").forEach(function (img) {
      img.setAttribute("alt", "");           // ícone decorativo: alt vazio
      img.setAttribute("aria-hidden", "true");
    });
    var hasName = btn.getAttribute("aria-label") || btn.textContent.trim();
    if (!hasName) {
      btn.setAttribute("aria-label", "Abrir atendimento pelo WhatsApp");
    }
    if (!btn.getAttribute("role") && btn.tagName !== "BUTTON" && btn.tagName !== "A") {
      btn.setAttribute("role", "button");
      if (!btn.hasAttribute("tabindex")) btn.setAttribute("tabindex", "0");
    }
  }

  function watchMerlin() {
    if (!window.ANDRACO_MERLIN_POPUP) return;      // Merlin não instalado nesta página
    var now = merlinTrigger();
    if (now) { merlinReady = true; patchMerlinA11y(now); return; }
    if (!("MutationObserver" in window)) return;
    // o Merlin injeta o botão de forma assíncrona depois de buscar o popup
    var obs = new MutationObserver(function () {
      var el = merlinTrigger();
      if (el) { merlinReady = true; patchMerlinA11y(el); obs.disconnect(); }
    });
    obs.observe(document.documentElement, { childList: true, subtree: true });
    // desiste depois de 12s e deixa os CTAs no caminho do WhatsApp
    setTimeout(function () { obs.disconnect(); }, 12000);
  }
  watchMerlin();

  function push(evt) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(evt);
  }

  document.addEventListener("click", function (e) {
    var a = e.target.closest ? e.target.closest("[data-wa-btn]") : null;
    if (!a) return;
    var trigger = merlinReady ? merlinTrigger() : null;

    // mede o clique nos dois caminhos, para a conversão não depender do destino
    push({
      event: "cta_click",
      cta_secao: a.getAttribute("data-wa-btn"),
      cta_destino: trigger ? "merlin" : "whatsapp",
      cta_pagina: document.title
    });

    if (trigger) {
      e.preventDefault();
      trigger.click();
    }
  });

  /* ---------------------------------------------------------- Menu off-canvas */
  var burger = document.querySelector(".burger");
  var drawer = document.querySelector(".drawer");
  var scrim = document.querySelector(".scrim");

  function setDrawer(open) {
    if (!drawer) return;
    drawer.classList.toggle("open", open);
    if (scrim) scrim.classList.toggle("open", open);
    if (burger) burger.setAttribute("aria-expanded", open ? "true" : "false");
    document.body.style.overflow = open ? "hidden" : "";
    document.body.classList.toggle("overlay-open", open);
    if (open) {
      drawer.querySelectorAll("a").forEach(function (a, i) {
        a.style.animationDelay = 90 + i * 55 + "ms";
      });
    }
  }
  if (burger) burger.addEventListener("click", function () {
    setDrawer(!drawer.classList.contains("open"));
  });
  if (scrim) scrim.addEventListener("click", function () { setDrawer(false); });
  if (drawer) drawer.addEventListener("click", function (e) {
    if (e.target.closest("a")) setDrawer(false);
  });

  /* ------------------------------------------------- Lightbox galeria por projeto */
  var lb = document.querySelector(".lb");
  if (lb) {
    var lbImg = lb.querySelector(".lb-stage img");
    var lbTitle = lb.querySelector(".lb-title");
    var lbIdx = lb.querySelector(".lb-idx");
    var list = [];
    var pos = 0;
    var opener = null;

    function render() {
      lbImg.hidden = false;
      lbImg.src = list[pos];
      lbImg.alt = (lbTitle.textContent || "Projeto") + " — imagem " + (pos + 1) + " de " + list.length;
      lbIdx.textContent = (pos + 1) + " / " + list.length;
    }
    function open(card) {
      var raw = card.getAttribute("data-gallery") || "";
      list = raw.split("|").filter(Boolean);
      if (!list.length) return;
      pos = 0;
      opener = card;
      lbTitle.textContent = card.getAttribute("data-title") || "Projeto desenvolvido";
      lb.setAttribute("data-single", list.length === 1 ? "true" : "false");
      render();
      lb.classList.add("open");
      lb.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
      document.body.classList.add("overlay-open");
      var close = lb.querySelector(".lb-close");
      if (close) close.focus();
    }
    function close() {
      lb.classList.remove("open");
      lb.setAttribute("aria-hidden", "true");
      lbImg.hidden = true;
      lbImg.removeAttribute("src");
      document.body.style.overflow = "";
      document.body.classList.remove("overlay-open");
      if (opener) { opener.focus(); opener = null; }
    }
    function step(d) {
      if (list.length < 2) return;
      pos = (pos + d + list.length) % list.length;
      render();
    }

    document.querySelectorAll(".pf-card").forEach(function (card) {
      card.addEventListener("click", function () { open(card); });
    });
    lb.addEventListener("click", function (e) {
      if (e.target.closest(".lb-close")) return close();
      if (e.target.closest(".lb-prev")) return step(-1);
      if (e.target.closest(".lb-next")) return step(1);
      if (e.target === lb || e.target.closest(".lb-stage") === e.target) close();
    });
    document.addEventListener("keydown", function (e) {
      if (!lb.classList.contains("open")) return;
      if (e.key === "Escape") { e.preventDefault(); close(); }
      else if (e.key === "ArrowLeft") { e.preventDefault(); step(-1); }
      else if (e.key === "ArrowRight") { e.preventDefault(); step(1); }
      else if (e.key === "Tab") {
        // mantém o foco dentro do lightbox
        var f = lb.querySelectorAll("button");
        if (!f.length) return;
        var first = f[0], lastF = f[f.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); lastF.focus(); }
        else if (!e.shiftKey && document.activeElement === lastF) { e.preventDefault(); first.focus(); }
      }
    });
  }

  /* ---------------------------------- Passo a passo do CTA final (linha desenha) */
  var flow = document.querySelector(".flow");
  if (flow) {
    if ("IntersectionObserver" in window) {
      var fio = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) { flow.setAttribute("data-on", "true"); fio.unobserve(e.target); }
        });
      }, { threshold: 0.3 });
      fio.observe(flow);
    } else {
      flow.setAttribute("data-on", "true");
    }
  }

  /* ------------------------------------------------- FAQ: um aberto por vez */
  var faq = document.querySelector(".faq");
  if (faq) {
    faq.addEventListener("toggle", function (e) {
      var d = e.target;
      if (d.tagName !== "DETAILS" || !d.open) return;
      faq.querySelectorAll("details[open]").forEach(function (o) { if (o !== d) o.open = false; });
    }, true);
  }

  /* --------------------------------------------- Banner de cookies (LGPD) */
  var ck = document.querySelector(".ck");
  if (ck) {
    var KEY = "andraco_consent_v1";
    window.dataLayer = window.dataLayer || [];

    function emit(state) {
      // 1) Consent Mode v2 — é o que realmente libera/bloqueia as tags do Google
      if (typeof window.gtag === "function") {
        window.gtag("consent", "update", {
          ad_storage: state,
          ad_user_data: state,
          ad_personalization: state,
          analytics_storage: state
        });
      }
      // 2) evento próprio, para acionar tags não-Google dentro do GTM
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: "consent_update",
        consent_analytics: state,
        consent_marketing: state
      });
    }
    var saved = null;
    try { saved = localStorage.getItem(KEY); } catch (err) { /* modo privado */ }

    if (saved) {
      emit(saved);
    } else {
      setTimeout(function () {
        ck.classList.add("open");
        document.body.classList.add("consent-pending");
      }, 1200);
    }
    ck.addEventListener("click", function (e) {
      var b = e.target.closest("[data-consent]");
      if (!b) return;
      var state = b.getAttribute("data-consent");   // "granted" | "denied"
      try { localStorage.setItem(KEY, state); } catch (err) { /* segue sem persistir */ }
      emit(state);
      ck.classList.remove("open");
      document.body.classList.remove("consent-pending");
    });
  }

  /* ------------------------------------------------------------ Ano no rodapé */
  document.querySelectorAll("[data-year]").forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });
})();
