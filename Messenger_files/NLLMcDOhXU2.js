if (self.CavalryLogger) { CavalryLogger.start_js(["++PAZ"]); }

__d('EmojiDispatcher',['ExplicitRegistrationDispatcher'],(function a(b,c,d,e,f,g){'use strict';f.exports=new (c('ExplicitRegistrationDispatcher'))({strict:false});}),null);
__d('EmojiActions',['EmojiDispatcher','keyMirror'],(function a(b,c,d,e,f,g){'use strict';var h=c('keyMirror')({CHANGE_CURRENT_CATEGORY:null,CHANGE_EMOJI_COLOR:null,EMOJI_COLOR_READY:null,GET_EMOJI_COLOR:null,TRAY_DATA_READY:null,UPDATE_TRAY_DATA:null}),i={Types:h,loadedTrayData:function j(){c('EmojiDispatcher').dispatch({type:i.Types.TRAY_DATA_READY});},updateTrayData:function j(){c('EmojiDispatcher').dispatch({type:i.Types.UPDATE_TRAY_DATA});},changeEmojiColor:function j(k){c('EmojiDispatcher').dispatch({type:i.Types.CHANGE_EMOJI_COLOR,color:k});},changeCurrentCategory:function j(k){c('EmojiDispatcher').dispatch({type:i.Types.CHANGE_CURRENT_CATEGORY,currentCategory:k});},getEmojiColor:function j(){c('EmojiDispatcher').dispatch({type:i.Types.GET_EMOJI_COLOR});},emojiColorReady:function j(k){c('EmojiDispatcher').dispatch({type:i.Types.EMOJI_COLOR_READY,color:k});}};f.exports=i;}),null);
__d("XMessagingGetEmojiRecentUsageController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/messaging\/emoji_recent_usage\/",{});}),null);
__d('EmojiServerRequests',['Promise','AsyncRequest','XMessagingGetEmojiRecentUsageController'],(function a(b,c,d,e,f,g){'use strict';var h={fetchTrayData:function j(k){return i(c('XMessagingGetEmojiRecentUsageController').getURIBuilder().getURI(),k,true);}};function i(j,k,l){return new (c('Promise'))(function(m,n){return (new (c('AsyncRequest'))(j).setHandler(function(o){return m(o.getPayload());}).setAllowCrossPageTransition(l).send());}).then(k);}f.exports=h;}),null);
__d("XMessagingGetEmojiColorPrefController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/messaging\/get_emoji_color\/",{});}),null);
__d("XMessagingSetEmojiColorPrefController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/messaging\/set_emoji_color\/",{});}),null);
__d('EmojiState',['fbt','AsyncRequest','EmojiActions','EmojiServerRequests','MessengerSupportedEmoji','XMessagingGetEmojiColorPrefController','XMessagingSetEmojiColorPrefController'],(function a(b,c,d,e,f,g,h){'use strict';var i=null,j=null,k=void 0,l={onTrayDataReady:function m(n){if(!k)k=c('EmojiServerRequests').fetchTrayData(function(o){j=o;});k.then(function(){n();c('EmojiActions').loadedTrayData();});k.done();},getEmojiColor:function m(){var n=c('XMessagingGetEmojiColorPrefController').getURIBuilder().getURI();new (c('AsyncRequest'))(n).setMethod('POST').setHandler(function(o){c('EmojiActions').emojiColorReady(o.payload);}).send();},changeEmojiColor:function m(n){var o=c('XMessagingSetEmojiColorPrefController').getURIBuilder().getURI();new (c('AsyncRequest'))(o).setMethod('POST').setData({color:n}).send();},addMRUCategory:function m(){if(j){var n=j.map(function(o){var p=c('MessengerSupportedEmoji').findEmoji(o);if(!p)return null;return p.emoji.split('_').map(function(q){return parseInt(q,16);});}).filter(function(o){return !!o;});i={name:h._("Envoy\u00e9s r\u00e9cemment"),emojis:n,icon:[128340]};c('EmojiActions').updateTrayData();j=null;}},_addRecentlyUsedEmoji:function m(n){var o,p=i&&i.emojis;if(!p)return;var q=function s(t){var u=n[t];for(var v=0;v<p.length;++v)if(p[v].length==u.length&&p[v].every(function(w,x){return w===u[x];})){p.splice(v,1);break;}p.unshift(u);};for(var r=0;r<n.length;++r)q(r);c('EmojiActions').updateTrayData();},getMRUCategory:function m(){if(!i)this.addMRUCategory();return i;},updateRecentlyUsed:function m(n){if(!i){this.addMRUCategory();return;}this._addRecentlyUsedEmoji(n);}};f.exports=l;}),null);
__d('EmojiStateStore',['EmojiActions','EmojiDispatcher','EmojiState','FluxStore'],(function a(b,c,d,e,f,g){'use strict';var h,i;h=babelHelpers.inherits(j,c('FluxStore'));i=h&&h.prototype;function j(){i.constructor.call(this,c('EmojiDispatcher'));this.$EmojiStateStore2=false;}j.prototype.getState=function(){var k=c('EmojiState').getMRUCategory();return {currentCategory:this.$EmojiStateStore4,emojiColor:this.$EmojiStateStore3,mruCategory:[k],threadID:this.$EmojiStateStore1,trayDataReady:this.$EmojiStateStore2};};j.prototype.__onDispatch=function(k){var l=c('EmojiActions').Types;switch(k.type){case l.GET_EMOJI_COLOR:c('EmojiState').getEmojiColor();break;case l.EMOJI_COLOR_READY:this.$EmojiStateStore3=k.color;break;case l.CHANGE_EMOJI_COLOR:c('EmojiState').changeEmojiColor(k.color);this.$EmojiStateStore3=k.color;break;case l.CHANGE_CURRENT_CATEGORY:this.$EmojiStateStore4=k.currentCategory;break;case l.UPDATE_TRAY_DATA:break;case l.TRAY_DATA_READY:this.$EmojiStateStore2=true;break;}this.__emitChange();};f.exports=new j();}),null);
__d('ChatEmojiCategories',['fbt'],(function a(b,c,d,e,f,g,h){'use strict';var i=[{name:h._("Smileys et personnes"),icon:[128515],emojis:[[128512],[128556],[128513],[128514],[128515],[128516],[128517],[128518],[128519],[128521],[128522],[128578],[128579],[9786],[128523],[128524],[128525],[128536],[128535],[128537],[128538],[128540],[128541],[128539],[129297],[129299],[128526],[129303],[128527],[128566],[128528],[128529],[128530],[128580],[129300],[128563],[128542],[128543],[128544],[128545],[128532],[128533],[128577],[9785],[128547],[128534],[128555],[128553],[128548],[128558],[128561],[128552],[128560],[128559],[128550],[128551],[128549],[128546],[128554],[128531],[128557],[128565],[128562],[129296],[128567],[129298],[129301],[128564],[128164],[128169],[128520],[128127],[128121],[128122],[128128],[128123],[128125],[129302],[128570],[128568],[128569],[128571],[128572],[128573],[128576],[128575],[128574],[128588],[128079],[128075],[128077],[128078],[128074],[9994],[9996],[128076],[9995],[128080],[128170],[128591],[9757],[128070],[128071],[128072],[128073],[128405],[128400],[129304],[128406],[9997],[128133],[128068],[128069],[128066],[128067],[128065],[128064],[128100],[128101],[128483],[128118],[128102],[128103],[128104],[128105],[128113],[128116],[128117],[128114],[128115],[128110],[128119],[9937],[128130],[128373],[127877],[128124],[128120],[128112],[128694],[127939],[128131],[128111],[128107],[128108],[128109],[128583],[128129],[128581],[128582],[128587],[128590],[128589],[128135],[128134],[128145],[128105,8205,10084,65039,8205,128104],[128104,8205,10084,65039,8205,128104],[128105,8205,10084,65039,8205,128105],[128143],[128105,8205,10084,65039,8205,128139,8205,128104],[128104,8205,10084,65039,8205,128139,8205,128104],[128105,8205,10084,65039,8205,128139,8205,128105],[128106],[128104,8205,128105,8205,128102],[128104,8205,128105,8205,128103],[128104,8205,128105,8205,128103,8205,128102],[128104,8205,128105,8205,128102,8205,128102],[128104,8205,128105,8205,128103,8205,128103],[128105,8205,128105,8205,128102],[128105,8205,128105,8205,128103],[128105,8205,128105,8205,128103,8205,128102],[128105,8205,128105,8205,128102,8205,128102],[128105,8205,128105,8205,128103,8205,128103],[127995],[127996],[127997],[127998],[127999],[128104,8205,128104,8205,128102],[128104,8205,128104,8205,128103],[128104,8205,128104,8205,128103,8205,128102],[128104,8205,128104,8205,128102,8205,128102],[128104,8205,128104,8205,128103,8205,128103],[128090],[128085],[128086],[128084],[128087],[128089],[128088],[128132],[128139],[128099],[128096],[128097],[128098],[128094],[128095],[128082],[127913],[127891],[128081],[127890],[128093],[128091],[128092],[128188],[128083],[128374],[128141],[127746]]},{name:h._("Animaux et nature"),icon:[128059],emojis:[[128054],[128049],[128045],[128057],[128048],[128059],[128060],[128040],[128047],[129409],[128046],[128055],[128061],[128056],[128025],[128053],[128584],[128585],[128586],[128018],[128039],[128038],[128036],[128035],[128037],[128058],[128023],[128052],[129412],[128029],[128027],[128012],[128030],[128028],[128375],[129410],[129408],[128013],[128034],[128032],[128031],[128033],[128044],[128051],[128011],[128010],[128006],[128005],[128003],[128002],[128020],[128004],[128042],[128043],[128024],[128016],[128015],[128017],[128014],[128022],[128000],[128001],[128019],[129411],[128330],[128021],[128041],[128008],[128007],[128063],[128062],[128009],[128050],[127797],[127876],[127794],[127795],[127796],[127793],[127807],[9752],[127808],[127885],[127883],[127811],[127810],[127809],[127806],[127802],[127803],[127801],[127804],[127799],[127800],[127812],[128144],[127792],[127875],[128026],[128376],[127758],[127757],[127759],[127765],[127766],[127767],[127768],[127761],[127762],[127763],[127764],[127770],[127773],[127771],[127772],[127774],[127769],[11088],[127775],[128171],[10024],[9732],[9728],[9925],[127780],[127781],[127782],[9729],[127783],[9928],[127785],[9889],[128293],[128165],[10052],[127784],[9731],[9924],[127788],[128168],[127786],[127787],[9730],[9748],[128167],[128166],[127754]]},{name:h._("Gastronomie"),icon:[127828],emojis:[[127823],[127822],[127824],[127818],[127819],[127820],[127817],[127815],[127827],[127816],[127826],[127825],[127821],[127813],[127814],[127798],[127805],[127840],[127838],[129472],[127831],[127830],[127844],[127859],[127828],[127839],[127789],[127829],[127837],[127790],[127791],[127836],[127858],[127845],[127843],[127857],[127835],[127833],[127834],[127832],[127842],[127841],[127847],[127848],[127846],[127856],[127855],[127874],[127854],[127852],[127853],[127851],[127871],[127849],[127850],[127866],[127867],[127863],[127864],[127865],[127870],[127862],[127861],[9749],[127868],[127860],[127869]]},{name:h._("Activit\u00e9s"),icon:[9917],emojis:[[9917],[127936],[127944],[9918],[127934],[127952],[127945],[127921],[9971],[127948],[127955],[127992],[127954],[127953],[127951],[127935],[9975],[127938],[9976],[127993],[127907],[128675],[127946],[127940],[9977],[127947],[128692],[128693],[127943],[128372],[127942],[127933],[127894],[127941],[127895],[127989],[127915],[127903],[127917],[127912],[127914],[127908],[127911],[127932],[127929],[127927],[127930],[127928],[127931],[127916],[127918],[128126],[127919],[127922],[127920],[127923]]},{name:h._("Voyages et lieux"),icon:[128662],emojis:[[128663],[128661],[128647],[128665],[128652],[128654],[127950],[128659],[128657],[128658],[128656],[128666],[128667],[128668],[127949],[128690],[128680],[128653],[128664],[128660],[128662],[128673],[128672],[128671],[128643],[128651],[128669],[128644],[128645],[128648],[128670],[128642],[128646],[128650],[128649],[128641],[128745],[9992],[128747],[128748],[9973],[128741],[128676],[9972],[128755],[128640],[128752],[128186],[9875],[128679],[9981],[128655],[128678],[128677],[127937],[128674],[127905],[127906],[127959],[127904],[127745],[128508],[127981],[9970],[127889],[9968],[127956],[128507],[127755],[128510],[127957],[127966],[128739],[128740],[127749],[127748],[127964],[127958],[9969],[127965],[127751],[127750],[127961],[127747],[127753],[127756],[127879],[127878],[127752],[127960],[127984],[127983],[127967],[128509],[127968],[127969],[127962],[127970],[127980],[9978],[127971],[127972],[127973],[127974],[127976],[127978],[127979],[127977],[127963],[128146],[9962],[128332],[128333],[128331],[9961],[127776]]},{name:h._("Objets"),icon:[128161],emojis:[[8986],[128241],[128242],[128187],[9000],[128421],[128424],[128433],[128434],[128377],[128189],[128190],[128191],[128192],[128252],[128247],[128248],[128249],[127909],[128253],[127902],[128222],[9742],[128223],[128224],[128250],[128251],[127897],[127898],[127899],[9201],[9202],[9200],[128368],[8987],[9203],[128225],[128267],[128268],[128161],[128294],[128367],[128465],[128738],[128184],[128181],[128180],[128182],[128183],[128176],[128179],[128142],[9878],[128295],[128296],[9874],[128736],[9935],[128297],[128476],[9881],[9939],[128299],[128163],[128298],[128481],[9876],[128737],[128684],[9760],[9904],[9905],[127994],[128302],[128255],[128136],[9879],[128301],[128300],[128371],[128138],[128137],[127777],[127991],[128278],[128701],[128703],[128704],[128705],[128273],[128477],[128715],[128716],[128719],[128682],[128718],[128444],[128506],[128511],[128717],[127880],[127887],[127872],[127873],[127882],[127881],[127886],[127888],[127884],[127982],[9993],[128233],[128232],[128140],[128231],[128238],[128234],[128235],[128236],[128237],[128230],[128239],[128229],[128228],[128220],[128195],[128209],[128202],[128200],[128201],[128196],[128197],[128198],[128467],[128199],[128451],[128499],[128452],[128203],[128466],[128193],[128478],[128194],[128450],[128240],[128211],[128213],[128215],[128216],[128217],[128212],[128210],[128218],[128214],[128279],[128206],[128391],[9986],[128208],[128207],[128204],[128205],[128681],[127987],[127988],[128272],[128274],[128275],[128271],[128394],[128395],[10002],[128221],[9999],[128397],[128396],[128269],[128270]]},{name:h._("Symboles"),icon:[10084],emojis:[[10084,65039],[128155],[128154],[128153],[128148],[128156],[10083],[128149],[128147],[128158],[128151],[128152],[128150],[128157],[128159],[9774],[10013],[9770],[128329],[9784],[10017],[128303],[128334],[9775],[9766],[128720],[9934],[9800],[9801],[9802],[9803],[9804],[9805],[9806],[9807],[9808],[9809],[9810],[9811],[127380],[9883],[9762],[9763],[128244],[128243],[127543],[127386],[128174],[127344],[127345],[127374],[127377],[127358],[127384],[9940],[128219],[128683],[10060],[11093],[128162],[9832],[128695],[128687],[128691],[128689],[128286],[128245],[10071],[10069],[10067],[10068],[8252,65039],[8265,65039],[128175],[128261],[128262],[128305],[9884],[12349],[9888],[128696],[128304],[127535],[128185],[10035],[10062],[9989],[128160],[127744],[127760],[9410],[127975],[127490],[128706],[128707],[128708],[128709],[9855],[128685],[128702],[10036],[127359],[128688],[128697],[128698],[128700],[128699],[128686],[127910],[128246],[9167],[127489],[127382],[9851],[127383],[127378],[10055],[127381],[127379],[35,8419],[42,8419],[48,8419],[49,8419],[50,8419],[51,8419],[52,8419],[53,8419],[54,8419],[55,8419],[56,8419],[57,8419],[128287],[128290],[9654],[9208],[9199],[9209],[9210],[9197],[9198],[9194],[128256],[128257],[9193],[128258],[9664],[128316],[128317],[9195],[9196],[127385],[10145],[11013],[11014],[11015],[8599],[8600],[8601],[8598],[8596],[8618],[128260],[8617],[10548],[10549],[8505],[8597],[128292],[128289],[128288],[128291],[127925],[127926],[12336],[10175],[10004],[128259],[10133],[10134],[10135],[10006],[10160],[128178],[128177],[169,65039],[174,65039],[8482,65039],[128282],[128281],[128283],[128285],[128284],[9745],[128280],[9898],[9899],[128308],[128309],[128313],[128312],[128310],[128311],[128314],[9642],[9643],[9724],[9723],[128315],[11035],[11036],[9726],[9725],[128306],[128307],[128264],[128265],[128266],[128263],[128227],[128226],[128276],[126980],[128277],[127183],[9824],[9827],[9829],[9830],[127924],[128065,8205,128488],[128488],[128173],[128495],[128172],[128336],[128337],[128338],[128339],[128340],[128341],[128342],[128343],[128344],[128345],[128346],[128347],[128348],[128349],[128350],[128351],[128352],[128353],[128354],[128355],[128356],[128357],[128358],[128359],[127542],[127568],[127545],[127514],[127538],[127569],[127544],[127540],[127539],[12951,65039],[12953,65039],[127546],[127541]]},{name:h._("Drapeaux"),icon:[983041],emojis:[[127482,127480],[127462,127466],[127483,127475],[127462,127481],[127462,127482],[127487,127462],[127463,127466],[127463,127479],[127464,127462],[127464,127469],[127464,127473],[127464,127475],[127464,127476],[127465,127466],[127465,127472],[127466,127480],[127467,127470],[127467,127479],[127468,127463],[127469,127472],[127470,127465],[127470,127466],[127470,127473],[127470,127475],[127470,127481],[127471,127477],[127472,127479],[127474,127476],[127474,127485],[127474,127486],[127475,127473],[127475,127476],[127475,127487],[127477,127469],[127477,127473],[127477,127479],[127477,127481],[127479,127482],[127480,127462],[127480,127466],[127480,127468],[127481,127479]]}];f.exports={categories:i};}),null);
__d('ChatEmojiCategoryPicker.react',['cx','EmojiLikeConstants','EmojiLikeCxData','MessengerSupportedEmojiUtils','Grid.react','MercuryConfig','React'],(function a(b,c,d,e,f,g,h){'use strict';var i,j,k=c('Grid.react').GridItem,l=c('React').PropTypes;i=babelHelpers.inherits(m,c('React').PureComponent);j=i&&i.prototype;m.prototype.render=function(){return (c('React').createElement('div',{className:"_1uwv"},c('React').createElement(c('Grid.react'),{cols:this.props.categories.length},this.props.categories.map(function(n){return this.$ChatEmojiCategoryPicker1(n);}.bind(this)))));};m.prototype.$ChatEmojiCategoryPicker1=function(n){if(!c('MercuryConfig').MessengerNewEmojiGK)return null;var o=c('MessengerSupportedEmojiUtils').getNewEmojiData(String.fromCodePoint.apply(String,n.icon),c('EmojiLikeConstants').size.XSMALL);if(!o)return null;return (c('React').createElement(k,{className:(n.name==this.props.currentCategoryName?"_1uwz":'')+(' '+"_1uwx"),'data-hover':'tooltip','data-tooltip-content':n.name,key:n.name},c('React').createElement('div',{className:"_1uw-",onClick:function(){return this.props.onSelect(n);}.bind(this)},o.emoji)));};function m(){i.apply(this,arguments);}m.propTypes={categories:l.arrayOf(l.object).isRequired,currentCategoryName:l.string,onSelect:l.func.isRequired};f.exports=m;}),null);
__d('ChatEmojiPickerButton.react',['cx','fbt','Image.react','ImmutableObject','Keys','React','MessengerHotLikePreviewEvents','MessengerHotLikeUtils','MercuryMessageObject','MercuryTriodeSourceUtil','StickerConstants','setTimeoutAcrossTransitions'],(function a(b,c,d,e,f,g,h,i){'use strict';var j,k,l=c('MercuryMessageObject').get(),m=c('React').PropTypes;j=babelHelpers.inherits(n,c('React').PureComponent);k=j&&j.prototype;function n(){var o,p;for(var q=arguments.length,r=Array(q),s=0;s<q;s++)r[s]=arguments[s];return p=(o=k.constructor).call.apply(o,[this].concat(r)),this.$ChatEmojiPickerButton1=null,this.$ChatEmojiPickerButton2=null,this.$ChatEmojiPickerButton3=null,this.$ChatEmojiPickerButton5=function(t){t.stopPropagation();this.props.onClick(this.props.emojiData.emojiCodes,this.refs.div);}.bind(this),this.$ChatEmojiPickerButton8=function(t){if(t.keyCode===c('Keys').RETURN){t.preventDefault();this.props.onClick(this.props.emojiData.emojiCodes,this.refs.div);}}.bind(this),this.$ChatEmojiPickerButton6=function(t){t.preventDefault();t.stopPropagation();if(t.button!==0)return;if(!this.props.enableHotEmoji){this.$ChatEmojiPickerButton1=setTimeout(this.$ChatEmojiPickerButton9,1000);}else{this.$ChatEmojiPickerButton1=setTimeout(function(){this.$ChatEmojiPickerButton3=Date.now();this.$ChatEmojiPickerButton10();this.$ChatEmojiPickerButton11();}.bind(this),500);this.props.onMouseDown&&this.props.onMouseDown();}}.bind(this),this.$ChatEmojiPickerButton10=function(){this.$ChatEmojiPickerButton9();if(!this.props.threadID)return;var t=this.$ChatEmojiPickerButton12();c('MessengerHotLikePreviewEvents').emit(c('MessengerHotLikePreviewEvents').START,t,this.props.threadID,this.props.emojiData.emojiCodes);}.bind(this),this.$ChatEmojiPickerButton7=function(t){t.stopPropagation();clearTimeout(this.$ChatEmojiPickerButton1);if(this.props.enableHotEmoji){if(!(this.props.threadID&&this.$ChatEmojiPickerButton3))return;this.$ChatEmojiPickerButton3=0;this.$ChatEmojiPickerButton13();this.$ChatEmojiPickerButton14();}}.bind(this),this.$ChatEmojiPickerButton9=function(){this.props.onLongPress(this.props.emojiData.emojiCodes,this.refs.div);}.bind(this),this.$ChatEmojiPickerButton14=function(){if(!this.props.threadID)return;c('MessengerHotLikePreviewEvents').emit(c('MessengerHotLikePreviewEvents').STOP_EMOJI,this.props.threadID,true);}.bind(this),this.$ChatEmojiPickerButton15=function(){if(!this.props.threadID)return;c('MessengerHotLikePreviewEvents').emit(c('MessengerHotLikePreviewEvents').POP,this.props.threadID);}.bind(this),this.$ChatEmojiPickerButton11=function(){this.$ChatEmojiPickerButton13();this.$ChatEmojiPickerButton2=c('setTimeoutAcrossTransitions')(this.$ChatEmojiPickerButton15,c('MessengerHotLikeUtils').SizeTimes.large);}.bind(this),this.$ChatEmojiPickerButton13=function(){clearTimeout(this.$ChatEmojiPickerButton2);}.bind(this),this.$ChatEmojiPickerButton4=function(){if(this.$ChatEmojiPickerButton3){this.$ChatEmojiPickerButton3=0;this.$ChatEmojiPickerButton13();this.$ChatEmojiPickerButton15();}}.bind(this),p;}n.prototype.componentWillUnmount=function(){this.$ChatEmojiPickerButton4();clearTimeout(this.$ChatEmojiPickerButton1);clearTimeout(this.$ChatEmojiPickerButton2);};n.prototype.render=function(){return c('React').createElement('div',{'aria-label':i._("Choisir un emoji"),onClick:this.$ChatEmojiPickerButton5,onMouseDown:this.$ChatEmojiPickerButton6,onMouseLeave:this.$ChatEmojiPickerButton4,onMouseUp:this.$ChatEmojiPickerButton7,onKeyDown:this.$ChatEmojiPickerButton8,ref:'div',tabIndex:'1',role:'button'},c('React').createElement(c('Image.react'),{className:"_1lih _1ift _1ifu",style:{margin:0},src:this.props.emojiData.uri}));};n.prototype.$ChatEmojiPickerButton12=function(){if(!this.props.threadID)return null;var o=l.constructStickerMessageObject(c('StickerConstants').HOT_LIKE_SMALL_STICKER_ID,c('MercuryTriodeSourceUtil').getMercuryTriodeSource(),this.props.threadID);l.normalizeNewMessage(o);o.is_like_preview=true;o.like_preview_since=this.$ChatEmojiPickerButton3;o.customLike=this.props.emojiData;o.body='';return new (c('ImmutableObject'))(o);};n.propTypes={emojiData:m.object.isRequired,enableHotEmoji:m.bool,onClick:m.func.isRequired,onLongPress:m.func.isRequired,threadID:m.string};f.exports=n;}),null);
__d('ChatEmojiPicker.react',['cx','ChatEmojiPickerButton.react','ChatEmojiSkinToneSelector.react','EmojiActions','EmojiFormat','EmojiLikeConstants','EmojiLikeUtils','Grid.react','MercuryConfig','MessengerHotLikePreviewEvents','MessengerScrollableArea.react','MessengerSupportedEmojiUtils','React','SkinToneEmoji','SubscriptionsHandler'],(function a(b,c,d,e,f,g,h){'use strict';var i,j,k=c('Grid.react').GridItem,l=c('React').PropTypes;i=babelHelpers.inherits(m,c('React').PureComponent);j=i&&i.prototype;function m(){var n,o;for(var p=arguments.length,q=Array(p),r=0;r<p;r++)q[r]=arguments[r];return o=(n=j.constructor).call.apply(n,[this].concat(q)),this.$ChatEmojiPicker1=false,this.$ChatEmojiPicker2=null,this.state={clickedEmoji:null,selectedEmoji:[],toneSelectorShown:false,toneSelectorContext:null},this.componentDidMount=function(){this.$ChatEmojiPicker2=new (c('SubscriptionsHandler'))();this.$ChatEmojiPicker2.addSubscriptions(c('MessengerHotLikePreviewEvents').addListener(c('MessengerHotLikePreviewEvents').START,function(s,t,u){if(u&&this.props.useSkinToneSelector&&!c('SkinToneEmoji').hasVariations(u)&&this.state.toneSelectorShown)this.$ChatEmojiPicker3();}.bind(this)),c('MessengerHotLikePreviewEvents').addListener(c('MessengerHotLikePreviewEvents').FINISH_EMOJI_ANIMATION,function(s,t,u){if(s===this.props.threadID)if(u&&this.state.clickedEmoji&&this.props.sendCustomEmoji){this.props.sendCustomEmoji({emoji:c('EmojiFormat').codeArrayToUnicode(this.state.clickedEmoji)},u,c('EmojiLikeConstants').source.PICKER);this.setState({clickedEmoji:null});}}.bind(this)));}.bind(this),this.componentWillUnmount=function(){this.$ChatEmojiPicker2&&this.$ChatEmojiPicker2.release();}.bind(this),this.scrollToTop=function(s){this.refs.scrollable.scrollToTop(s);}.bind(this),this.$ChatEmojiPicker7=function(s){if(this.props.shouldSaveEmojiColorChoice){var t=c('SkinToneEmoji').getTone(s);c('EmojiActions').changeEmojiColor(t);}this.props.onSelect&&this.props.onSelect(s);}.bind(this),this.$ChatEmojiPicker8=function(s,t){this.setState({toneSelectorShown:true,selectedEmoji:s,toneSelectorContext:t});}.bind(this),this.$ChatEmojiPicker4=function(s,t){if(this.props.shouldSaveEmojiColorChoice&&this.props.useSkinToneSelector&&c('SkinToneEmoji').hasVariations(s)){this.$ChatEmojiPicker8(s,t);this.$ChatEmojiPicker1=false;}else if(this.$ChatEmojiPicker1){this.$ChatEmojiPicker1=false;}else this.$ChatEmojiPicker7(s);}.bind(this),this.$ChatEmojiPicker5=function(s,t){if(this.props.useSkinToneSelector&&c('SkinToneEmoji').hasVariations(s)){this.$ChatEmojiPicker8(s,t);}else this.setState({clickedEmoji:s});this.$ChatEmojiPicker1=true;}.bind(this),this.$ChatEmojiPicker6=function(){if(!this.$ChatEmojiPicker1)this.$ChatEmojiPicker3();}.bind(this),this.$ChatEmojiPicker3=function(){this.setState({toneSelectorShown:false});}.bind(this),o;}m.prototype.render=function(){var n=this.props.emojiChoices.map(function(o){var p=String.fromCodePoint.apply(String,o),q=c('MercuryConfig').MessengerNewEmojiGK?c('MessengerSupportedEmojiUtils').getUrl(c('EmojiFormat').codeArrayToCodeString(o),c('EmojiLikeConstants').size.SMALL):c('EmojiLikeUtils').getURI(p,c('EmojiLikeConstants').size.SMALL),r=c('MercuryConfig').WebHotEmojiGK&&(this.props.enableHotEmoji||!c('SkinToneEmoji').hasVariations(o));return q?c('React').createElement(k,{key:o.join('_'),className:"_3-sy"},c('React').createElement('div',{className:(p===this.props.currentEmoji?"_4rlt":'')+(' '+"_4rlu")},c('React').createElement(c('ChatEmojiPickerButton.react'),{emojiData:{emojiCodes:o,uri:q},enableHotEmoji:r,onClick:this.$ChatEmojiPicker4,onLongPress:this.$ChatEmojiPicker5,threadID:this.props.threadID}))):null;}.bind(this)).filter(function(o){return !!o;});return c('React').createElement(c('MessengerScrollableArea.react'),{className:this.props.className,height:this.props.height,onScroll:this.$ChatEmojiPicker3,ref:'scrollable'},c('React').createElement(c('Grid.react'),{cols:this.props.columns,className:"_3-s_"},n),this.props.useSkinToneSelector?c('React').createElement(c('ChatEmojiSkinToneSelector.react'),{context:this.state.toneSelectorContext,emojiCodes:this.state.selectedEmoji,onBlur:this.$ChatEmojiPicker6,onSelect:this.$ChatEmojiPicker7,sendCustomEmoji:this.props.sendCustomEmoji,shouldSaveEmojiColorChoice:this.props.shouldSaveEmojiColorChoice,shown:this.state.toneSelectorShown,threadID:this.props.threadID}):null);};m.propTypes={className:l.string,columns:l.number,currentEmoji:l.string,emojiChoices:l.arrayOf(l.arrayOf(l.number)).isRequired,enableHotEmoji:l.bool,height:l.string,onSelect:l.func,sendCustomEmoji:l.func,shouldSaveEmojiColorChoice:l.bool,threadID:l.string,useSkinToneSelector:l.bool};m.defaultProps={columns:7,useSkinToneSelector:false};f.exports=m;}),null);
__d('ChatEmojiSkinToneFlyout.react',['cx','fbt','ChatEmojiPicker.react','MessengerEmojiConfig','React','SkinToneEmoji'],(function a(b,c,d,e,f,g,h,i){'use strict';var j,k,l=c('React').PropTypes;j=babelHelpers.inherits(m,c('React').PureComponent);k=j&&j.prototype;m.prototype.render=function(){var n,o=this,p=[];if(this.props.emojiCodes.length>0)(function(){var r=c('SkinToneEmoji').removeTone(o.props.emojiCodes);p=c('MessengerEmojiConfig').emoji_colors.map(function(s){return (c('SkinToneEmoji').applyTone(r,s));});})();var q=null;if(this.props.shouldSaveEmojiColorChoice)q=c('React').createElement('div',{className:"_4gww"},i._("Choisissez-en un. Vous pouvez le changer \u00e0 tout moment dans les param\u00e8tres."));return (c('React').createElement('div',null,q,c('React').createElement(c('ChatEmojiPicker.react'),{className:this.props.className,columns:6,emojiChoices:p,enableHotEmoji:true,onSelect:this.props.onSelect,sendCustomEmoji:this.props.sendCustomEmoji,threadID:this.props.threadID})));};function m(){j.apply(this,arguments);}m.propTypes={className:l.string,emojiCodes:l.arrayOf(l.number).isRequired,onSelect:l.func.isRequired,sendCustomEmoji:l.func,shouldSaveEmojiColorChoice:l.bool,threadID:l.string};f.exports=m;}),null);
__d('ChatEmojiSkinToneSelector.react',['cx','ChatEmojiSkinToneFlyout.react','ContextualLayerAutoFlip','React','XUIContextualDialog.react','emptyFunction'],(function a(b,c,d,e,f,g,h){'use strict';var i,j,k=c('React').PropTypes,l=220;i=babelHelpers.inherits(m,c('React').PureComponent);j=i&&i.prototype;m.prototype.render=function(){return (c('React').createElement(c('XUIContextualDialog.react'),{behaviors:{ContextualLayerAutoFlip:c('ContextualLayerAutoFlip')},context:this.props.context,contextRef:c('emptyFunction'),onBlur:this.props.onBlur,onToggle:this.$ChatEmojiSkinToneSelector1,shown:this.props.shown,width:l},c('React').createElement(c('ChatEmojiSkinToneFlyout.react'),{className:"_2ejf",emojiCodes:this.props.emojiCodes,onSelect:this.props.onSelect,sendCustomEmoji:this.props.sendCustomEmoji,shouldSaveEmojiColorChoice:this.props.shouldSaveEmojiColorChoice,threadID:this.props.threadID})));};function m(){i.apply(this,arguments);}m.propTypes={context:k.instanceOf(HTMLElement),emojiCodes:k.arrayOf(k.number).isRequired,onBlur:k.func.isRequired,onSelect:k.func.isRequired,sendCustomEmoji:k.func,shouldSaveEmojiColorChoice:k.bool,shown:k.bool,threadID:k.string};f.exports=m;}),null);
__d('ChatEmojiSkinTonePreferencePicker.react',['ChatEmojiPicker.react','MessengerEmojiConfig','React','SkinToneEmoji'],(function a(b,c,d,e,f,g){'use strict';var h,i,j=c('React').PropTypes,k=128077;h=babelHelpers.inherits(l,c('React').PureComponent);i=h&&h.prototype;function l(){var m,n;for(var o=arguments.length,p=Array(o),q=0;q<o;q++)p[q]=arguments[q];return n=(m=i.constructor).call.apply(m,[this].concat(p)),this.$ChatEmojiSkinTonePreferencePicker1=function(r){var s=c('SkinToneEmoji').getTone(r);this.props.onSelect&&this.props.onSelect(s);}.bind(this),n;}l.prototype.render=function(){var m=null;try{m=this.props.currentPreference?String.fromCodePoint.apply(String,c('SkinToneEmoji').applyTone([k],this.props.currentPreference)):String.fromCodePoint(k);}catch(n){m=String.fromCodePoint(k);}return c('React').createElement(c('ChatEmojiPicker.react'),{className:this.props.className,columns:this.props.columns,currentEmoji:m,emojiChoices:c('MessengerEmojiConfig').emoji_colors.map(function(o){return c('SkinToneEmoji').applyTone([k],o);}),onSelect:this.$ChatEmojiSkinTonePreferencePicker1});};l.propTypes={className:j.string,columns:j.number,currentPreference:j.number,onSelect:j.func};l.defaultProps={columns:6};f.exports=l;}),null);
__d('ChatEmojiFlyout.react',['cx','fbt','ChatEmojiCategories','ChatEmojiCategoryPicker.react','ChatEmojiPicker.react','ChatEmojiSkinTonePreferencePicker.react','ChatFlyoutPlaceholder.react','EmojiActions','EmojiState','EmojiStateStore','Keys','MessengerButton.react','MessengerSettingsActions','MessengerSupportedEmoji','ReactComponentWithPureRenderMixin','React','SkinToneEmoji','StoreAndPropBasedStateMixin','EmojiDispatcher'],(function a(b,c,d,e,f,g,h,i){'use strict';var j=c('React').PropTypes,k=50,l=c('React').createClass({displayName:'ChatEmojiFlyout',mixins:[c('StoreAndPropBasedStateMixin')(c('EmojiStateStore'))],statics:{calculateState:function m(n){var o=c('EmojiStateStore').getState(),p=o.currentCategory?o.currentCategory:c('ChatEmojiCategories').categories[0];return {currentCategory:p,dataReady:o.trayDataReady,emojiColorPref:o.emojiColor,mruCategory:o.mruCategory};}},propTypes:{onEscKeyDown:j.func,onCategorySelect:j.func,onSelect:j.func.isRequired,sendCustomEmoji:j.func,threadID:j.string},getDefaultProps:function m(){return {};},componentWillMount:function m(){c('EmojiDispatcher').explicitlyRegisterStores([c('EmojiStateStore')]);},componentDidMount:function m(){this._onShown();if(this.state.emojiColorPref===undefined)c('EmojiActions').getEmojiColor();},render:function m(){if(!this.state.dataReady||this.state.emojiColorPref===undefined)return c('React').createElement(c('ChatFlyoutPlaceholder.react'),null);return (c('React').createElement('div',{className:"_4pi8",onKeyDown:this._handleKeyDown},this._renderBody()));},_renderBody:function m(){return this._renderPicker();},_renderPicker:function m(){var n=this.state.mruCategory?this.state.mruCategory.concat(c('ChatEmojiCategories').categories):c('ChatEmojiCategories').categories,o=this.state.emojiColorPref;if(!o||o<0)o=0;return (c('React').createElement('div',{className:"_4pi9"},c('React').createElement(c('ChatEmojiPicker.react'),{className:"_4pia",columns:6,emojiChoices:this.state.currentCategory.emojis.map(function(p){if(o!=0&&c('SkinToneEmoji').hasVariations(p))return c('SkinToneEmoji').applyTone(p,o);return p;}),height:'90%',onSelect:this.props.onSelect,ref:'picker',sendCustomEmoji:this.props.sendCustomEmoji,shouldSaveEmojiColorChoice:!!(this.state.emojiColorPref&&this.state.emojiColorPref<0),threadID:this.props.threadID,useSkinToneSelector:true}),c('React').createElement(c('ChatEmojiCategoryPicker.react'),{categories:n,currentCategoryName:this.state.currentCategory.name,height:k,onSelect:this._handleSelectCategory,width:this.props.width})));},_onShown:function m(){if(!this.state.dataReady)this._loadTrayData();},_loadTrayData:function m(){c('EmojiState').onTrayDataReady(function(){});},_handleChooseEmojiColor:function m(n){c('EmojiActions').changeEmojiColor(n);},_handleKeyDown:function m(n){if(n.keyCode===c('Keys').ESC&&this.props.onEscKeyDown)this.props.onEscKeyDown();},_handleSelectCategory:function m(n){c('EmojiActions').changeCurrentCategory(n);this.refs.picker.scrollToTop();this.props.onCategorySelect&&this.props.onCategorySelect();}});f.exports=l;}),null);
__d('MessengerChangeEmojiDialog.react',['cx','fbt','ChatEmojiCategories','ChatEmojiCategoryPicker.react','ChatEmojiPicker.react','EmojiFormat','EmojiLikeConstants','MessagingThreadCustomizationConfig','MessengerActions','MessengerDialog.react','messengerDialogBodyReact','MessengerDialogCancelButton.react','MessengerDialogFooter.react','MessengerDialogHeader.react','React'],(function a(b,c,d,e,f,g,h,i){'use strict';var j,k,l=c('messengerDialogBodyReact').comp,m=50,n=335,o=c('React').PropTypes;j=babelHelpers.inherits(p,c('React').PureComponent);k=j&&j.prototype;function p(r){k.constructor.call(this,r);q.call(this);var s=[c('EmojiLikeConstants').FB_THUMBS_UP_EMOJI].concat(c('MessagingThreadCustomizationConfig').emojiChoiceCodes.map(function(u){return c('EmojiFormat').codeStringToCodeArray(u);})),t={name:i._("Recommand\u00e9s"),emojis:s,icon:c('EmojiLikeConstants').FB_THUMBS_UP_EMOJI};this.state={categories:[t].concat(c('ChatEmojiCategories').categories),currentCategory:t};}p.prototype.render=function(){return (c('React').createElement(c('MessengerDialog.react'),{onToggle:this.$MessengerChangeEmojiDialog1,className:"_-lj",width:n},c('React').createElement(c('MessengerDialogHeader.react'),null,i._("Choisissez un emoji pour cette conversation")),c('React').createElement(l,{className:"_-lk"},c('React').createElement('div',{className:"_5bxm"},i._("Tous les participants de cette conversation le verront.")),c('React').createElement(c('ChatEmojiPicker.react'),{currentEmoji:this.props.currentEmoji,emojiChoices:this.state.currentCategory.emojis.filter(function(r){return r.length<=2;}),onSelect:this.$MessengerChangeEmojiDialog2,ref:'picker'}),c('React').createElement(c('ChatEmojiCategoryPicker.react'),{categories:this.state.categories,currentCategoryName:this.state.currentCategory.name,height:m,onSelect:this.$MessengerChangeEmojiDialog3,width:n})),c('React').createElement(c('MessengerDialogFooter.react'),null,c('React').createElement(c('MessengerDialogCancelButton.react'),null))));};p.propTypes={currentEmoji:o.string.isRequired,onSave:o.func,onClose:o.func};var q=function r(){this.$MessengerChangeEmojiDialog2=function(s){var t=String.fromCodePoint.apply(String,s);if(t!=this.props.currentEmoji)this.props.onSave&&this.props.onSave(s);this.$MessengerChangeEmojiDialog1(false);}.bind(this);this.$MessengerChangeEmojiDialog3=function(s){this.refs.picker.scrollToTop();this.setState({currentCategory:s});}.bind(this);this.$MessengerChangeEmojiDialog1=function(s){if(!s){this.props.onClose&&this.props.onClose();c('MessengerActions').hideDialog();}}.bind(this);};f.exports=p;}),null);