!function(){var t={7146:function(){UxBuilder.addAction({icon:"dashicons dashicons-controls-play",tooltip:"Play animations",handler:function(t){let n=t.get("$iframe"),a=t.get("$timeout");n().contents().find("[data-animated]").each((function(t,n){const e=angular.element(n);""!==e.attr("data-animate")&&(e.attr("data-animated","false"),window.requestAnimationFrame((()=>{e.attr("data-animate-transform","true"),window.requestAnimationFrame((()=>{e.attr("data-animate-transition","true"),a((()=>{e.on("transitionend",(t=>{"transform"===t.originalEvent.propertyName&&(e.removeAttr("data-animate-transform"),e.removeAttr("data-animate-transition"))})),e.attr("data-animated","true")}),0,!1)}))})))}))}})}},n={};function a(e){var r=n[e];if(void 0!==r)return r.exports;var o=n[e]={exports:{}};return t[e](o,o.exports,a),o.exports}a.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return a.d(n,{a:n}),n},a.d=function(t,n){for(var e in n)a.o(n,e)&&!a.o(t,e)&&Object.defineProperty(t,e,{enumerable:!0,get:n[e]})},a.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},function(){"use strict";a(7146)}()}();