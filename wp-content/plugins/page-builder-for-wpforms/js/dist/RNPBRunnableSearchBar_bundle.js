rndefine("#RNPBRunnableSearchBar",["#RNPBRunnablePage/RunnableBlockBase","#RNPBCore/EventManager"],(function(e,t){"use strict";class n extends e.RunnableBlockBase{constructor(...e){super(...e),this.Fields=[]}async Initialize(){await super.Initialize(),this.Fields=this.Options.Fields;let e=this.Container.querySelector(".searchButton");e.removeAttribute("disabled"),e.addEventListener("click",(e=>{e.preventDefault();let t=[];for(let e of this.Fields){let n="",a=this.Container.querySelector('[data-search-field-id="'+e.Id+'"]');null!=a&&(n=a.value),t[this.Options.Id+"_"+e.Id]=n}t.i="",this.PageGenerator.Submit(t)}))}}t.EventManager.Subscribe("GetRunnable",(e=>"SearchBar"==e.Type?new n(e):null)),exports.RunnableSearchBar=n}));
