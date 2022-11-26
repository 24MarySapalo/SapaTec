rndefine("#RNMainCalendarBlock",["#RNMainRNPage/RNBlockBase","#RNMainCore/EventManager","#RNMainRNPage/RNBlockBase.Options","#RNMainRNPage/RNBlockBase.Model","#RNMainCore/StoreBase"],(function(e,t,a,l,n){"use strict";class o extends l.RNBlockBaseModel{constructor(e,t){super(e,t)}Render(){return React.createElement(u,{Model:this})}}var i,r,s,d,p;let c=(i=n.StoreDataType(Object),r=n.StoreDataType(Object),s=class extends a.RNBlockBaseOptions{constructor(...e){super(...e),babelHelpers.initializerDefineProperty(this,"ItemLabel",d,this),babelHelpers.initializerDefineProperty(this,"Tooltip",p,this)}LoadDefaultValues(){super.LoadDefaultValues(),this.Label="Calendar",this.Type=a.BlockTypeEnum.Calendar,this.StartDateField="__date",this.EndDateField="__date",this.Mode="month",this.ItemLabel=null,this.Tooltip=null}},d=babelHelpers.applyDecoratedDescriptor(s.prototype,"ItemLabel",[i],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),p=babelHelpers.applyDecoratedDescriptor(s.prototype,"Tooltip",[r],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),s);class u extends e.RNBlockBase{constructor(e){super(e),this.Mode=this.props.Model.Options.Mode,this.ContainerRendered=this.ContainerRendered.bind(this)}ContainerRendered(e){this.Node=e,this.Calendar=new tui.Calendar(e,{defaultView:this.Model.Options.Mode,taskView:!1})}componentDidUpdate(e,t,a){this.Mode!=this.props.Model.Options.Mode&&null!=this.Node&&(this.Mode=this.props.Model.Options.Mode,null!=this.Calendar&&this.Calendar.destroy(),this.Calendar=new tui.Calendar(this.Node,{defaultView:this.Model.Options.Mode,taskView:!1}))}SubRender(){return React.createElement("div",null,""!=this.Model.Options.Label.trim()&&React.createElement("label",{className:"rnBlockLabel"},this.Model.Options.Label),React.createElement("div",{ref:this.ContainerRendered,style:{border:"1px solid #dfdfdf",borderTop:"none"}}))}}u.defaultProps={},t.EventManager.Subscribe("GetBlock",(e=>{if(e.Model.Options.Type==a.BlockTypeEnum.Text)return React.createElement(u,null)})),t.EventManager.Subscribe("GetBlockModel",(e=>{if(e.Options.Type==a.BlockTypeEnum.Calendar)return new o(e.Options,e.Parent)})),t.EventManager.Subscribe("GetBlockOptions",(e=>{if(e.Name==a.BlockTypeEnum.Calendar)return new c})),exports.CalendarBlock=u,exports.CalendarBlockModel=o,exports.CalendarBlockOptions=c}));