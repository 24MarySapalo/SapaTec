rndefine("#RNPBCalendarDomProcessor",["exports","#RNPBCore/EventManager","#RNPBRunnablePage/RunnablePage","#RNPBCore/WpAjaxPost"],(function(e,t,n,r){"use strict";var i="top",o="bottom",a="right",s="left",c="auto",u=[i,o,a,s],p="start",f="end",d="viewport",l="popper",m=u.reduce((function(e,t){return e.concat([t+"-"+p,t+"-"+f])}),[]),v=[].concat(u,[c]).reduce((function(e,t){return e.concat([t,t+"-"+p,t+"-"+f])}),[]),h=["beforeRead","read","afterRead","beforeMain","main","afterMain","beforeWrite","write","afterWrite"];function g(e){return e?(e.nodeName||"").toLowerCase():null}function y(e){if(null==e)return window;if("[object Window]"!==e.toString()){var t=e.ownerDocument;return t&&t.defaultView||window}return e}function b(e){return e instanceof y(e).Element||e instanceof Element}function w(e){return e instanceof y(e).HTMLElement||e instanceof HTMLElement}function x(e){return"undefined"!=typeof ShadowRoot&&(e instanceof y(e).ShadowRoot||e instanceof ShadowRoot)}var O={name:"applyStyles",enabled:!0,phase:"write",fn:function(e){var t=e.state;Object.keys(t.elements).forEach((function(e){var n=t.styles[e]||{},r=t.attributes[e]||{},i=t.elements[e];w(i)&&g(i)&&(Object.assign(i.style,n),Object.keys(r).forEach((function(e){var t=r[e];!1===t?i.removeAttribute(e):i.setAttribute(e,!0===t?"":t)})))}))},effect:function(e){var t=e.state,n={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,n.popper),t.styles=n,t.elements.arrow&&Object.assign(t.elements.arrow.style,n.arrow),function(){Object.keys(t.elements).forEach((function(e){var r=t.elements[e],i=t.attributes[e]||{},o=Object.keys(t.styles.hasOwnProperty(e)?t.styles[e]:n[e]).reduce((function(e,t){return e[t]="",e}),{});w(r)&&g(r)&&(Object.assign(r.style,o),Object.keys(i).forEach((function(e){r.removeAttribute(e)})))}))}},requires:["computeStyles"]};function E(e){return e.split("-")[0]}var A=Math.max,T=Math.min,D=Math.round;function j(){var e=navigator.userAgentData;return null!=e&&e.brands?e.brands.map((function(e){return e.brand+"/"+e.version})).join(" "):navigator.userAgent}function L(){return!/^((?!chrome|android).)*safari/i.test(j())}function P(e,t,n){void 0===t&&(t=!1),void 0===n&&(n=!1);var r=e.getBoundingClientRect(),i=1,o=1;t&&w(e)&&(i=e.offsetWidth>0&&D(r.width)/e.offsetWidth||1,o=e.offsetHeight>0&&D(r.height)/e.offsetHeight||1);var a=(b(e)?y(e):window).visualViewport,s=!L()&&n,c=(r.left+(s&&a?a.offsetLeft:0))/i,u=(r.top+(s&&a?a.offsetTop:0))/o,p=r.width/i,f=r.height/o;return{width:p,height:f,top:u,right:c+p,bottom:u+f,left:c,x:c,y:u}}function C(e){var t=P(e),n=e.offsetWidth,r=e.offsetHeight;return Math.abs(t.width-n)<=1&&(n=t.width),Math.abs(t.height-r)<=1&&(r=t.height),{x:e.offsetLeft,y:e.offsetTop,width:n,height:r}}function k(e,t){var n=t.getRootNode&&t.getRootNode();if(e.contains(t))return!0;if(n&&x(n)){var r=t;do{if(r&&e.isSameNode(r))return!0;r=r.parentNode||r.host}while(r)}return!1}function M(e){return y(e).getComputedStyle(e)}function R(e){return["table","td","th"].indexOf(g(e))>=0}function S(e){return((b(e)?e.ownerDocument:e.document)||window.document).documentElement}function W(e){return"html"===g(e)?e:e.assignedSlot||e.parentNode||(x(e)?e.host:null)||S(e)}function B(e){return w(e)&&"fixed"!==M(e).position?e.offsetParent:null}function V(e){for(var t=y(e),n=B(e);n&&R(n)&&"static"===M(n).position;)n=B(n);return n&&("html"===g(n)||"body"===g(n)&&"static"===M(n).position)?t:n||function(e){var t=/firefox/i.test(j());if(/Trident/i.test(j())&&w(e)&&"fixed"===M(e).position)return null;var n=W(e);for(x(n)&&(n=n.host);w(n)&&["html","body"].indexOf(g(n))<0;){var r=M(n);if("none"!==r.transform||"none"!==r.perspective||"paint"===r.contain||-1!==["transform","perspective"].indexOf(r.willChange)||t&&"filter"===r.willChange||t&&r.filter&&"none"!==r.filter)return n;n=n.parentNode}return null}(e)||t}function H(e){return["top","bottom"].indexOf(e)>=0?"x":"y"}function N(e,t,n){return A(e,T(t,n))}function I(e){return Object.assign({},{top:0,right:0,bottom:0,left:0},e)}function _(e,t){return t.reduce((function(t,n){return t[n]=e,t}),{})}var q={name:"arrow",enabled:!0,phase:"main",fn:function(e){var t,n=e.state,r=e.name,c=e.options,p=n.elements.arrow,f=n.modifiersData.popperOffsets,d=E(n.placement),l=H(d),m=[s,a].indexOf(d)>=0?"height":"width";if(p&&f){var v=function(e,t){return I("number"!=typeof(e="function"==typeof e?e(Object.assign({},t.rects,{placement:t.placement})):e)?e:_(e,u))}(c.padding,n),h=C(p),g="y"===l?i:s,y="y"===l?o:a,b=n.rects.reference[m]+n.rects.reference[l]-f[l]-n.rects.popper[m],w=f[l]-n.rects.reference[l],x=V(p),O=x?"y"===l?x.clientHeight||0:x.clientWidth||0:0,A=b/2-w/2,T=v[g],D=O-h[m]-v[y],j=O/2-h[m]/2+A,L=N(T,j,D),P=l;n.modifiersData[r]=((t={})[P]=L,t.centerOffset=L-j,t)}},effect:function(e){var t=e.state,n=e.options.element,r=void 0===n?"[data-popper-arrow]":n;null!=r&&("string"!=typeof r||(r=t.elements.popper.querySelector(r)))&&k(t.elements.popper,r)&&(t.elements.arrow=r)},requires:["popperOffsets"],requiresIfExists:["preventOverflow"]};function U(e){return e.split("-")[1]}var F={top:"auto",right:"auto",bottom:"auto",left:"auto"};function z(e){var t,n=e.popper,r=e.popperRect,c=e.placement,u=e.variation,p=e.offsets,d=e.position,l=e.gpuAcceleration,m=e.adaptive,v=e.roundOffsets,h=e.isFixed,g=p.x,b=void 0===g?0:g,w=p.y,x=void 0===w?0:w,O="function"==typeof v?v({x:b,y:x}):{x:b,y:x};b=O.x,x=O.y;var E=p.hasOwnProperty("x"),A=p.hasOwnProperty("y"),T=s,j=i,L=window;if(m){var P=V(n),C="clientHeight",k="clientWidth";if(P===y(n)&&"static"!==M(P=S(n)).position&&"absolute"===d&&(C="scrollHeight",k="scrollWidth"),P=P,c===i||(c===s||c===a)&&u===f)j=o,x-=(h&&P===L&&L.visualViewport?L.visualViewport.height:P[C])-r.height,x*=l?1:-1;if(c===s||(c===i||c===o)&&u===f)T=a,b-=(h&&P===L&&L.visualViewport?L.visualViewport.width:P[k])-r.width,b*=l?1:-1}var R,W=Object.assign({position:d},m&&F),B=!0===v?function(e){var t=e.x,n=e.y,r=window.devicePixelRatio||1;return{x:D(t*r)/r||0,y:D(n*r)/r||0}}({x:b,y:x}):{x:b,y:x};return b=B.x,x=B.y,l?Object.assign({},W,((R={})[j]=A?"0":"",R[T]=E?"0":"",R.transform=(L.devicePixelRatio||1)<=1?"translate("+b+"px, "+x+"px)":"translate3d("+b+"px, "+x+"px, 0)",R)):Object.assign({},W,((t={})[j]=A?x+"px":"",t[T]=E?b+"px":"",t.transform="",t))}var $={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:function(e){var t=e.state,n=e.options,r=n.gpuAcceleration,i=void 0===r||r,o=n.adaptive,a=void 0===o||o,s=n.roundOffsets,c=void 0===s||s,u={placement:E(t.placement),variation:U(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:i,isFixed:"fixed"===t.options.strategy};null!=t.modifiersData.popperOffsets&&(t.styles.popper=Object.assign({},t.styles.popper,z(Object.assign({},u,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:a,roundOffsets:c})))),null!=t.modifiersData.arrow&&(t.styles.arrow=Object.assign({},t.styles.arrow,z(Object.assign({},u,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:c})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})},data:{}},G={passive:!0};var X={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:function(e){var t=e.state,n=e.instance,r=e.options,i=r.scroll,o=void 0===i||i,a=r.resize,s=void 0===a||a,c=y(t.elements.popper),u=[].concat(t.scrollParents.reference,t.scrollParents.popper);return o&&u.forEach((function(e){e.addEventListener("scroll",n.update,G)})),s&&c.addEventListener("resize",n.update,G),function(){o&&u.forEach((function(e){e.removeEventListener("scroll",n.update,G)})),s&&c.removeEventListener("resize",n.update,G)}},data:{}},Y={left:"right",right:"left",bottom:"top",top:"bottom"};function J(e){return e.replace(/left|right|bottom|top/g,(function(e){return Y[e]}))}var Z={start:"end",end:"start"};function K(e){return e.replace(/start|end/g,(function(e){return Z[e]}))}function Q(e){var t=y(e);return{scrollLeft:t.pageXOffset,scrollTop:t.pageYOffset}}function ee(e){return P(S(e)).left+Q(e).scrollLeft}function te(e){var t=M(e),n=t.overflow,r=t.overflowX,i=t.overflowY;return/auto|scroll|overlay|hidden/.test(n+i+r)}function ne(e){return["html","body","#document"].indexOf(g(e))>=0?e.ownerDocument.body:w(e)&&te(e)?e:ne(W(e))}function re(e,t){var n;void 0===t&&(t=[]);var r=ne(e),i=r===(null==(n=e.ownerDocument)?void 0:n.body),o=y(r),a=i?[o].concat(o.visualViewport||[],te(r)?r:[]):r,s=t.concat(a);return i?s:s.concat(re(W(a)))}function ie(e){return Object.assign({},e,{left:e.x,top:e.y,right:e.x+e.width,bottom:e.y+e.height})}function oe(e,t,n){return t===d?ie(function(e,t){var n=y(e),r=S(e),i=n.visualViewport,o=r.clientWidth,a=r.clientHeight,s=0,c=0;if(i){o=i.width,a=i.height;var u=L();(u||!u&&"fixed"===t)&&(s=i.offsetLeft,c=i.offsetTop)}return{width:o,height:a,x:s+ee(e),y:c}}(e,n)):b(t)?function(e,t){var n=P(e,!1,"fixed"===t);return n.top=n.top+e.clientTop,n.left=n.left+e.clientLeft,n.bottom=n.top+e.clientHeight,n.right=n.left+e.clientWidth,n.width=e.clientWidth,n.height=e.clientHeight,n.x=n.left,n.y=n.top,n}(t,n):ie(function(e){var t,n=S(e),r=Q(e),i=null==(t=e.ownerDocument)?void 0:t.body,o=A(n.scrollWidth,n.clientWidth,i?i.scrollWidth:0,i?i.clientWidth:0),a=A(n.scrollHeight,n.clientHeight,i?i.scrollHeight:0,i?i.clientHeight:0),s=-r.scrollLeft+ee(e),c=-r.scrollTop;return"rtl"===M(i||n).direction&&(s+=A(n.clientWidth,i?i.clientWidth:0)-o),{width:o,height:a,x:s,y:c}}(S(e)))}function ae(e,t,n,r){var i="clippingParents"===t?function(e){var t=re(W(e)),n=["absolute","fixed"].indexOf(M(e).position)>=0&&w(e)?V(e):e;return b(n)?t.filter((function(e){return b(e)&&k(e,n)&&"body"!==g(e)})):[]}(e):[].concat(t),o=[].concat(i,[n]),a=o[0],s=o.reduce((function(t,n){var i=oe(e,n,r);return t.top=A(i.top,t.top),t.right=T(i.right,t.right),t.bottom=T(i.bottom,t.bottom),t.left=A(i.left,t.left),t}),oe(e,a,r));return s.width=s.right-s.left,s.height=s.bottom-s.top,s.x=s.left,s.y=s.top,s}function se(e){var t,n=e.reference,r=e.element,c=e.placement,u=c?E(c):null,d=c?U(c):null,l=n.x+n.width/2-r.width/2,m=n.y+n.height/2-r.height/2;switch(u){case i:t={x:l,y:n.y-r.height};break;case o:t={x:l,y:n.y+n.height};break;case a:t={x:n.x+n.width,y:m};break;case s:t={x:n.x-r.width,y:m};break;default:t={x:n.x,y:n.y}}var v=u?H(u):null;if(null!=v){var h="y"===v?"height":"width";switch(d){case p:t[v]=t[v]-(n[h]/2-r[h]/2);break;case f:t[v]=t[v]+(n[h]/2-r[h]/2)}}return t}function ce(e,t){void 0===t&&(t={});var n=t,r=n.placement,s=void 0===r?e.placement:r,c=n.strategy,p=void 0===c?e.strategy:c,f=n.boundary,m=void 0===f?"clippingParents":f,v=n.rootBoundary,h=void 0===v?d:v,g=n.elementContext,y=void 0===g?l:g,w=n.altBoundary,x=void 0!==w&&w,O=n.padding,E=void 0===O?0:O,A=I("number"!=typeof E?E:_(E,u)),T=y===l?"reference":l,D=e.rects.popper,j=e.elements[x?T:y],L=ae(b(j)?j:j.contextElement||S(e.elements.popper),m,h,p),C=P(e.elements.reference),k=se({reference:C,element:D,strategy:"absolute",placement:s}),M=ie(Object.assign({},D,k)),R=y===l?M:C,W={top:L.top-R.top+A.top,bottom:R.bottom-L.bottom+A.bottom,left:L.left-R.left+A.left,right:R.right-L.right+A.right},B=e.modifiersData.offset;if(y===l&&B){var V=B[s];Object.keys(W).forEach((function(e){var t=[a,o].indexOf(e)>=0?1:-1,n=[i,o].indexOf(e)>=0?"y":"x";W[e]+=V[n]*t}))}return W}function ue(e,t){void 0===t&&(t={});var n=t,r=n.placement,i=n.boundary,o=n.rootBoundary,a=n.padding,s=n.flipVariations,c=n.allowedAutoPlacements,p=void 0===c?v:c,f=U(r),d=f?s?m:m.filter((function(e){return U(e)===f})):u,l=d.filter((function(e){return p.indexOf(e)>=0}));0===l.length&&(l=d);var h=l.reduce((function(t,n){return t[n]=ce(e,{placement:n,boundary:i,rootBoundary:o,padding:a})[E(n)],t}),{});return Object.keys(h).sort((function(e,t){return h[e]-h[t]}))}var pe={name:"flip",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,r=e.name;if(!t.modifiersData[r]._skip){for(var u=n.mainAxis,f=void 0===u||u,d=n.altAxis,l=void 0===d||d,m=n.fallbackPlacements,v=n.padding,h=n.boundary,g=n.rootBoundary,y=n.altBoundary,b=n.flipVariations,w=void 0===b||b,x=n.allowedAutoPlacements,O=t.options.placement,A=E(O),T=m||(A===O||!w?[J(O)]:function(e){if(E(e)===c)return[];var t=J(e);return[K(e),t,K(t)]}(O)),D=[O].concat(T).reduce((function(e,n){return e.concat(E(n)===c?ue(t,{placement:n,boundary:h,rootBoundary:g,padding:v,flipVariations:w,allowedAutoPlacements:x}):n)}),[]),j=t.rects.reference,L=t.rects.popper,P=new Map,C=!0,k=D[0],M=0;M<D.length;M++){var R=D[M],S=E(R),W=U(R)===p,B=[i,o].indexOf(S)>=0,V=B?"width":"height",H=ce(t,{placement:R,boundary:h,rootBoundary:g,altBoundary:y,padding:v}),N=B?W?a:s:W?o:i;j[V]>L[V]&&(N=J(N));var I=J(N),_=[];if(f&&_.push(H[S]<=0),l&&_.push(H[N]<=0,H[I]<=0),_.every((function(e){return e}))){k=R,C=!1;break}P.set(R,_)}if(C)for(var q=function(e){var t=D.find((function(t){var n=P.get(t);if(n)return n.slice(0,e).every((function(e){return e}))}));if(t)return k=t,"break"},F=w?3:1;F>0;F--){if("break"===q(F))break}t.placement!==k&&(t.modifiersData[r]._skip=!0,t.placement=k,t.reset=!0)}},requiresIfExists:["offset"],data:{_skip:!1}};function fe(e,t,n){return void 0===n&&(n={x:0,y:0}),{top:e.top-t.height-n.y,right:e.right-t.width+n.x,bottom:e.bottom-t.height+n.y,left:e.left-t.width-n.x}}function de(e){return[i,a,o,s].some((function(t){return e[t]>=0}))}var le={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:function(e){var t=e.state,n=e.name,r=t.rects.reference,i=t.rects.popper,o=t.modifiersData.preventOverflow,a=ce(t,{elementContext:"reference"}),s=ce(t,{altBoundary:!0}),c=fe(a,r),u=fe(s,i,o),p=de(c),f=de(u);t.modifiersData[n]={referenceClippingOffsets:c,popperEscapeOffsets:u,isReferenceHidden:p,hasPopperEscaped:f},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":p,"data-popper-escaped":f})}};var me={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:function(e){var t=e.state,n=e.options,r=e.name,o=n.offset,c=void 0===o?[0,0]:o,u=v.reduce((function(e,n){return e[n]=function(e,t,n){var r=E(e),o=[s,i].indexOf(r)>=0?-1:1,c="function"==typeof n?n(Object.assign({},t,{placement:e})):n,u=c[0],p=c[1];return u=u||0,p=(p||0)*o,[s,a].indexOf(r)>=0?{x:p,y:u}:{x:u,y:p}}(n,t.rects,c),e}),{}),p=u[t.placement],f=p.x,d=p.y;null!=t.modifiersData.popperOffsets&&(t.modifiersData.popperOffsets.x+=f,t.modifiersData.popperOffsets.y+=d),t.modifiersData[r]=u}};var ve={name:"popperOffsets",enabled:!0,phase:"read",fn:function(e){var t=e.state,n=e.name;t.modifiersData[n]=se({reference:t.rects.reference,element:t.rects.popper,strategy:"absolute",placement:t.placement})},data:{}};var he={name:"preventOverflow",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,r=e.name,c=n.mainAxis,u=void 0===c||c,f=n.altAxis,d=void 0!==f&&f,l=n.boundary,m=n.rootBoundary,v=n.altBoundary,h=n.padding,g=n.tether,y=void 0===g||g,b=n.tetherOffset,w=void 0===b?0:b,x=ce(t,{boundary:l,rootBoundary:m,padding:h,altBoundary:v}),O=E(t.placement),D=U(t.placement),j=!D,L=H(O),P="x"===L?"y":"x",k=t.modifiersData.popperOffsets,M=t.rects.reference,R=t.rects.popper,S="function"==typeof w?w(Object.assign({},t.rects,{placement:t.placement})):w,W="number"==typeof S?{mainAxis:S,altAxis:S}:Object.assign({mainAxis:0,altAxis:0},S),B=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,I={x:0,y:0};if(k){if(u){var _,q="y"===L?i:s,F="y"===L?o:a,z="y"===L?"height":"width",$=k[L],G=$+x[q],X=$-x[F],Y=y?-R[z]/2:0,J=D===p?M[z]:R[z],Z=D===p?-R[z]:-M[z],K=t.elements.arrow,Q=y&&K?C(K):{width:0,height:0},ee=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:{top:0,right:0,bottom:0,left:0},te=ee[q],ne=ee[F],re=N(0,M[z],Q[z]),ie=j?M[z]/2-Y-re-te-W.mainAxis:J-re-te-W.mainAxis,oe=j?-M[z]/2+Y+re+ne+W.mainAxis:Z+re+ne+W.mainAxis,ae=t.elements.arrow&&V(t.elements.arrow),se=ae?"y"===L?ae.clientTop||0:ae.clientLeft||0:0,ue=null!=(_=null==B?void 0:B[L])?_:0,pe=$+oe-ue,fe=N(y?T(G,$+ie-ue-se):G,$,y?A(X,pe):X);k[L]=fe,I[L]=fe-$}if(d){var de,le="x"===L?i:s,me="x"===L?o:a,ve=k[P],he="y"===P?"height":"width",ge=ve+x[le],ye=ve-x[me],be=-1!==[i,s].indexOf(O),we=null!=(de=null==B?void 0:B[P])?de:0,xe=be?ge:ve-M[he]-R[he]-we+W.altAxis,Oe=be?ve+M[he]+R[he]-we-W.altAxis:ye,Ee=y&&be?function(e,t,n){var r=N(e,t,n);return r>n?n:r}(xe,ve,Oe):N(y?xe:ge,ve,y?Oe:ye);k[P]=Ee,I[P]=Ee-ve}t.modifiersData[r]=I}},requiresIfExists:["offset"]};function ge(e,t,n){void 0===n&&(n=!1);var r,i,o=w(t),a=w(t)&&function(e){var t=e.getBoundingClientRect(),n=D(t.width)/e.offsetWidth||1,r=D(t.height)/e.offsetHeight||1;return 1!==n||1!==r}(t),s=S(t),c=P(e,a,n),u={scrollLeft:0,scrollTop:0},p={x:0,y:0};return(o||!o&&!n)&&(("body"!==g(t)||te(s))&&(u=(r=t)!==y(r)&&w(r)?{scrollLeft:(i=r).scrollLeft,scrollTop:i.scrollTop}:Q(r)),w(t)?((p=P(t,!0)).x+=t.clientLeft,p.y+=t.clientTop):s&&(p.x=ee(s))),{x:c.left+u.scrollLeft-p.x,y:c.top+u.scrollTop-p.y,width:c.width,height:c.height}}function ye(e){var t=new Map,n=new Set,r=[];function i(e){n.add(e.name),[].concat(e.requires||[],e.requiresIfExists||[]).forEach((function(e){if(!n.has(e)){var r=t.get(e);r&&i(r)}})),r.push(e)}return e.forEach((function(e){t.set(e.name,e)})),e.forEach((function(e){n.has(e.name)||i(e)})),r}var be={placement:"bottom",modifiers:[],strategy:"absolute"};function we(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];return!t.some((function(e){return!(e&&"function"==typeof e.getBoundingClientRect)}))}function xe(e){void 0===e&&(e={});var t=e,n=t.defaultModifiers,r=void 0===n?[]:n,i=t.defaultOptions,o=void 0===i?be:i;return function(e,t,n){void 0===n&&(n=o);var i,a,s={placement:"bottom",orderedModifiers:[],options:Object.assign({},be,o),modifiersData:{},elements:{reference:e,popper:t},attributes:{},styles:{}},c=[],u=!1,p={state:s,setOptions:function(n){var i="function"==typeof n?n(s.options):n;f(),s.options=Object.assign({},o,s.options,i),s.scrollParents={reference:b(e)?re(e):e.contextElement?re(e.contextElement):[],popper:re(t)};var a,u,d=function(e){var t=ye(e);return h.reduce((function(e,n){return e.concat(t.filter((function(e){return e.phase===n})))}),[])}((a=[].concat(r,s.options.modifiers),u=a.reduce((function(e,t){var n=e[t.name];return e[t.name]=n?Object.assign({},n,t,{options:Object.assign({},n.options,t.options),data:Object.assign({},n.data,t.data)}):t,e}),{}),Object.keys(u).map((function(e){return u[e]}))));return s.orderedModifiers=d.filter((function(e){return e.enabled})),s.orderedModifiers.forEach((function(e){var t=e.name,n=e.options,r=void 0===n?{}:n,i=e.effect;if("function"==typeof i){var o=i({state:s,name:t,instance:p,options:r}),a=function(){};c.push(o||a)}})),p.update()},forceUpdate:function(){if(!u){var e=s.elements,t=e.reference,n=e.popper;if(we(t,n)){s.rects={reference:ge(t,V(n),"fixed"===s.options.strategy),popper:C(n)},s.reset=!1,s.placement=s.options.placement,s.orderedModifiers.forEach((function(e){return s.modifiersData[e.name]=Object.assign({},e.data)}));for(var r=0;r<s.orderedModifiers.length;r++)if(!0!==s.reset){var i=s.orderedModifiers[r],o=i.fn,a=i.options,c=void 0===a?{}:a,f=i.name;"function"==typeof o&&(s=o({state:s,options:c,name:f,instance:p})||s)}else s.reset=!1,r=-1}}},update:(i=function(){return new Promise((function(e){p.forceUpdate(),e(s)}))},function(){return a||(a=new Promise((function(e){Promise.resolve().then((function(){a=void 0,e(i())}))}))),a}),destroy:function(){f(),u=!0}};if(!we(e,t))return p;function f(){c.forEach((function(e){return e()})),c=[]}return p.setOptions(n).then((function(e){!u&&n.onFirstUpdate&&n.onFirstUpdate(e)})),p}}xe();var Oe=xe({defaultModifiers:[X,ve,$,O,me,pe,he,q,le]}),Ee="tippy-content",Ae="tippy-arrow",Te="tippy-svg-arrow",De={passive:!0,capture:!0},je=function(){return document.body};function Le(e,t,n){if(Array.isArray(e)){var r=e[t];return null==r?Array.isArray(n)?n[t]:n:r}return e}function Pe(e,t){var n={}.toString.call(e);return 0===n.indexOf("[object")&&n.indexOf(t+"]")>-1}function Ce(e,t){return"function"==typeof e?e.apply(void 0,t):e}function ke(e,t){return 0===t?e:function(r){clearTimeout(n),n=setTimeout((function(){e(r)}),t)};var n}function Me(e){return[].concat(e)}function Re(e,t){-1===e.indexOf(t)&&e.push(t)}function Se(e){return[].slice.call(e)}function We(e){return Object.keys(e).reduce((function(t,n){return void 0!==e[n]&&(t[n]=e[n]),t}),{})}function Be(){return document.createElement("div")}function Ve(e){return["Element","Fragment"].some((function(t){return Pe(e,t)}))}function He(e){return Ve(e)?[e]:function(e){return Pe(e,"NodeList")}(e)?Se(e):Array.isArray(e)?e:Se(document.querySelectorAll(e))}function Ne(e,t){e.forEach((function(e){e&&(e.style.transitionDuration=t+"ms")}))}function Ie(e,t){e.forEach((function(e){e&&e.setAttribute("data-state",t)}))}function _e(e,t,n){var r=t+"EventListener";["transitionend","webkitTransitionEnd"].forEach((function(t){e[r](t,n)}))}function qe(e,t){for(var n=t;n;){var r;if(e.contains(n))return!0;n=null==n.getRootNode||null==(r=n.getRootNode())?void 0:r.host}return!1}var Ue={isTouch:!1},Fe=0;function ze(){Ue.isTouch||(Ue.isTouch=!0,window.performance&&document.addEventListener("mousemove",$e))}function $e(){var e=performance.now();e-Fe<20&&(Ue.isTouch=!1,document.removeEventListener("mousemove",$e)),Fe=e}function Ge(){var e,t=document.activeElement;if((e=t)&&e._tippy&&e._tippy.reference===e){var n=t._tippy;t.blur&&!n.state.isVisible&&t.blur()}}var Xe=!!("undefined"!=typeof window&&"undefined"!=typeof document)&&!!window.msCrypto,Ye=Object.assign({appendTo:je,aria:{content:"auto",expanded:"auto"},delay:0,duration:[300,250],getReferenceClientRect:null,hideOnClick:!0,ignoreAttributes:!1,interactive:!1,interactiveBorder:2,interactiveDebounce:0,moveTransition:"",offset:[0,10],onAfterUpdate:function(){},onBeforeUpdate:function(){},onCreate:function(){},onDestroy:function(){},onHidden:function(){},onHide:function(){},onMount:function(){},onShow:function(){},onShown:function(){},onTrigger:function(){},onUntrigger:function(){},onClickOutside:function(){},placement:"top",plugins:[],popperOptions:{},render:null,showOnCreate:!1,touch:!0,trigger:"mouseenter focus",triggerTarget:null},{animateFill:!1,followCursor:!1,inlinePositioning:!1,sticky:!1},{allowHTML:!1,animation:"fade",arrow:!0,content:"",inertia:!1,maxWidth:350,role:"tooltip",theme:"",zIndex:9999}),Je=Object.keys(Ye);function Ze(e){var t=(e.plugins||[]).reduce((function(t,n){var r,i=n.name,o=n.defaultValue;i&&(t[i]=void 0!==e[i]?e[i]:null!=(r=Ye[i])?r:o);return t}),{});return Object.assign({},e,t)}function Ke(e,t){var n=Object.assign({},t,{content:Ce(t.content,[e])},t.ignoreAttributes?{}:function(e,t){return(t?Object.keys(Ze(Object.assign({},Ye,{plugins:t}))):Je).reduce((function(t,n){var r=(e.getAttribute("data-tippy-"+n)||"").trim();if(!r)return t;if("content"===n)t[n]=r;else try{t[n]=JSON.parse(r)}catch(e){t[n]=r}return t}),{})}(e,t.plugins));return n.aria=Object.assign({},Ye.aria,n.aria),n.aria={expanded:"auto"===n.aria.expanded?t.interactive:n.aria.expanded,content:"auto"===n.aria.content?t.interactive?null:"describedby":n.aria.content},n}function Qe(e,t){e.innerHTML=t}function et(e){var t=Be();return!0===e?t.className=Ae:(t.className=Te,Ve(e)?t.appendChild(e):Qe(t,e)),t}function tt(e,t){Ve(t.content)?(Qe(e,""),e.appendChild(t.content)):"function"!=typeof t.content&&(t.allowHTML?Qe(e,t.content):e.textContent=t.content)}function nt(e){var t=e.firstElementChild,n=Se(t.children);return{box:t,content:n.find((function(e){return e.classList.contains(Ee)})),arrow:n.find((function(e){return e.classList.contains(Ae)||e.classList.contains(Te)})),backdrop:n.find((function(e){return e.classList.contains("tippy-backdrop")}))}}function rt(e){var t=Be(),n=Be();n.className="tippy-box",n.setAttribute("data-state","hidden"),n.setAttribute("tabindex","-1");var r=Be();function i(n,r){var i=nt(t),o=i.box,a=i.content,s=i.arrow;r.theme?o.setAttribute("data-theme",r.theme):o.removeAttribute("data-theme"),"string"==typeof r.animation?o.setAttribute("data-animation",r.animation):o.removeAttribute("data-animation"),r.inertia?o.setAttribute("data-inertia",""):o.removeAttribute("data-inertia"),o.style.maxWidth="number"==typeof r.maxWidth?r.maxWidth+"px":r.maxWidth,r.role?o.setAttribute("role",r.role):o.removeAttribute("role"),n.content===r.content&&n.allowHTML===r.allowHTML||tt(a,e.props),r.arrow?s?n.arrow!==r.arrow&&(o.removeChild(s),o.appendChild(et(r.arrow))):o.appendChild(et(r.arrow)):s&&o.removeChild(s)}return r.className=Ee,r.setAttribute("data-state","hidden"),tt(r,e.props),t.appendChild(n),n.appendChild(r),i(e.props,e.props),{popper:t,onUpdate:i}}rt.$$tippy=!0;var it=1,ot=[],at=[];function st(e,t){var n,r,i,o,a,s,c,u,p=Ke(e,Object.assign({},Ye,Ze(We(t)))),f=!1,d=!1,l=!1,m=!1,v=[],h=ke(G,p.interactiveDebounce),g=it++,y=(u=p.plugins).filter((function(e,t){return u.indexOf(e)===t})),b={id:g,reference:e,popper:Be(),popperInstance:null,props:p,state:{isEnabled:!0,isVisible:!1,isDestroyed:!1,isMounted:!1,isShown:!1},plugins:y,clearDelayTimeouts:function(){clearTimeout(n),clearTimeout(r),cancelAnimationFrame(i)},setProps:function(t){if(b.state.isDestroyed)return;R("onBeforeUpdate",[b,t]),z();var n=b.props,r=Ke(e,Object.assign({},n,We(t),{ignoreAttributes:!0}));b.props=r,F(),n.interactiveDebounce!==r.interactiveDebounce&&(B(),h=ke(G,r.interactiveDebounce));n.triggerTarget&&!r.triggerTarget?Me(n.triggerTarget).forEach((function(e){e.removeAttribute("aria-expanded")})):r.triggerTarget&&e.removeAttribute("aria-expanded");W(),M(),O&&O(n,r);b.popperInstance&&(Z(),Q().forEach((function(e){requestAnimationFrame(e._tippy.popperInstance.forceUpdate)})));R("onAfterUpdate",[b,t])},setContent:function(e){b.setProps({content:e})},show:function(){var e=b.state.isVisible,t=b.state.isDestroyed,n=!b.state.isEnabled,r=Ue.isTouch&&!b.props.touch,i=Le(b.props.duration,0,Ye.duration);if(e||t||n||r)return;if(L().hasAttribute("disabled"))return;if(R("onShow",[b],!1),!1===b.props.onShow(b))return;b.state.isVisible=!0,j()&&(x.style.visibility="visible");M(),I(),b.state.isMounted||(x.style.transition="none");if(j()){var o=C(),a=o.box,c=o.content;Ne([a,c],0)}s=function(){var e;if(b.state.isVisible&&!m){if(m=!0,x.offsetHeight,x.style.transition=b.props.moveTransition,j()&&b.props.animation){var t=C(),n=t.box,r=t.content;Ne([n,r],i),Ie([n,r],"visible")}S(),W(),Re(at,b),null==(e=b.popperInstance)||e.forceUpdate(),R("onMount",[b]),b.props.animation&&j()&&function(e,t){q(e,t)}(i,(function(){b.state.isShown=!0,R("onShown",[b])}))}},function(){var e,t=b.props.appendTo,n=L();e=b.props.interactive&&t===je||"parent"===t?n.parentNode:Ce(t,[n]);e.contains(x)||e.appendChild(x);b.state.isMounted=!0,Z()}()},hide:function(){var e=!b.state.isVisible,t=b.state.isDestroyed,n=!b.state.isEnabled,r=Le(b.props.duration,1,Ye.duration);if(e||t||n)return;if(R("onHide",[b],!1),!1===b.props.onHide(b))return;b.state.isVisible=!1,b.state.isShown=!1,m=!1,f=!1,j()&&(x.style.visibility="hidden");if(B(),_(),M(!0),j()){var i=C(),o=i.box,a=i.content;b.props.animation&&(Ne([o,a],r),Ie([o,a],"hidden"))}S(),W(),b.props.animation?j()&&function(e,t){q(e,(function(){!b.state.isVisible&&x.parentNode&&x.parentNode.contains(x)&&t()}))}(r,b.unmount):b.unmount()},hideWithInteractivity:function(e){P().addEventListener("mousemove",h),Re(ot,h),h(e)},enable:function(){b.state.isEnabled=!0},disable:function(){b.hide(),b.state.isEnabled=!1},unmount:function(){b.state.isVisible&&b.hide();if(!b.state.isMounted)return;K(),Q().forEach((function(e){e._tippy.unmount()})),x.parentNode&&x.parentNode.removeChild(x);at=at.filter((function(e){return e!==b})),b.state.isMounted=!1,R("onHidden",[b])},destroy:function(){if(b.state.isDestroyed)return;b.clearDelayTimeouts(),b.unmount(),z(),delete e._tippy,b.state.isDestroyed=!0,R("onDestroy",[b])}};if(!p.render)return b;var w=p.render(b),x=w.popper,O=w.onUpdate;x.setAttribute("data-tippy-root",""),x.id="tippy-"+b.id,b.popper=x,e._tippy=b,x._tippy=b;var E=y.map((function(e){return e.fn(b)})),A=e.hasAttribute("aria-expanded");return F(),W(),M(),R("onCreate",[b]),p.showOnCreate&&ee(),x.addEventListener("mouseenter",(function(){b.props.interactive&&b.state.isVisible&&b.clearDelayTimeouts()})),x.addEventListener("mouseleave",(function(){b.props.interactive&&b.props.trigger.indexOf("mouseenter")>=0&&P().addEventListener("mousemove",h)})),b;function T(){var e=b.props.touch;return Array.isArray(e)?e:[e,0]}function D(){return"hold"===T()[0]}function j(){var e;return!(null==(e=b.props.render)||!e.$$tippy)}function L(){return c||e}function P(){var e,t,n=L().parentNode;return n?null!=(t=Me(n)[0])&&null!=(e=t.ownerDocument)&&e.body?t.ownerDocument:document:document}function C(){return nt(x)}function k(e){return b.state.isMounted&&!b.state.isVisible||Ue.isTouch||o&&"focus"===o.type?0:Le(b.props.delay,e?0:1,Ye.delay)}function M(e){void 0===e&&(e=!1),x.style.pointerEvents=b.props.interactive&&!e?"":"none",x.style.zIndex=""+b.props.zIndex}function R(e,t,n){var r;(void 0===n&&(n=!0),E.forEach((function(n){n[e]&&n[e].apply(n,t)})),n)&&(r=b.props)[e].apply(r,t)}function S(){var t=b.props.aria;if(t.content){var n="aria-"+t.content,r=x.id;Me(b.props.triggerTarget||e).forEach((function(e){var t=e.getAttribute(n);if(b.state.isVisible)e.setAttribute(n,t?t+" "+r:r);else{var i=t&&t.replace(r,"").trim();i?e.setAttribute(n,i):e.removeAttribute(n)}}))}}function W(){!A&&b.props.aria.expanded&&Me(b.props.triggerTarget||e).forEach((function(e){b.props.interactive?e.setAttribute("aria-expanded",b.state.isVisible&&e===L()?"true":"false"):e.removeAttribute("aria-expanded")}))}function B(){P().removeEventListener("mousemove",h),ot=ot.filter((function(e){return e!==h}))}function V(t){if(!Ue.isTouch||!l&&"mousedown"!==t.type){var n=t.composedPath&&t.composedPath()[0]||t.target;if(!b.props.interactive||!qe(x,n)){if(Me(b.props.triggerTarget||e).some((function(e){return qe(e,n)}))){if(Ue.isTouch)return;if(b.state.isVisible&&b.props.trigger.indexOf("click")>=0)return}else R("onClickOutside",[b,t]);!0===b.props.hideOnClick&&(b.clearDelayTimeouts(),b.hide(),d=!0,setTimeout((function(){d=!1})),b.state.isMounted||_())}}}function H(){l=!0}function N(){l=!1}function I(){var e=P();e.addEventListener("mousedown",V,!0),e.addEventListener("touchend",V,De),e.addEventListener("touchstart",N,De),e.addEventListener("touchmove",H,De)}function _(){var e=P();e.removeEventListener("mousedown",V,!0),e.removeEventListener("touchend",V,De),e.removeEventListener("touchstart",N,De),e.removeEventListener("touchmove",H,De)}function q(e,t){var n=C().box;function r(e){e.target===n&&(_e(n,"remove",r),t())}if(0===e)return t();_e(n,"remove",a),_e(n,"add",r),a=r}function U(t,n,r){void 0===r&&(r=!1),Me(b.props.triggerTarget||e).forEach((function(e){e.addEventListener(t,n,r),v.push({node:e,eventType:t,handler:n,options:r})}))}function F(){var e;D()&&(U("touchstart",$,{passive:!0}),U("touchend",X,{passive:!0})),(e=b.props.trigger,e.split(/\s+/).filter(Boolean)).forEach((function(e){if("manual"!==e)switch(U(e,$),e){case"mouseenter":U("mouseleave",X);break;case"focus":U(Xe?"focusout":"blur",Y);break;case"focusin":U("focusout",Y)}}))}function z(){v.forEach((function(e){var t=e.node,n=e.eventType,r=e.handler,i=e.options;t.removeEventListener(n,r,i)})),v=[]}function $(e){var t,n=!1;if(b.state.isEnabled&&!J(e)&&!d){var r="focus"===(null==(t=o)?void 0:t.type);o=e,c=e.currentTarget,W(),!b.state.isVisible&&Pe(e,"MouseEvent")&&ot.forEach((function(t){return t(e)})),"click"===e.type&&(b.props.trigger.indexOf("mouseenter")<0||f)&&!1!==b.props.hideOnClick&&b.state.isVisible?n=!0:ee(e),"click"===e.type&&(f=!n),n&&!r&&te(e)}}function G(e){var t=e.target,n=L().contains(t)||x.contains(t);"mousemove"===e.type&&n||function(e,t){var n=t.clientX,r=t.clientY;return e.every((function(e){var t=e.popperRect,i=e.popperState,o=e.props.interactiveBorder,a=i.placement.split("-")[0],s=i.modifiersData.offset;if(!s)return!0;var c="bottom"===a?s.top.y:0,u="top"===a?s.bottom.y:0,p="right"===a?s.left.x:0,f="left"===a?s.right.x:0,d=t.top-r+c>o,l=r-t.bottom-u>o,m=t.left-n+p>o,v=n-t.right-f>o;return d||l||m||v}))}(Q().concat(x).map((function(e){var t,n=null==(t=e._tippy.popperInstance)?void 0:t.state;return n?{popperRect:e.getBoundingClientRect(),popperState:n,props:p}:null})).filter(Boolean),e)&&(B(),te(e))}function X(e){J(e)||b.props.trigger.indexOf("click")>=0&&f||(b.props.interactive?b.hideWithInteractivity(e):te(e))}function Y(e){b.props.trigger.indexOf("focusin")<0&&e.target!==L()||b.props.interactive&&e.relatedTarget&&x.contains(e.relatedTarget)||te(e)}function J(e){return!!Ue.isTouch&&D()!==e.type.indexOf("touch")>=0}function Z(){K();var t=b.props,n=t.popperOptions,r=t.placement,i=t.offset,o=t.getReferenceClientRect,a=t.moveTransition,c=j()?nt(x).arrow:null,u=o?{getBoundingClientRect:o,contextElement:o.contextElement||L()}:e,p=[{name:"offset",options:{offset:i}},{name:"preventOverflow",options:{padding:{top:2,bottom:2,left:5,right:5}}},{name:"flip",options:{padding:5}},{name:"computeStyles",options:{adaptive:!a}},{name:"$$tippy",enabled:!0,phase:"beforeWrite",requires:["computeStyles"],fn:function(e){var t=e.state;if(j()){var n=C().box;["placement","reference-hidden","escaped"].forEach((function(e){"placement"===e?n.setAttribute("data-placement",t.placement):t.attributes.popper["data-popper-"+e]?n.setAttribute("data-"+e,""):n.removeAttribute("data-"+e)})),t.attributes.popper={}}}}];j()&&c&&p.push({name:"arrow",options:{element:c,padding:3}}),p.push.apply(p,(null==n?void 0:n.modifiers)||[]),b.popperInstance=Oe(u,x,Object.assign({},n,{placement:r,onFirstUpdate:s,modifiers:p}))}function K(){b.popperInstance&&(b.popperInstance.destroy(),b.popperInstance=null)}function Q(){return Se(x.querySelectorAll("[data-tippy-root]"))}function ee(e){b.clearDelayTimeouts(),e&&R("onTrigger",[b,e]),I();var t=k(!0),r=T(),i=r[0],o=r[1];Ue.isTouch&&"hold"===i&&o&&(t=o),t?n=setTimeout((function(){b.show()}),t):b.show()}function te(e){if(b.clearDelayTimeouts(),R("onUntrigger",[b,e]),b.state.isVisible){if(!(b.props.trigger.indexOf("mouseenter")>=0&&b.props.trigger.indexOf("click")>=0&&["mouseleave","mousemove"].indexOf(e.type)>=0&&f)){var t=k(!1);t?r=setTimeout((function(){b.state.isVisible&&b.hide()}),t):i=requestAnimationFrame((function(){b.hide()}))}}else _()}}function ct(e,t){void 0===t&&(t={});var n=Ye.plugins.concat(t.plugins||[]);document.addEventListener("touchstart",ze,De),window.addEventListener("blur",Ge);var r=Object.assign({},t,{plugins:n}),i=He(e).reduce((function(e,t){var n=t&&st(t,r);return n&&e.push(n),e}),[]);return Ve(e)?i[0]:i}ct.defaultProps=Ye,ct.setDefaultProps=function(e){Object.keys(e).forEach((function(t){Ye[t]=e[t]}))},ct.currentInput=Ue,Object.assign({},O,{effect:function(e){var t=e.state,n={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};Object.assign(t.elements.popper.style,n.popper),t.styles=n,t.elements.arrow&&Object.assign(t.elements.arrow.style,n.arrow)}}),ct.setDefaultProps({render:rt});class ut{constructor(e){this.RunnablePage=e;let t=this.RunnablePage.Container.querySelector(".calendarIsBusy"),n=this.RunnablePage.Container.querySelector(".calendarBlock");n.innerHTML="",this.Calendar=new FullCalendar.Calendar(n,{initialView:"dayGridMonth",height:"auto",headerToolbar:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,listMonth"},events:async(e,n)=>{t.style.display="flex";let i=new URLSearchParams(window.location.search),o={};i.forEach(((e,t)=>{o[t]=e}));let a=await r.WpAjaxPost.Post("rnpagebuilder_get_event_dates",{end:e.endStr,start:e.startStr,pageid:this.RunnablePage.Options.pageid,nonce:this.RunnablePage.Options.GetEventsNonce,getParameters:o},this.RunnablePage.Options.ajaxurl);t.style.display="none",null!=a&&n(a)},eventTimeFormat:{hour:"numeric",minute:"2-digit",omitZeroMinute:!0,meridiem:"narrow",arrow:!0},displayEventTime:!1,eventDidMount:e=>{null==e.el._tippy&&ct(e.el,{popperOptions:{modifiers:{preventOverflow:{enabled:!1}}},interactive:!0,arrow:!0,content:t=>{let n=document.createElement("div");return n.innerHTML=e.event._def.extendedProps.content,n},maxWidth:parseInt(this.RunnablePage.Options.popupwidth),appendTo:document.body,theme:"light"})},eventClick:e=>{e.el._tippy&&e.el._tippy.show()}}),this.Calendar.render(),this.Calendar.el.querySelector(".fc-prev-button").addEventListener("mouseup",(e=>{e.stopImmediatePropagation(),e.preventDefault(),e.stopPropagation()})),this.Calendar.el.querySelector(".fc-next-button").addEventListener("mousedown",(e=>{e.stopImmediatePropagation(),e.preventDefault(),e.stopPropagation()}))}}t.EventManager.Subscribe("InitializeDomProcessors",(e=>{new ut(e)})),e.CalendarDomProcessor=ut,Object.defineProperty(e,"__esModule",{value:!0})}));