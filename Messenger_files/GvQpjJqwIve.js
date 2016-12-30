if (self.CavalryLogger) { CavalryLogger.start_js(["scssa"]); }

__d('XUIError',['cx','invariant','Promise','ARIA','Bootloader','CSS','DataStore','DOM','Event','Parent','filterObject','getActiveElement','getElementText','isNode','memoize','nl2br'],(function a(b,c,d,e,f,g,h,i){'use strict';var j='data-xui-error-alignh',k='XUIError',l='data-xui-error',m="_1tp7",n='data-xui-error-position';c('Event').listen(document.documentElement,'mouseover',function(event){if(c('Parent').byClass(c('getActiveElement')(),m))return;var aa=c('Parent').byClass(event.getTarget(),m);if(aa){w(aa);}else x();});c('Event').listen(document.documentElement,'focusin',function(event){var aa=c('Parent').byClass(event.getTarget(),m);if(aa){w(aa);}else x();});c('Event').listen(document.documentElement,'focusout',function(event){x();});var o=c('memoize')(function(){return new (c('Promise'))(function(aa,ba){c('Bootloader').loadModules(["React","ReactDOM","XUIErrorDialogImpl"],function(ca,da,ea){aa(babelHelpers['extends']({React:ca,ReactDOM:da},ea.getNewDialog()));},'XUIError');});}),p=null;function q(aa){return babelHelpers['extends']({message:aa.getAttribute(l),position:aa.getAttribute(n),alignh:aa.getAttribute(j)},c('DataStore').get(aa,k));}function r(aa,ba){c('DataStore').set(aa,k,ba);}function s(aa,ba){c('DataStore').set(aa,k,babelHelpers['extends']({},c('DataStore').get(aa,k),ba));}function t(aa){c('DataStore').remove(aa,k);}var u=false,v=false;function w(aa){o().done(function(ba){var ca=ba.React,da=ba.ReactDOM,ea=ba.dialog,fa=ba.dialogMessageNode,ga=q(aa),ha=ga.message;if(ha==null)return;var ia=ca.isValidElement(ha);if(u&&!ia)da.unmountComponentAtNode(fa);if(ia){da.render(ha,fa);}else{typeof ha==='string'||c('isNode')(ha)||i(0);if(typeof ha==='string')ha=c('nl2br')(ha);c('DOM').setContent(fa,ha);}u=ia;ea.setContext(aa).setPosition(ga.position||'right').setAlignment(ga.alignh||(ga.position==='above'||ga.position==='below'?'right':null)).show();c('ARIA').notify(c('getElementText')(fa));p=aa;});v=true;}function x(){if(!v)return;o().done(function(aa){var ba=aa.React,ca=aa.ReactDOM,da=aa.dialog,ea=aa.dialogMessageNode;if(!p)return;if(u){ca.unmountComponentAtNode(ea);u=false;}da.hide();p=null;});}function y(aa){if(c('DOM').contains(aa,c('getActiveElement')()))w(aa);}var z={set:function aa(ba){var ca=ba.target,da=ba.message,ea=ba.position,fa=ba.alignh;da!==null||i(0);c('CSS').addClass(ca,m);s(ca,c('filterObject')({message:da,position:ea,alignh:fa},function(ga){return ga!==undefined;}));y(ca);},clear:function aa(ba){c('CSS').removeClass(ba,m);ba.removeAttribute(l);t(ba);if(ba===p)x();},updatePosition:function aa(){if(!v)return;o().done(function(ba){var ca=ba.dialog;if(p)ca.updatePosition();});},__setReactError:function aa(ba,ca){var da=ca.message,ea=ca.position,fa=ca.alignh;da!==null||i(0);r(ba,{message:da,position:ea,alignh:fa});y(ba);},__clearReactError:function aa(ba){t(ba);if(ba===p)x();}};f.exports=z;}),null);
__d('XUIError.react',['cx','React','ReactDOM','XUIError','joinClasses'],(function a(b,c,d,e,f,g,h){'use strict';var i,j,k=c('React').PropTypes,l="_1tp7";i=babelHelpers.inherits(m,c('React').Component);j=i&&i.prototype;m.prototype.componentDidMount=function(){if(this.props.xuiError!=null)c('XUIError').__setReactError(c('ReactDOM').findDOMNode(this),{message:this.props.xuiError,position:this.props.xuiErrorPosition,alignh:this.props.xuiErrorAlignh});};m.prototype.componentDidUpdate=function(){if(this.props.xuiError==null){c('XUIError').__clearReactError(c('ReactDOM').findDOMNode(this));}else c('XUIError').__setReactError(c('ReactDOM').findDOMNode(this),{message:this.props.xuiError,position:this.props.xuiErrorPosition,alignh:this.props.xuiErrorAlignh});};m.prototype.componentWillUnmount=function(){c('XUIError').__clearReactError(c('ReactDOM').findDOMNode(this));};m.prototype.render=function(){var n=c('React').Children.only(this.props.children);if(this.props.xuiError!=null)n=c('React').cloneElement(n,{className:c('joinClasses')(n.props.className,l)});return n;};function m(){i.apply(this,arguments);}m.propTypes={xuiError:k.any,xuiErrorPosition:k.oneOf(['above','below','left','right']),xuiErrorAlignh:k.oneOf(['left','center','right'])};f.exports=m;}),null);
__d('XUITextInput.react',['cx','AbstractTextInput.react','React','XUIError.react','joinClasses'],(function a(b,c,d,e,f,g,h){var i,j,k=c('React').Component,l=c('React').PropTypes;i=babelHelpers.inherits(m,k);j=i&&i.prototype;m.prototype.render=function(){'use strict';var n="_55r1"+(this.props.height==='tall'?' '+"_55r2":'')+(!!this.props.disabled?' '+"_53a0":'');return (c('React').createElement(c('XUIError.react'),this.props,c('React').createElement(c('AbstractTextInput.react'),babelHelpers['extends']({},this.props,{ref:'textInput',className:c('joinClasses')(this.props.className,n)}))));};m.prototype.focusInput=function(){'use strict';this.refs.textInput&&this.refs.textInput.focusInput();};m.prototype.blurInput=function(){'use strict';this.refs.textInput&&this.refs.textInput.blurInput();};m.prototype.getTextFieldDOM=function(){'use strict';if(this.refs.textInput)return this.refs.textInput.getTextFieldDOM();return null;};function m(){'use strict';i.apply(this,arguments);}m.defaultProps={height:'short'};m.propTypes=babelHelpers['extends']({},c('AbstractTextInput.react').propTypes,c('XUIError.react').propTypes,{height:l.oneOf(['short','tall'])});f.exports=m;}),null);
__d('PureStoreBasedStateMixin',['invariant','StoreBasedStateMixinHelper','setImmediate'],(function a(b,c,d,e,f,g,h){'use strict';var i=function(){for(var j=arguments.length,k=Array(j),l=0;l<j;l++)k[l]=arguments[l];return {getInitialState:function m(){return this.constructor.calculateState();},componentWillMount:function m(){this.constructor.calculateState||h(0);this._recalculateStateID=null;var n=function(){if(this.isMounted())this.setState(this.constructor.calculateState());this._recalculateStateID=null;}.bind(this);this._mixin=new (c('StoreBasedStateMixinHelper'))(k);this._mixin.subscribeCallback(function(){if(this._recalculateStateID===null)this._recalculateStateID=c('setImmediate')(n);}.bind(this));},componentWillUnmount:function m(){this._mixin.release();this._mixin=null;}};}.bind(this);f.exports=i;}),null);