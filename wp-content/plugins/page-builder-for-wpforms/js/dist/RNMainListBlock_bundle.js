rndefine("#RNMainListBlock",["#RNMainCore/EventManager","#RNMainRNPage/RNBlockBase","#RNMainRNPage/RNBlockBase.Options","#RNMainRNPage/RNBlockBase.Model","#RNMainCoreUI/ModelBase","#RNMainRNPage/BlockContainer","#RNMainCore/StoreBase","#RNMainRNPage/RNRow.Options","#RNMainCoreUI/FontAwesomeIcon","react","react-dom"],(function(t,e,n,i,o,r,a,s,l,p,c){"use strict";var h,d,u;let f=(h=o.ModelSerialize("Rows"),d=class extends(r.BlockContainerMixin(i.RNBlockBaseModel)){constructor(t,e){super(t,e),babelHelpers.initializerDefineProperty(this,"_rows",u,this),this._rows=[];for(let t of this.Options.Rows)this._rows.push(this.CreateRow(t))}get IsFieldContainer(){return!0}Render(){return React.createElement(q,{Model:this})}GetRowArray(){return this._rows}},u=babelHelpers.applyDecoratedDescriptor(d.prototype,"_rows",[h],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),d);var m,g,y;let v=(m=a.StoreDataType(s.RNRowOptions),g=class extends n.RNBlockBaseOptions{constructor(...t){super(...t),babelHelpers.initializerDefineProperty(this,"Rows",y,this)}LoadDefaultValues(){super.LoadDefaultValues(),this.Type=n.BlockTypeEnum.List,this.Rows=[],this.ItemsPerPage=10}},y=babelHelpers.applyDecoratedDescriptor(g.prototype,"Rows",[m],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),g);var b,A=(function(t,e){Object.defineProperty(e,"__esModule",{value:!0});var n="plus-circle",i=[],o="f055",r="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z";e.definition={prefix:"fas",iconName:n,icon:[512,512,i,o,r]},e.faPlusCircle=e.definition,e.prefix="fas",e.iconName=n,e.width=512,e.height=512,e.ligatures=i,e.unicode=o,e.svgPathData=r}(b={exports:{}},b.exports),b.exports);const N=React,D=ReactDOM;function B(t){return t&&"object"==typeof t&&"default"in t?t.default:t}var C=B(N),P=B(D);function R(t){var e=!1;return function(){e||(console.warn(t),e=!0)}}var w=R("\n>> Warning, via react-flip-move <<\n\nWhen using \"wrapperless\" mode (by supplying 'typeName' of 'null'), strange things happen when the direct parent has the default \"static\" position.\n\nFlipMove has added 'position: relative' to this node, to ensure Flip Move animates correctly.\n\nTo avoid seeing this warning, simply apply a non-static position to that parent node.\n"),E=R("\n>> Warning, via react-flip-move <<\n\nOne or more of Flip Move's child elements have the html attribute 'disabled' set to true.\n\nPlease note that this will cause animations to break in Internet Explorer 11 and below. Either remove the disabled attribute or set 'animation' to false.\n"),O={elevator:{from:{transform:"scale(0)",opacity:"0"},to:{transform:"",opacity:""}},fade:{from:{opacity:"0"},to:{opacity:""}},accordionVertical:{from:{transform:"scaleY(0)",transformOrigin:"center top"},to:{transform:"",transformOrigin:"center top"}},accordionHorizontal:{from:{transform:"scaleX(0)",transformOrigin:"left center"},to:{transform:"",transformOrigin:"left center"}},none:null},k={elevator:{from:{transform:"scale(1)",opacity:"1"},to:{transform:"scale(0)",opacity:"0"}},fade:{from:{opacity:"1"},to:{opacity:"0"}},accordionVertical:{from:{transform:"scaleY(1)",transformOrigin:"center top"},to:{transform:"scaleY(0)",transformOrigin:"center top"}},accordionHorizontal:{from:{transform:"scaleX(1)",transformOrigin:"left center"},to:{transform:"scaleX(0)",transformOrigin:"left center"}},none:null},x=O,M="elevator",S=function(t,e){for(var n=0;n<e.length;n++)if(t(e[n],n,e))return e[n]},T=function(t){return(T=Array.isArray||function(t){return"[object Array]"===Object.prototype.toString.call(t)})(t)};var H=function(t){var e={};return function(n){return e[n]||(e[n]=t(n)),e[n]}}((function(t){return t.replace(/([A-Z])/g,"-$1").toLowerCase()})),F="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},L=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")},j=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(t[i]=n[i])}return t},z=function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)},I=function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e};function _(t){var e=t.domNode,n=t.styles;Object.keys(n).forEach((function(t){e.style.setProperty(H(t),n[t])}))}var V=function(t){var e=t.childDomNode,n={top:0,left:0,right:0,bottom:0,height:0,width:0},i=t.childBoundingBox||n,o=t.parentBoundingBox||n,r=(0,t.getPosition)(e),a=r.top-o.top,s=r.left-o.left;return[i.left-s,i.top-a]},W=function(t,e){var n=e.delay,i=e.duration,o=e.staggerDurationBy,r=e.staggerDelayBy,a=e.easing;n+=t*r,i+=t*o;return["transform","opacity"].map((function(t){return t+" "+i+"ms "+a+" "+n+"ms"})).join(", ")},G=function(){var t={transition:"transitionend","-o-transition":"oTransitionEnd","-moz-transition":"transitionend","-webkit-transition":"webkitTransitionEnd"};if("undefined"==typeof document)return"";var e=document.createElement("fakeelement"),n=S((function(t){return void 0!==e.style.getPropertyValue(t)}),Object.keys(t));return n?t[n]:""}(),X=!G;function K(t){return t.key||""}function U(t){return N.Children.toArray(t)}var Y=function(t){var e,n;return n=e=function(e){function n(){return L(this,n),I(this,e.apply(this,arguments))}return z(n,e),n.prototype.checkChildren=function(t){},n.prototype.convertProps=function(t){var e={children:t.children,easing:t.easing,onStart:t.onStart,onFinish:t.onFinish,onStartAll:t.onStartAll,onFinishAll:t.onFinishAll,typeName:t.typeName,disableAllAnimations:t.disableAllAnimations,getPosition:t.getPosition,maintainContainerHeight:t.maintainContainerHeight,verticalAlignment:t.verticalAlignment,duration:this.convertTimingProp("duration"),delay:this.convertTimingProp("delay"),staggerDurationBy:this.convertTimingProp("staggerDurationBy"),staggerDelayBy:this.convertTimingProp("staggerDelayBy"),appearAnimation:this.convertAnimationProp(t.appearAnimation,x),enterAnimation:this.convertAnimationProp(t.enterAnimation,O),leaveAnimation:this.convertAnimationProp(t.leaveAnimation,k),delegated:{}};this.checkChildren(e.children);var n=Object.keys(e),i=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[],n={};return Object.keys(t).forEach((function(i){-1===e.indexOf(i)&&(n[i]=t[i])})),n}(this.props,n);return i.style=j({position:"relative"},i.style),e.delegated=i,e},n.prototype.convertTimingProp=function(t){var e=this.props[t],i="number"==typeof e?e:parseInt(e,10);return isNaN(i)?n.defaultProps[t]:i},n.prototype.convertAnimationProp=function(t,e){switch(void 0===t?"undefined":F(t)){case"boolean":return e[t?M:"none"];case"string":return-1===Object.keys(e).indexOf(t)?e.elevator:e[t];default:return t}},n.prototype.render=function(){return C.createElement(t,this.convertProps(this.props))},n}(N.Component),e.defaultProps={easing:"ease-in-out",duration:350,delay:0,staggerDurationBy:0,staggerDelayBy:0,typeName:"div",enterAnimation:M,leaveAnimation:M,disableAllAnimations:!1,getPosition:function(t){return t.getBoundingClientRect()},maintainContainerHeight:!1,verticalAlignment:"top"},n}(function(t){function e(){var n,i;L(this,e);for(var o=arguments.length,r=Array(o),a=0;a<o;a++)r[a]=arguments[a];return n=i=I(this,t.call.apply(t,[this].concat(r))),i.state={children:U(i.props?i.props.children:[]).map((function(t){return j({},t,{element:t,appearing:!0})}))},i.childrenData={},i.parentData={domNode:null,boundingBox:null},i.heightPlaceholderData={domNode:null},i.remainingAnimations=0,i.childrenToAnimate=[],i.findDOMContainer=function(){var t=P.findDOMNode(i),e=t&&t.parentNode;e&&e instanceof HTMLElement&&("static"===window.getComputedStyle(e).position&&(e.style.position="relative",w()),i.parentData.domNode=e)},i.runAnimation=function(){var t=i.state.children.filter(i.doesChildNeedToBeAnimated),e=t.map((function(t){return i.computeInitialStyles(t)}));t.forEach((function(t,n){i.remainingAnimations+=1,i.childrenToAnimate.push(K(t)),i.animateChild(t,n,e[n])})),"function"==typeof i.props.onStartAll&&i.callChildrenHook(i.props.onStartAll)},i.doesChildNeedToBeAnimated=function(t){if(!K(t))return!1;var e=i.getChildData(K(t)),n=e.domNode,o=e.boundingBox,r=i.parentData.boundingBox;if(!n)return!1;var a=i.props,s=a.appearAnimation,l=a.enterAnimation,p=a.leaveAnimation,c=a.getPosition,h=t.appearing&&s,d=t.entering&&l,u=t.leaving&&p;if(h||d||u)return!0;var f=V({childDomNode:n,childBoundingBox:o,parentBoundingBox:r,getPosition:c}),m=f[0],g=f[1];return 0!==m||0!==g},I(i,n)}return z(e,t),e.prototype.componentDidMount=function(){null===this.props.typeName&&this.findDOMContainer(),this.props.appearAnimation&&!this.isAnimationDisabled(this.props)&&(this.prepForAnimation(),this.runAnimation())},e.prototype.componentWillReceiveProps=function(t){this.updateBoundingBoxCaches();var e=U(t.children);this.setState({children:this.isAnimationDisabled(t)?e.map((function(t){return j({},t,{element:t})})):this.calculateNextSetOfChildren(e)})},e.prototype.componentDidUpdate=function(t){null===this.props.typeName&&this.findDOMContainer(),!function(t,e){if(t===e)return!0;var n=!T(t)||!T(e),i=t.length!==e.length;return!n&&!i&&function(t,e){for(var n=0;n<e.length;n++)if(!t(e[n],n,e))return!1;return!0}((function(t,n){return t===e[n]}),t)}(U(this.props.children).map((function(t){return t.key})),U(t.children).map((function(t){return t.key})))&&!this.isAnimationDisabled(this.props)&&(this.prepForAnimation(),this.runAnimation())},e.prototype.calculateNextSetOfChildren=function(t){var e=this,n=t.map((function(t){var n=e.findChildByKey(t.key),i=!n||n.leaving;return j({},t,{element:t,entering:i})})),i=0;return this.state.children.forEach((function(o,r){if(!S((function(t){return t.key===K(o)}),t)&&e.props.leaveAnimation){var a=j({},o,{leaving:!0}),s=r+i;n.splice(s,0,a),i+=1}})),n},e.prototype.prepForAnimation=function(){var t=this,e=this.props,n=e.leaveAnimation,i=e.maintainContainerHeight,o=e.getPosition;n&&(this.state.children.filter((function(t){return t.leaving})).forEach((function(e){var n=t.getChildData(K(e));!t.isAnimationDisabled(t.props)&&n.domNode&&n.domNode.disabled&&E(),n.boundingBox&&function(t,e){var n=t.domNode,i=t.boundingBox;if(n&&i){var o=window.getComputedStyle(n),r=["margin-top","margin-left","margin-right"].reduce((function(t,e){var n,i=o.getPropertyValue(e);return j({},t,((n={})[e]=Number(i.replace("px","")),n))}),{});_({domNode:n,styles:{position:"absolute",top:("bottom"===e?i.top-i.height:i.top)-r["margin-top"]+"px",left:i.left-r["margin-left"]+"px",right:i.right-r["margin-right"]+"px"}})}}(n,t.props.verticalAlignment)})),i&&this.heightPlaceholderData.domNode&&function(t){var e=t.domNode,n=t.parentData,i=t.getPosition,o=n.domNode,r=n.boundingBox;if(o&&r){_({domNode:e,styles:{height:"0"}});var a=r.height-i(o).height;_({domNode:e,styles:{height:a>0?a+"px":"0"}})}}({domNode:this.heightPlaceholderData.domNode,parentData:this.parentData,getPosition:o}));this.state.children.forEach((function(e){var n=t.getChildData(K(e)).domNode;n&&(e.entering||e.leaving||_({domNode:n,styles:{transition:""}}))}))},e.prototype.animateChild=function(t,e,n){var i=this,o=this.getChildData(K(t)).domNode;o&&(_({domNode:o,styles:n}),this.props.onStart&&this.props.onStart(t,o),requestAnimationFrame((function(){requestAnimationFrame((function(){var n={transition:W(e,i.props),transform:"",opacity:""};t.appearing&&i.props.appearAnimation?n=j({},n,i.props.appearAnimation.to):t.entering&&i.props.enterAnimation?n=j({},n,i.props.enterAnimation.to):t.leaving&&i.props.leaveAnimation&&(n=j({},n,i.props.leaveAnimation.to)),_({domNode:o,styles:n})}))})),this.bindTransitionEndHandler(t))},e.prototype.bindTransitionEndHandler=function(t){var e=this,n=this.getChildData(K(t)).domNode;if(n){n.addEventListener(G,(function i(o){o.target===n&&(n.style.transition="",e.triggerFinishHooks(t,n),n.removeEventListener(G,i),t.leaving&&e.removeChildData(K(t)))}))}},e.prototype.triggerFinishHooks=function(t,e){var n=this;if(this.props.onFinish&&this.props.onFinish(t,e),this.remainingAnimations-=1,0===this.remainingAnimations){var i=this.state.children.filter((function(t){return!t.leaving})).map((function(t){return j({},t,{element:t.element,appearing:!1,entering:!1})}));this.setState({children:i},(function(){"function"==typeof n.props.onFinishAll&&n.callChildrenHook(n.props.onFinishAll),n.childrenToAnimate=[]})),this.heightPlaceholderData.domNode&&(this.heightPlaceholderData.domNode.style.height="0")}},e.prototype.callChildrenHook=function(t){var e=this,n=[],i=[];this.childrenToAnimate.forEach((function(t){var o=e.findChildByKey(t);o&&(n.push(o),e.hasChildData(t)&&i.push(e.getChildData(t).domNode))})),t(n,i)},e.prototype.updateBoundingBoxCaches=function(){var t=this,e=this.parentData.domNode;if(e){this.parentData.boundingBox=this.props.getPosition(e);var n=[];this.state.children.forEach((function(i){var o=K(i);if(o)if(t.hasChildData(o)){var r=t.getChildData(o);r.domNode&&i?n.push(function(t){var e=t.childDomNode,n=t.parentDomNode,i=t.getPosition,o=i(n),r=i(e),a=r.top,s=r.left,l=r.right,p=r.bottom,c=r.width,h=r.height;return{top:a-o.top,left:s-o.left,right:o.right-l,bottom:o.bottom-p,width:c,height:h}}({childDomNode:r.domNode,parentDomNode:e,getPosition:t.props.getPosition})):n.push(null)}else n.push(null);else n.push(null)})),this.state.children.forEach((function(e,i){var o=K(e),r=n[i];o&&t.setChildData(o,{boundingBox:r})}))}},e.prototype.computeInitialStyles=function(t){if(t.appearing)return this.props.appearAnimation?this.props.appearAnimation.from:{};if(t.entering)return this.props.enterAnimation?j({position:"",top:"",left:"",right:"",bottom:""},this.props.enterAnimation.from):{};if(t.leaving)return this.props.leaveAnimation?this.props.leaveAnimation.from:{};var e=this.getChildData(K(t)),n=e.domNode,i=e.boundingBox,o=this.parentData.boundingBox;if(!n)return{};var r=V({childDomNode:n,childBoundingBox:i,parentBoundingBox:o,getPosition:this.props.getPosition});return{transform:"translate("+r[0]+"px, "+r[1]+"px)"}},e.prototype.isAnimationDisabled=function(t){return X||t.disableAllAnimations||0===t.duration&&0===t.delay&&0===t.staggerDurationBy&&0===t.staggerDelayBy},e.prototype.findChildByKey=function(t){return S((function(e){return K(e)===t}),this.state.children)},e.prototype.hasChildData=function(t){return Object.prototype.hasOwnProperty.call(this.childrenData,t)},e.prototype.getChildData=function(t){return this.hasChildData(t)?this.childrenData[t]:{}},e.prototype.setChildData=function(t,e){this.childrenData[t]=j({},this.getChildData(t),e)},e.prototype.removeChildData=function(t){delete this.childrenData[t],this.setState((function(e){return j({},e,{children:e.children.filter((function(e){return e.element.key!==t}))})}))},e.prototype.createHeightPlaceholder=function(){var t=this,e=this.props.typeName,n="ul"===e||"ol"===e?"li":"div";return N.createElement(n,{key:"height-placeholder",ref:function(e){t.heightPlaceholderData.domNode=e},style:{visibility:"hidden",height:0}})},e.prototype.childrenWithRefs=function(){var t=this;return this.state.children.map((function(e){return N.cloneElement(e.element,{ref:function(n){if(n){var i=function(t){if("undefined"==typeof HTMLElement)return null;if(t instanceof HTMLElement)return t;var e=D.findDOMNode(t);return e&&e.nodeType===Node.TEXT_NODE?null:e}(n);t.setChildData(K(e),{domNode:i}),null!=e.ref&&e.ref(n)}}})}))},e.prototype.render=function(){var t=this,e=this.props,n=e.typeName,i=e.delegated,o=e.leaveAnimation,r=e.maintainContainerHeight,a=this.childrenWithRefs();if(o&&r&&a.push(this.createHeightPlaceholder()),!n)return a;var s=j({},i,{children:a,ref:function(e){t.parentData.domNode=e}});return N.createElement(n,s)},e}(N.Component));class q extends e.RNBlockBase{constructor(t){super(t),this.state={},this.DragCounter=0}SubRender(){let t=this.Model;return React.createElement("div",null,this.Model.Rows.length>0&&React.createElement("div",{style:{textAlign:"center"},onClick:()=>t.AddNewBlock()},React.createElement(l.FontAwesomeIcon,{icon:A.faPlusCircle,className:"rnAddButtonList",style:{fontSize:20}})),React.createElement("div",{onDragEnd:t=>this.DragEnter(t)},React.createElement("div",null,this.Model.Rows.map((t=>React.createElement(Y,null,t.Render()))))),React.createElement("div",{style:{textAlign:"center"},onClick:()=>t.AddNewBlock(null,this.Model.Rows.length,0,!0)},React.createElement(l.FontAwesomeIcon,{icon:A.faPlusCircle,className:"rnAddButtonList",style:{fontSize:20}})))}DragEnter(t){t.preventDefault(),t.stopPropagation(),this.DragCounter++,this.setState({IsHovering:!0})}}q.defaultProps={},t.EventManager.Subscribe("GetBlock",(t=>{if(t.Model.Options.Type==n.BlockTypeEnum.List)return React.createElement(q,null)})),t.EventManager.Subscribe("GetBlockModel",(t=>{if(t.Options.Type==n.BlockTypeEnum.List)return new f(t.Options,t.Parent)})),t.EventManager.Subscribe("GetBlockOptions",(t=>{if(t.Name==n.BlockTypeEnum.List)return new v})),exports.ListBlock=q,exports.ListBlockModel=f,exports.ListBlockOptions=v}));
