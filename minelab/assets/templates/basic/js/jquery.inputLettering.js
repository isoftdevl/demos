!function(t,e,n,i){"use strict";t.fn.letteringInput=function(e){var i,o={inputClass:"letter",hiddenInputName:"",hiddenInputWrapperID:"",forbiddenKeyCodes:[9,16,17,18,20,27,32,33,34,38,40,45,144],onFocusLetter:function(){},onBlurLetter:function(){},onLetterKeyup:function(){},onSet:function(){}};i="object"==typeof e?t.extend({},o,e):o;var u={destroy:function(e){t("input."+i.inputClass,e).unbind()}};function r(e){var n=t("input."+i.inputClass,e);n.on("keydown",(function(e){var u=t(this),r=t.trim(u.val()),v=u.getCursorPosition();if(u.val(r),37===e.keyCode)v||f(u,n);else if(39===e.keyCode)v&&l(u,n);else if(8===e.keyCode)(u=v?u:a(u,n))&&d(u),c(n),v&&""!==u.val()&&setTimeout((function(){f(u,n)}),20);else if(46===e.keyCode){var p=s(u,n);v&&p&&t(p).val(""),c(n);var y=s(u,n);y&&""!==t(y).val()&&setTimeout((function(){u.setCaretPosition(0)}),20)}else if(-1===t.inArray(e.keyCode,i.forbiddenKeyCodes)){var g=e.key,m=e.which||e.code;"Unidentified"===g&&(g=String.fromCharCode(m)),function(e,n,i,o){var u=o.index(e),r=h(o);if(!o.filter((function(){return!t(this).is(":hidden")&&!this.value})).length)return c(o),!1;if(void 0!==i&&i.length>1)return!1;-1!==u&&(u=n?u+1:u);if(r.length<o.length){if(""!==e.val())r=[r.slice(0,u),i,r.slice(u)].join(""),c(o,r),s(e,o)&&setTimeout((function(){l(e,o)}),1);else setTimeout((function(){l(e,o)}),1),c(o)}}(u,v,g,n)}"function"==typeof o.onSet&&setTimeout((function(){i.onSet.call(null,t(this),e)}),40)})).on("keyup",(function(e){"function"==typeof o.onLetterKeyup&&setTimeout((function(){i.onLetterKeyup.call(null,t(this),e)}),1)})).on("focus",(function(e){var u=t(this),r=n.index(u);if(u.val())return!1;var c=n.filter((function(t){return!this.value&&t<r}));void 0!==c[0]&&d(c[0]),"function"==typeof o.onFocusLetter&&i.onFocusLetter.call(null,t(this),e)})).on("blur",(function(e){setTimeout((function(){var u=h(n);"function"==typeof o.onBlurLetter&&i.onBlurLetter.call(null,t(this),e,u)}),40)}))}function c(e,n){setTimeout((function(){var o=void 0!==n?n:h(e);i.hiddenInputName&&i.hiddenInputWrapperID&&t('input[name="'+i.hiddenInputName+'"]',"#"+i.hiddenInputWrapperID).val(o),e.map((function(){this.value=void 0!==o[0]?o[0]:"",o=o.substr(1)}))}),30)}function f(t,e){var n=a(t,e);if(!n)return!1;d(n)}function l(t,e){var n=s(t,e);if(!n)return!1;d(n)}function s(e,n){var i=n.index(e),o=null;if(-1!==i&&n.length-1>i){var u=n[i+1];o=t(u).is(":hidden")?null:u}return o}function a(e,n){var i=n.index(e);return i>0?t(n[i-1]):null}function d(t){t.click(),setTimeout((function(){t.focus()}),1)}function h(t){return t.map((function(){return this.value})).get().join("")}return t.fn.getCursorPosition=function(){var t=this.get(0);if(t){if("selectionStart"in t)return t.selectionStart;if(n.selection){t.focus();var e=n.selection.createRange(),i=n.selection.createRange().text.length;return e.moveStart("character",-t.value.length),e.text.length-i}}},t.fn.setCaretPosition=function(t){var e=this.get(0);if(null!=e)if(e.createTextRange){var n=e.createTextRange();n.move("character",t),n.select()}else e.selectionStart?(e.focus(),e.setSelectionRange(t,t)):e.focus()},"string"==typeof e?e&&u[e]?u[e].call(null,t(this)):(t.error("Method "+e+" does not exist in jQuery.letteringInput"),this):this.each((function(){r(t(this))}))}}(jQuery,window,document);