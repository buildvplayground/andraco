/* ==========================================================================
   Andraco — motor de movimento
   Implementa a especificação de `sistema-de-movimento.md` (intensidade ~4/10):
   reveals com stagger + gatilho em 3 camadas, títulos palavra por palavra,
   parallax de faixa (<=0.12), scroll suave por lerp, header, contadores.
   Zero dependência externa. Nada depende de animação para existir.
   ========================================================================== */
(function () {
  "use strict";

  var root = document.documentElement;
  var REDUCED = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var HDR_OFF = 76;   /* altura do header fixo — declarado ANTES de qualquer
                         retorno antecipado, senão as âncoras do caminho
                         reduced-motion recebem `undefined` e o scroll vira NaN */

  /* Se o usuário pediu menos movimento, tira o gate: tudo visível, nada anima. */
  if (REDUCED) {
    root.removeAttribute("data-motion");
    window.__motionReady = true;
    bootHeader();
    bootAnchorsPlain();
    return;
  }
  window.__motionReady = true;

  /* ---------------------------------------------------------------- 1. Split
     Divide títulos de TEXTO PURO em palavras mascaradas. Títulos com <strong>,
     <br> ou ícones dentro são ignorados de propósito (não quebrar marcação). */
  function splitWords(el) {
    if (!el || el.dataset.split === "1") return false;
    if (el.children.length) return false;               // só texto puro
    var txt = el.textContent.trim();
    if (!txt) return false;
    var frag = document.createDocumentFragment();
    txt.split(/\s+/).forEach(function (w, i, arr) {
      var span = document.createElement("span");
      span.className = "w-mask";
      var it = document.createElement("i");
      it.textContent = w;
      it.style.transitionDelay = i * 42 + "ms";
      span.appendChild(it);
      frag.appendChild(span);
      if (i < arr.length - 1) frag.appendChild(document.createTextNode(" "));
    });
    el.textContent = "";
    el.appendChild(frag);
    el.dataset.split = "1";
    return true;
  }

  function blockOf(el) {
    // sobe até o ancestral que carrega (ou vai carregar) o data-reveal
    var n = el;
    while (n && n !== document.body) {
      if (n.hasAttribute("data-reveal")) return n;
      n = n.parentElement;
    }
    return el.closest(".sec-head, .hero-inner, .strip-body, .close-lead") || el.parentElement;
  }

  document.querySelectorAll("[data-hero-h], h2").forEach(function (h) {
    if (splitWords(h)) {
      var blk = blockOf(h);
      if (blk) blk.setAttribute("data-reveal", "soft");
    }
  });

  /* ------------------------------------------------------- 2. Stagger automático
     Irmãos diretos com data-reveal no mesmo pai: delay = índice * 80ms (máx 6). */
  var groups = new Map();
  document.querySelectorAll("[data-reveal]").forEach(function (el) {
    var p = el.parentElement;
    if (!p) return;
    if (!groups.has(p)) groups.set(p, []);
    groups.get(p).push(el);
  });
  groups.forEach(function (list) {
    if (list.length < 2) return;
    list.forEach(function (el, i) {
      var d = Math.min(i, 6) * 80;
      if (d) el.style.transitionDelay = d + "ms";
    });
  });

  /* --------------------------------------------------------------- 3. Gatilhos */
  var pending = new Set(document.querySelectorAll("[data-reveal]"));

  function show(el, animate) {
    if (!pending.has(el)) return;
    pending.delete(el);
    if (!animate) {
      el.style.transition = "none";
      el.querySelectorAll(".w-mask > i").forEach(function (i) { i.style.transition = "none"; });
    }
    el.classList.add("is-in");
    if (!animate) {
      // devolve a transição depois de pintar, para hovers futuros
      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          el.style.transition = "";
          el.querySelectorAll(".w-mask > i").forEach(function (i) { i.style.transition = ""; });
        });
      });
    }
  }

  // camada 2 — scroll normal
  var io = null;
  if ("IntersectionObserver" in window) {
    io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { show(e.target, true); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -7% 0px" });
    pending.forEach(function (el) { io.observe(el); });
  } else {
    pending.forEach(function (el) { show(el, false); });
  }

  // camada 1 — primeira tela (IO não dispara em documento oculto; rAF também não roda)
  function firstScreen() {
    var vh = window.innerHeight;
    Array.from(pending).forEach(function (el) {
      var r = el.getBoundingClientRect();
      if (r.top < vh * 0.92 && r.bottom > 0) { show(el, true); if (io) io.unobserve(el); }
    });
  }
  requestAnimationFrame(firstScreen);
  setTimeout(firstScreen, 140);

  // camada 3 — saltos (âncora, hash, arraste da barra): revela sem animar o que já passou
  function flush() {
    if (!pending.size) return;
    var lim = window.innerHeight * 0.3;
    Array.from(pending).forEach(function (el) {
      var r = el.getBoundingClientRect();
      if (r.bottom < lim) { show(el, false); if (io) io.unobserve(el); }
    });
  }

  /* ----------------------------------------------------------- 4. Header */
  function bootHeader() {
    var hdr = document.querySelector(".hdr");
    if (!hdr) return;
    var last = window.scrollY, ticking = false;
    function upd() {
      var y = window.scrollY;
      hdr.setAttribute("data-solid", y > 40 ? "true" : "false");
      if (y > 260 && y > last + 4) hdr.setAttribute("data-hidden", "true");
      else if (y < last - 4 || y <= 260) hdr.setAttribute("data-hidden", "false");
      last = y;
      ticking = false;
    }
    window.addEventListener("scroll", function () {
      if (!ticking) { ticking = true; requestAnimationFrame(upd); }
    }, { passive: true });
    upd();
  }
  bootHeader();

  /* -------------------------------------------------- 5. Parallax de faixa (<=0.12) */
  var strips = Array.prototype.slice.call(document.querySelectorAll(".strip-media"));
  function parallax() {
    var vh = window.innerHeight;
    strips.forEach(function (m) {
      var s = m.parentElement.getBoundingClientRect();
      if (s.bottom < -80 || s.top > vh + 80) return;
      var p = (s.top + s.height / 2 - vh / 2) / vh;   // -1 .. 1
      m.style.transform = "translate3d(0," + (p * -0.12 * s.height).toFixed(1) + "px,0)";
    });
  }

  /* ----------------------------------------------------------- 6. Contadores */
  var counters = Array.prototype.slice.call(document.querySelectorAll("[data-count]"));
  function runCount(el, delay) {
    var target = parseFloat(el.getAttribute("data-count"));
    var suffix = el.getAttribute("data-count-suffix") || "";
    var prefix = el.getAttribute("data-count-prefix") || "";
    var t0 = null, DUR = 1600;
    function step(ts) {
      if (t0 === null) t0 = ts;
      var t = Math.min(1, (ts - t0) / DUR);
      var eased = 1 - Math.pow(1 - t, 3);
      el.textContent = prefix + Math.round(target * eased) + suffix;
      if (t < 1) requestAnimationFrame(step);
    }
    setTimeout(function () { requestAnimationFrame(step); }, delay);
  }
  if (counters.length && "IntersectionObserver" in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var idx = counters.indexOf(e.target);
        runCount(e.target, Math.max(0, idx % 4) * 180);
        cio.unobserve(e.target);
      });
    }, { threshold: 0.5 });
    counters.forEach(function (c) { cio.observe(c); });
  }

  /* ------------------------------------------- 7. Scroll suave (lerp) + âncoras
     Usa o scroll real da janela, então position:sticky e :target seguem funcionando.
     Só em ponteiro fino — no touch fica o momentum nativo. */
  var FINE = window.matchMedia("(hover: hover) and (pointer: fine)").matches;

  function overlayOpen() {
    return document.body.style.overflow === "hidden";
  }
  function overScrollable(node) {
    var n = node, hops = 0;
    while (n && n !== document.body && hops < 8) {
      if (n.scrollHeight - n.clientHeight > 4) {
        var ov = getComputedStyle(n).overflowY;
        if (ov === "auto" || ov === "scroll") return true;
      }
      n = n.parentElement; hops++;
    }
    return false;
  }

  var lerpOn = false, target = window.scrollY, current = window.scrollY, raf = null;

  function loop() {
    current += (target - current) * 0.105;
    if (Math.abs(target - current) < 0.4) { current = target; lerpOn = false; }
    window.scrollTo(0, current);
    parallax();
    flush();
    if (lerpOn) raf = requestAnimationFrame(loop);
    else raf = null;
  }
  function kick() {
    if (!lerpOn) { lerpOn = true; if (!raf) raf = requestAnimationFrame(loop); }
  }
  function maxScroll() {
    return Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
  }

  if (FINE) {
    window.addEventListener("wheel", function (e) {
      if (overlayOpen() || overScrollable(e.target) || e.ctrlKey) return;
      e.preventDefault();
      if (!lerpOn) current = window.scrollY;
      target = Math.max(0, Math.min(maxScroll(), target + e.deltaY));
      kick();
    }, { passive: false });

    window.addEventListener("keydown", function (e) {
      var t = e.target;
      if (t && /^(INPUT|TEXTAREA|SELECT)$/.test(t.tagName)) return;
      if (overlayOpen()) return;
      var vh = window.innerHeight, d = 0;
      if (e.key === "PageDown" || (e.key === " " && !e.shiftKey)) d = vh * 0.86;
      else if (e.key === "PageUp" || (e.key === " " && e.shiftKey)) d = -vh * 0.86;
      else if (e.key === "ArrowDown") d = 90;
      else if (e.key === "ArrowUp") d = -90;
      else if (e.key === "Home") { e.preventDefault(); ssTo(0); return; }
      else if (e.key === "End") { e.preventDefault(); ssTo(maxScroll()); return; }
      if (!d) return;
      e.preventDefault();
      if (!lerpOn) current = window.scrollY;
      target = Math.max(0, Math.min(maxScroll(), target + d));
      kick();
    });

    // se o usuário arrastar a barra ou rolar por outro meio, ressincroniza
    window.addEventListener("scroll", function () {
      if (!lerpOn) { current = window.scrollY; target = window.scrollY; }
    }, { passive: true });
  }

  function ssTo(y) {
    y = Math.max(0, Math.min(maxScroll(), y));
    if (FINE) { current = window.scrollY; target = y; kick(); }
    else {
      // touch/pointer grosso: animação curta por rAF, sem sequestrar o scroll
      var from = window.scrollY, t0 = null, DUR = 620;
      function step(ts) {
        if (t0 === null) t0 = ts;
        var t = Math.min(1, (ts - t0) / DUR);
        var e2 = t < 0.5 ? 16 * t * t * t * t * t : 1 - Math.pow(-2 * t + 2, 5) / 2;
        window.scrollTo(0, from + (y - from) * e2);
        parallax(); flush();
        if (t < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    }
  }
  window.__ssTo = ssTo;

  function anchorTarget(hash) {
    if (!hash || hash === "#" || hash.length < 2) return null;
    try { return document.querySelector(hash); } catch (err) { return null; }
  }

  document.addEventListener("click", function (e) {
    var a = e.target.closest ? e.target.closest('a[href^="#"]') : null;
    if (!a) return;
    var el = anchorTarget(a.getAttribute("href"));
    if (!el) return;
    e.preventDefault();
    var fromDrawer = !!a.closest(".drawer");
    var go = function () {
      ssTo(el.getBoundingClientRect().top + window.scrollY - HDR_OFF);
      history.replaceState(null, "", a.getAttribute("href"));
    };
    setTimeout(go, fromDrawer ? 420 : 80);   // deixa o menu mobile fechar antes
  });

  function bootAnchorsPlain() {
    document.addEventListener("click", function (e) {
      var a = e.target.closest ? e.target.closest('a[href^="#"]') : null;
      if (!a) return;
      var el = anchorTarget(a.getAttribute("href"));
      if (!el) return;
      e.preventDefault();
      setTimeout(function () {
        window.scrollTo(0, el.getBoundingClientRect().top + window.scrollY - HDR_OFF);
      }, a.closest(".drawer") ? 420 : 0);
    });
  }

  /* ------------------------------------------------------------ 8. Ciclo base */
  var tick = false;
  window.addEventListener("scroll", function () {
    if (tick) return;
    tick = true;
    requestAnimationFrame(function () { parallax(); flush(); tick = false; });
  }, { passive: true });
  window.addEventListener("resize", function () { parallax(); }, { passive: true });
  parallax();

  // hash na carga: revela o que ficou atrás
  if (location.hash) setTimeout(flush, 200);
})();
