rndefine("#RNPBImageBlock",["#RNPBRNPage/RNBlockBase.Model","lit","#RNPBCore/StoreBase","#RNPBPageBuilder/BlockBase.Options","#RNPBRNPage/RNBlockBase","#RNPBCore/EventManager","#RNPBRNPage/RNBlockBase.Options","lit/decorators","#RNPBLit/Lit"],(function(e,l,t,a,r,o,s,i,n){"use strict";class c extends e.RNBlockBaseModel{constructor(e,l){super(e,l)}Render(){return l.html`<rnwppages-image-block .model="${this}"></rnwppages-image-block>`}}var p,B,m;let u=(p=t.StoreDataType(Object),B=class extends a.BlockBaseOptions{constructor(...e){super(...e),babelHelpers.initializerDefineProperty(this,"Src",m,this)}LoadDefaultValues(){super.LoadDefaultValues(),this.Src=null,this.Type=a.BlockTypeEnum.Image,this.Label="Image"}},m=babelHelpers.applyDecoratedDescriptor(B.prototype,"Src",[p],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),B);var g;let d=i.customElement("rnwppages-image-block")(g=class extends r.RNBlockBase{SubRender(){return l.html` <div> ${n.rnIf(""!=this.model.Options.Label.trim()&&l.html`<label class=${"rnBlockLabel"}>${this.model.Options.Label}</label>`)} <div> <img src=${null==this.model.Options.Src?rnBuilderVar.PluginURL+"images/temporalImage.png":this.model.Options.Src.URL}/> </div> </div> `}})||g;o.EventManager.Subscribe("GetBlockModel",(e=>{if(e.Options.Type==s.BlockTypeEnum.Image)return new c(e.Options,e.Parent)})),o.EventManager.Subscribe("GetBlockOptions",(e=>{if(e.Name==s.BlockTypeEnum.Image)return new u})),exports.ImageBlock=d,exports.ImageBlockModel=c,exports.ImageBlockOptions=u}));