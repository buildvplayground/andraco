<?php
/**
 * Sprite de ícones SVG. Ícones autorais, usados só onde carregam significado
 * e reaproveitados pelo mesmo conceito entre seções.
 *
 * @package andraco
 */

defined( 'ABSPATH' ) || exit;

function andraco_svg_sprite() {
	?>
<svg width="0" height="0" aria-hidden="true" style="position:absolute" focusable="false">
  <symbol id="i-arrow" viewBox="0 0 16 16"><path d="M1 8h13M9.5 3.5 14 8l-4.5 4.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="square"/></symbol>
  <symbol id="i-check" viewBox="0 0 16 16"><path d="M2.5 8.6 6 12l7.5-8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></symbol>
  <symbol id="i-zoom" viewBox="0 0 16 16"><circle cx="7" cy="7" r="4.6" fill="none" stroke="currentColor" stroke-width="1.4"/><path d="M10.6 10.6 14.4 14.4M5 7h4M7 5v4" stroke="currentColor" stroke-width="1.4" stroke-linecap="square"/></symbol>
  <symbol id="i-phone" viewBox="0 0 16 16"><path d="M3 2.6h2.4l1.1 2.7-1.4 1a7.4 7.4 0 0 0 3.6 3.6l1-1.4 2.7 1.1V13a.9.9 0 0 1-1 .9A11 11 0 0 1 2.1 3.6a.9.9 0 0 1 .9-1z" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></symbol>
  <symbol id="i-mail" viewBox="0 0 16 16"><rect x="1.6" y="3.4" width="12.8" height="9.2" fill="none" stroke="currentColor" stroke-width="1.4"/><path d="m1.9 4.2 6.1 4.4 6.1-4.4" fill="none" stroke="currentColor" stroke-width="1.4"/></symbol>
  <symbol id="i-insta" viewBox="0 0 16 16"><rect x="2.2" y="2.2" width="11.6" height="11.6" rx="3.4" fill="none" stroke="currentColor" stroke-width="1.4"/><circle cx="8" cy="8" r="2.9" fill="none" stroke="currentColor" stroke-width="1.4"/><circle cx="11.4" cy="4.6" r=".95" fill="currentColor"/></symbol>
  <symbol id="i-close" viewBox="0 0 16 16"><path d="m3.5 3.5 9 9m0-9-9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/></symbol>
  <symbol id="i-prev" viewBox="0 0 16 16"><path d="M10 2.5 4.5 8l5.5 5.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/></symbol>
  <symbol id="i-next" viewBox="0 0 16 16"><path d="M6 2.5 11.5 8 6 13.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/></symbol>
</svg>
	<?php
}
