rndefine("#RNPBDialog",["lit","#RNPBCore/LitElementBase","#RNPBLit/Lit","lit/decorators"],(function(e,t,i,o){"use strict";const n=(()=>{const e=["a[href]","area[href]",'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',"select:not([disabled]):not([aria-hidden])","textarea:not([disabled]):not([aria-hidden])","button:not([disabled]):not([aria-hidden])","iframe","object","embed","[contenteditable]",'[tabindex]:not([tabindex^="-"])'];class t{constructor({targetModal:e,triggers:t=[],onShow:i=(()=>{}),onClose:o=(()=>{}),openTrigger:n="data-micromodal-trigger",closeTrigger:s="data-micromodal-close",openClass:l="is-open",disableScroll:a=!1,disableFocus:r=!1,awaitCloseAnimation:c=!1,awaitOpenAnimation:d=!1,debugMode:h=!1}){this.modal=e,this.config={debugMode:h,disableScroll:a,openTrigger:n,closeTrigger:s,openClass:l,onShow:i,onClose:o,awaitCloseAnimation:c,awaitOpenAnimation:d,disableFocus:r},t.length>0&&this.registerTriggers(...t),this.onClick=this.onClick.bind(this),this.onKeydown=this.onKeydown.bind(this)}registerTriggers(...e){e.filter(Boolean).forEach((e=>{e.addEventListener("click",(e=>this.showModal(e)))}))}showModal(e=null){if(this.activeElement=document.activeElement,this.modal.setAttribute("aria-hidden","false"),this.modal.classList.add(this.config.openClass),this.scrollBehaviour("disable"),this.addEventListeners(),this.config.awaitOpenAnimation){const e=()=>{this.modal.removeEventListener("animationend",e,!1),this.setFocusToFirstNode()};this.modal.addEventListener("animationend",e,!1)}else this.setFocusToFirstNode();this.config.onShow(this.modal,this.activeElement,e)}closeModal(e=null){const t=this.modal;if(this.modal.remove(),this.modal.setAttribute("aria-hidden","true"),this.removeEventListeners(),this.scrollBehaviour("enable"),this.activeElement&&this.activeElement.focus&&this.activeElement.focus(),this.config.onClose(this.modal,this.activeElement,e),this.config.awaitCloseAnimation){let e=this.config.openClass;this.modal.addEventListener("animationend",(function i(){t.classList.remove(e),t.removeEventListener("animationend",i,!1)}),!1)}else t.classList.remove(this.config.openClass)}closeModalById(e){this.modal&&this.closeModal()}scrollBehaviour(e){if(!this.config.disableScroll)return;const t=document.querySelector("body");switch(e){case"enable":Object.assign(t.style,{overflow:""});break;case"disable":Object.assign(t.style,{overflow:"hidden"})}}addEventListeners(){this.modal.addEventListener("touchstart",this.onClick),this.modal.addEventListener("click",this.onClick),document.addEventListener("keydown",this.onKeydown)}removeEventListeners(){this.modal.removeEventListener("touchstart",this.onClick),this.modal.removeEventListener("click",this.onClick),document.removeEventListener("keydown",this.onKeydown)}onClick(e){e.target.hasAttribute(this.config.closeTrigger)&&this.modal.CloseWhenClickedOutside()&&this.closeModal(e)}onKeydown(e){27===e.keyCode&&this.closeModal(e),9===e.keyCode&&this.retainFocus(e)}getFocusableNodes(){const t=this.modal.querySelectorAll(e);return Array(...t)}setFocusToFirstNode(){if(this.config.disableFocus)return;const e=this.getFocusableNodes();if(0===e.length)return;const t=e.filter((e=>!e.hasAttribute(this.config.closeTrigger)));t.length>0&&t[0].focus(),0===t.length&&e[0].focus()}retainFocus(e){let t=this.getFocusableNodes();if(0!==t.length)if(t=t.filter((e=>null!==e.offsetParent)),this.modal.contains(document.activeElement)){const i=t.indexOf(document.activeElement);e.shiftKey&&0===i&&(t[t.length-1].focus(),e.preventDefault()),!e.shiftKey&&t.length>0&&i===t.length-1&&(t[0].focus(),e.preventDefault())}else t[0].focus()}}let i=null;const o=e=>{if(!document.getElementById(e))return console.warn(`MicroModal: ❗Seems like you have missed %c'${e}'`,"background-color: #f8f9fa;color: #50596c;font-weight: bold;","ID somewhere in your code. Refer example below to resolve it."),console.warn("%cExample:","background-color: #f8f9fa;color: #50596c;font-weight: bold;",`<div class="modal" id="${e}"></div>`),!1},n=(e,t)=>{if((e=>{if(e.length<=0)console.warn("MicroModal: ❗Please specify at least one %c'micromodal-trigger'","background-color: #f8f9fa;color: #50596c;font-weight: bold;","data attribute."),console.warn("%cExample:","background-color: #f8f9fa;color: #50596c;font-weight: bold;",'<a href="#" data-micromodal-trigger="my-modal"></a>')})(e),!t)return!0;for(var i in t)o(i);return!0};return{init:e=>{const o=Object.assign({},{openTrigger:"data-micromodal-trigger"},e),s=[...document.querySelectorAll(`[${o.openTrigger}]`)],l=((e,t)=>{const i=[];return e.forEach((e=>{const o=e.attributes[t].value;void 0===i[o]&&(i[o]=[]),i[o].push(e)})),i})(s,o.openTrigger);if(!0!==o.debugMode||!1!==n(s,l))for(var a in l){let e=l[a];o.targetModal=a,o.triggers=[...e],i=new t(o)}},show:(e,n)=>{const s=n||{};s.targetModal=e,!0===s.debugMode&&!1===o(e)||(i&&i.removeEventListeners(),i=new t(s),e.ModalInstance=i,i.showModal())},close:e=>{e?i.closeModalById(e):i.closeModal()}}})();var s={},l={};!function(e){Object.defineProperty(e,"__esModule",{value:!0});var t="xmark",i=[128473,10005,10006,10060,215,"close","multiply","remove","times"],o="f00d",n="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z";e.definition={prefix:"fas",iconName:t,icon:[320,512,i,o,n]},e.faXmark=e.definition,e.prefix="fas",e.iconName=t,e.width=320,e.height=512,e.ligatures=i,e.unicode=o,e.svgPathData=n,e.aliases=i}(l),function(e){Object.defineProperty(e,"__esModule",{value:!0});var t=l;e.definition={prefix:t.prefix,iconName:t.iconName,icon:[t.width,t.height,t.aliases,t.unicode,t.svgPathData]},e.faTimes=e.definition,e.prefix=t.prefix,e.iconName=t.iconName,e.width=t.width,e.height=t.height,e.ligatures=t.aliases,e.unicode=t.unicode,e.svgPathData=t.svgPathData,e.aliases=t.aliases}(s);var a,r,c,d,h,u,p,f={};function m(e,t){var i=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),i.push.apply(i,o)}return i}function g(e){for(var t=1;t<arguments.length;t++){var i=null!=arguments[t]?arguments[t]:{};t%2?m(Object(i),!0).forEach((function(t){babelHelpers.defineProperty(e,t,i[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(i)):m(Object(i)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(i,t))}))}return e}!function(e){Object.defineProperty(e,"__esModule",{value:!0});var t="check",i=[10003,10004],o="f00c",n="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z";e.definition={prefix:"fas",iconName:t,icon:[512,512,i,o,n]},e.faCheck=e.definition,e.prefix="fas",e.iconName=t,e.width=512,e.height=512,e.ligatures=i,e.unicode=o,e.svgPathData=n,e.aliases=i}(f);let b=(a=o.query("footer"),r=o.query("header"),c=o.query("main"),d=class extends t.LitElementBase{static get properties(){return{applyIsBusy:{type:Boolean}}}constructor(){super(),this.DialogResult=null,this.applyIsBusy=!1,babelHelpers.initializerDefineProperty(this,"footer",h,this),babelHelpers.initializerDefineProperty(this,"header",u,this),babelHelpers.initializerDefineProperty(this,"main",p,this),this.Resized=this.Resized.bind(this)}SendResult(e){this.DialogResult=e,this.Close()}GetOptions(){return g({Title:"",TitleIcon:null,Styles:null,HideHeader:!1,HideFooter:!1,CloseButtonTitle:"Close",CloseButtonIcon:s.faTimes,ShowCloseButton:!0,ShowApplyButton:!1,ApplyButtonTitle:"Apply",ApplyButtonIcon:f.faCheck},this.InternalGetOptions())}GetParentClasses(){return"modal micromodal-slide"}GetParentStyles(){return{zIndex:"10000000000"}}CloseWhenClickedOutside(){return!0}connectedCallback(){super.connectedCallback(),window.addEventListener("resize",this.Resized)}disconnectedCallback(){super.disconnectedCallback(),window.removeEventListener("resize",this.Resized)}render(){let t=this.GetOptions();return e.html` <div class="modal__overlay rednao" tabindex="-1" data-micromodal-close> <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title" style="${e.rnsg(g({},this.GetOptions().Styles))}"> ${i.rnIf(!this.GetOptions().HideHeader&&e.html` <header class="modal__header" style="display: flex;align-items: center;padding:16px;border-bottom: 1px solid #e9ecef;"> <h2 class="modal__title" id="modal-1-title" style="display: flex;align-items: center"> ${i.rnIf(null!=t.TitleIcon&&e.html`<rn-fontawesome style="margin-right: 3px" .icon="${t.TitleIcon}"></rn-fontawesome>`)} ${t.Title} </h2> <button class="modal__close" aria-label="Close modal" style="display: flex;align-items: center;"> <rn-fontawesome @click="${e=>this.Cancel()}" .icon="${s.faTimes}" style="font-size: 18px;top:7px;right: 7px;"></rn-fontawesome> </button> </header> `)} <main class="modal__content" id="modal-1-content" style="padding:16px;overflow: auto;margin: 0;margin-top: ${t.HideHeader?0:10}px;max-height: ${this.CalculateMaxHeight()}"> ${this.SubRender()} </main> ${i.rnIf(!this.GetOptions().HideFooter&&e.html` <footer style="margin-top: 15px;display: flex;align-items: center;justify-content: flex-end;padding: 16px;border-top: 1px solid #e9ecef;" > ${i.rnIf(t.ShowCloseButton&&e.html` <button @click=${e=>this.Cancel()} class="rnbtn rnbtn-danger" style="display: flex;align-items: center"> <rn-fontawesome .icon=${t.CloseButtonIcon} style="margin-right: 3px"></rn-fontawesome> ${t.CloseButtonTitle} </button> `)} ${i.rnIf(t.ShowApplyButton&&e.html` <rn-spinner-button .label="${t.ApplyButtonTitle}" .icon="${t.ApplyButtonIcon}" .isBusy="${this.applyIsBusy}" @click="${e=>this.Apply()}" style="display: flex;align-items: center;margin-left: 5px"> </rn-spinner-button> `)} </footer> `)} </div> </div> `}OnClose(){return!0}OnCancel(){return!0}Cancel(){this.OnCancel()&&this.Close()}Close(){this.OnClose()&&this.ModalInstance.closeModal()}CalculateMaxHeight(){let e=0;return null!=this.footer&&(e+=this.footer.getBoundingClientRect().height),null!=this.header&&(e+=this.header.getBoundingClientRect().height),.8*(window.innerHeight-e)+"px"}firstUpdated(e){null!=this.main&&(this.main.style.maxHeight=this.CalculateMaxHeight()),super.firstUpdated(e)}Resized(){this.requestUpdate()}async OnApply(){return!0}async Apply(){this.applyIsBusy=!0;let e=await this.OnApply();this.applyIsBusy=!1,e&&this.Close()}},h=babelHelpers.applyDecoratedDescriptor(d.prototype,"footer",[a],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),u=babelHelpers.applyDecoratedDescriptor(d.prototype,"header",[r],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),p=babelHelpers.applyDecoratedDescriptor(d.prototype,"main",[c],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),d);exports.Dialog=class{static async Show(t){return new Promise((i=>{let o=e.renderInline(t);o.setAttribute("aria-hidden","false"),document.body.appendChild(o),n.show(o,{onClose:()=>i(o.DialogResult)})}))}},exports.DialogBase=b,exports.MicroModal=n}));
