rndefine("#RNPBFormFieldBlock",["#RNPBRNPage/RNBlockWithDataSource.Model","lit","#RNPBCore/StoreBase","#RNPBPageBuilder/BlockBase.Options","#RNPBRNPage/RNBlockBase","#RNPBCore/EventManager","#RNPBRNPage/RNBlockBase.Options","lit/decorators","#RNPBLit/Lit"],(function(e,t,l,i,o,s,r,a,n){"use strict";class d extends e.RNBlockWithDataSourceModel{constructor(e,t){super(e,t)}Render(){return this.Options.HideWhenEmpty&&this.DataSource.IsEmpty(this.Options.FieldId)?null:t.html`<rnwppages-form-field-block .model="${this}"></rnwppages-form-field-block>`}}var p,u,c;let m=(p=l.StoreDataType(String),u=class extends i.BlockBaseOptions{constructor(...e){super(...e),babelHelpers.initializerDefineProperty(this,"FieldId",c,this)}LoadDefaultValues(){super.LoadDefaultValues(),this.Type=i.BlockTypeEnum.FormField,this.LabelType="sameasfield",this.FieldId="",this.DataSourceId=0,this.Label="",this.HideWhenEmpty=!1,this.FieldStyle="text",this.LabelPosition="Top"}},c=babelHelpers.applyDecoratedDescriptor(u.prototype,"FieldId",[p],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),u);var h;let B=a.customElement("rnwppages-form-field-block")(h=class extends o.RNBlockBase{SubRender(){let e=this.GetLabel();return t.html` <div class=${"position"+this.model.Options.LabelPosition}> ${n.rnIf(""!=e&&t.html` <label class='rnBlockLabel'>${e}</label> `)} ${this.GetValue()} </div> `}GetLabel(){var e,t;return"sameasfield"==this.model.Options.LabelType?null!==(e=null===(t=this.model.DataSource)||void 0===t?void 0:t.GetColumnLabel(this.model.Options.FieldId))&&void 0!==e?e:"":this.model.Options.Label}GetValue(){var e,l,i;if("similar"==this.model.Options.FieldStyle)return null===(i=this.model.DataSource.GetSimilarInput(this.model,this.model.Options.FieldId))||void 0===i?void 0:i.Render();let o=(null===(e=this.model.DataSource)||void 0===e?void 0:e.GetStringValue(this.model.Options.FieldId)).split(/\r?\n/g);if(o.length>1){let e=[];for(let l of o)l.length>0&&e.push(l),e.push(t.html`<br/>`);return t.html`<p>${e}</p>`}return t.html`<p>${null===(l=this.model.DataSource)||void 0===l?void 0:l.GetStringValue(this.model.Options.FieldId)}</p>`}})||h;s.EventManager.Subscribe("GetBlockModel",(e=>{if(e.Options.Type==r.BlockTypeEnum.FormField)return new d(e.Options,e.Parent)})),s.EventManager.Subscribe("GetBlockOptions",(e=>{if(e.Name==r.BlockTypeEnum.FormField)return new m})),exports.FormFieldBlockModel=d,exports.FormFieldBlockOptions=m,exports.FormFieldBlock=B}));