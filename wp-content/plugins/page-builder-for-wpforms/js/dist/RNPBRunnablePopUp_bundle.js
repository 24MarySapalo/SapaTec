rndefine("#RNPBRunnablePopUp",["#RNPBRunnablePage/RunnableBlockBase","#RNPBCore/EventManager","#RNPBDialog/DialogBase","lit","lit/decorators","#RNPBDialog/Dialog"],(function(e,t,n,o,i,l){"use strict";i.customElement("rn-popup")(class extends n.DialogBase{InternalGetOptions(){return{ShowApplyButton:!1,ShowCloseButton:!1,HideFooter:!0,HideHeader:!0,Styles:{width:"800px",maxWidth:"80%"}}}SubRender(){return this.content.style.display="block",o.html`<div> ${this.content} </div>`}});class a extends e.RunnableBlockBase{constructor(...e){super(...e),this.Fields=[],this.PopUp=null}async Initialize(){await super.Initialize(),this.Container.querySelector("a").addEventListener("click",(()=>{null==this.PopUp&&(this.PopUp=this.Container.querySelector(".popupcontainer")),l.Dialog.Show(o.html`<rn-popup .content="${this.PopUp}"></rn-popup>`)}))}}t.EventManager.Subscribe("GetRunnable",(e=>"Popup"==e.Type?new a(e):null)),exports.RunnablePopUp=a}));
