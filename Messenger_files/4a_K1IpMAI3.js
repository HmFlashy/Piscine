if (self.CavalryLogger) { CavalryLogger.start_js(["wYHjU"]); }

__d('PriorityJobQueue',['Promise','Map'],(function a(b,c,d,e,f,g){'use strict';var h=1;function i(j){this.$PriorityJobQueue2=new (c('Map'))();this.$PriorityJobQueue3=new (c('Map'))();this.$PriorityJobQueue4=false;this.$PriorityJobQueue5=new (c('Map'))();this.$PriorityJobQueue8=function(){var k=this.$PriorityJobQueue3.size,l=Date.now();if(k<this.$PriorityJobQueue1){var m=this.$PriorityJobQueue1-k,n=Array.from(this.$PriorityJobQueue2.values());n.sort(function(q,r){return r.job.getPriority(l-r.timeQueued)-q.job.getPriority(l-q.timeQueued);});var o=this.$PriorityJobQueue2.size;for(var p=0;p<Math.min(o,m);p++)this.$PriorityJobQueue9(n[p]);}this.$PriorityJobQueue4=false;}.bind(this);this.$PriorityJobQueue1=j||h;}i.prototype.$PriorityJobQueue6=function(j){this.$PriorityJobQueue3['delete'](j);this.$PriorityJobQueue7();};i.prototype.$PriorityJobQueue7=function(){if(!this.$PriorityJobQueue4){this.$PriorityJobQueue4=true;c('Promise').resolve().then(this.$PriorityJobQueue8).done();}};i.prototype.$PriorityJobQueue9=function(j){var k=j.job,l=k.getJobID();this.$PriorityJobQueue2['delete'](l);this.$PriorityJobQueue3.set(l,j);k.getPromise().then(function(){return this.$PriorityJobQueue6(l);}.bind(this))['catch']();var m=this.$PriorityJobQueue5.get(l);m&&m();this.$PriorityJobQueue5['delete'](l);k.start();};i.prototype.enqueue=function(j,k){var l={job:j,timeQueued:Date.now()},m=j.getJobID();this.$PriorityJobQueue2.set(m,l);if(k)this.$PriorityJobQueue5.set(m,k);this.$PriorityJobQueue7();return this;};i.prototype.abort=function(j){this.$PriorityJobQueue2['delete'](j);var k=this.$PriorityJobQueue3.get(j);if(k){k.job.abort();this.$PriorityJobQueue3['delete'](j);this.$PriorityJobQueue7();}};i.get=function(){if(!i.$PriorityJobQueue10)i.$PriorityJobQueue10=new i(h);return i.$PriorityJobQueue10;};f.exports=i;}),null);
__d('VideoPlayerShakaBandwidthEstimator',['CacheStorage','requireWeak','Run','VideoPlayerShakaExperiments'],(function a(b,c,d,e,f,g){var h=void 0;c('requireWeak')('Shaka',function(l){h=l.util.EWMACacheBandwidthEstimator;});var i=null,j=false;function k(){'use strict';var l=new (c('CacheStorage'))('localstorage','_video_'),m=l.get('bandwidthEstimate');this.$VideoPlayerShakaBandwidthEstimator1={isMockObject:true,getBandwidth:function n(){return m;},getFastMovingBandwidth:function n(){return m;}};if(h){this.$VideoPlayerShakaBandwidthEstimator1=new h(c('VideoPlayerShakaExperiments').cacheDelay,c('VideoPlayerShakaExperiments').cacheBandwidth,c('VideoPlayerShakaExperiments').useStoredBandwidthEstimate?m:undefined);this.$VideoPlayerShakaBandwidthEstimator1.isMockObject=false;}c('Run').onUnload(function(){l.set('bandwidthEstimate',this.$VideoPlayerShakaBandwidthEstimator1.getBandwidth());}.bind(this));}k.prototype.getEstimator=function(){'use strict';return this.$VideoPlayerShakaBandwidthEstimator1;};k.getInstance=function(){'use strict';if(i===null||i.getEstimator().isMockObject&&h)i=new k();return i;};k.getEstimator=function(){'use strict';return k.getInstance().getEstimator();};k.isAutoplayBandwidthRestrained=function(l){'use strict';var m=k.getEstimator(),n=void 0;if(c('VideoPlayerShakaExperiments').blockAutoplayUseFastMovingAverage&&j){n=m.getFastMovingBandwidth();}else n=m.getBandwidth();var o=l?c('VideoPlayerShakaExperiments').liveBlockAutoplayBandwidthThreshold:c('VideoPlayerShakaExperiments').blockAutoplayBandwidthThreshold;if(n===null||n>o){j=false;}else j=true;return j;};f.exports=k;}),null);
__d("regeneratorRuntime",["Promise"],(function a(b,c,d,e,f,g){"use strict";var h=Object.prototype.hasOwnProperty,i=typeof Symbol==="function"&&(typeof Symbol==="function"?Symbol.iterator:"@@iterator")||"@@iterator",j=f.exports;function k(ea,fa,ga,ha){var ia=Object.create((fa||r).prototype),ja=new ba(ha||[]);ia._invoke=y(ea,ga,ja);return ia;}j.wrap=k;function l(ea,fa,ga){try{return {type:"normal",arg:ea.call(fa,ga)};}catch(ha){return {type:"throw",arg:ha};}}var m="suspendedStart",n="suspendedYield",o="executing",p="completed",q={};function r(){}function s(){}function t(){}var u=t.prototype=r.prototype;s.prototype=u.constructor=t;t.constructor=s;s.displayName="GeneratorFunction";function v(ea){["next","throw","return"].forEach(function(fa){ea[fa]=function(ga){return this._invoke(fa,ga);};});}j.isGeneratorFunction=function(ea){var fa=typeof ea==="function"&&ea.constructor;return fa?fa===s||(fa.displayName||fa.name)==="GeneratorFunction":false;};j.mark=function(ea){if(Object.setPrototypeOf){Object.setPrototypeOf(ea,t);}else Object.assign(ea,t);ea.prototype=Object.create(u);return ea;};j.awrap=function(ea){return new w(ea);};function w(ea){this.arg=ea;}function x(ea){function fa(la,ma){var na=ea[la](ma),oa=na.value;return oa instanceof w?c("Promise").resolve(oa.arg).then(ga,ha):c("Promise").resolve(oa).then(function(pa){na.value=pa;return na;});}if(typeof process==="object"&&process.domain)fa=process.domain.bind(fa);var ga=fa.bind(ea,"next"),ha=fa.bind(ea,"throw"),ia=fa.bind(ea,"return"),ja;function ka(la,ma){var na=ja?ja.then(function(){return fa(la,ma);}):new (c("Promise"))(function(oa){oa(fa(la,ma));});ja=na["catch"](function(oa){});return na;}this._invoke=ka;}v(x.prototype);j.async=function(ea,fa,ga,ha){var ia=new x(k(ea,fa,ga,ha));return j.isGeneratorFunction(fa)?ia:ia.next().then(function(ja){return ja.done?ja.value:ia.next();});};function y(ea,fa,ga){var ha=m;return function ia(ja,ka){if(ha===o)throw new Error("Generator is already running");if(ha===p){if(ja==="throw")throw ka;return da();}while(true){var la=ga.delegate;if(la){if(ja==="return"||ja==="throw"&&la.iterator[ja]===undefined){ga.delegate=null;var ma=la.iterator["return"];if(ma){var na=l(ma,la.iterator,ka);if(na.type==="throw"){ja="throw";ka=na.arg;continue;}}if(ja==="return")continue;}var na=l(la.iterator[ja],la.iterator,ka);if(na.type==="throw"){ga.delegate=null;ja="throw";ka=na.arg;continue;}ja="next";ka=undefined;var oa=na.arg;if(oa.done){ga[la.resultName]=oa.value;ga.next=la.nextLoc;}else{ha=n;return oa;}ga.delegate=null;}if(ja==="next"){if(ha===n){ga.sent=ka;}else ga.sent=undefined;}else if(ja==="throw"){if(ha===m){ha=p;throw ka;}if(ga.dispatchException(ka)){ja="next";ka=undefined;}}else if(ja==="return")ga.abrupt("return",ka);ha=o;var na=l(ea,fa,ga);if(na.type==="normal"){ha=ga.done?p:n;var oa={value:na.arg,done:ga.done};if(na.arg===q){if(ga.delegate&&ja==="next")ka=undefined;}else return oa;}else if(na.type==="throw"){ha=p;ja="throw";ka=na.arg;}}};}v(u);u[i]=function(){return this;};u.toString=function(){return "[object Generator]";};function z(ea){var fa={tryLoc:ea[0]};if(1 in ea)fa.catchLoc=ea[1];if(2 in ea){fa.finallyLoc=ea[2];fa.afterLoc=ea[3];}this.tryEntries.push(fa);}function aa(ea){var fa=ea.completion||{};fa.type="normal";delete fa.arg;ea.completion=fa;}function ba(ea){this.tryEntries=[{tryLoc:"root"}];ea.forEach(z,this);this.reset(true);}j.keys=function(ea){var fa=[];for(var ga in ea)fa.push(ga);fa.reverse();return function ha(){while(fa.length){var ia=fa.pop();if(ia in ea){ha.value=ia;ha.done=false;return ha;}}ha.done=true;return ha;};};function ca(ea){if(ea){var fa=ea[i];if(fa)return fa.call(ea);if(typeof ea.next==="function")return ea;if(!isNaN(ea.length)){var ga=-1,ha=function ia(){while(++ga<ea.length)if(h.call(ea,ga)){ia.value=ea[ga];ia.done=false;return ia;}ia.value=undefined;ia.done=true;return ia;};return ha.next=ha;}}return {next:da};}j.values=ca;function da(){return {value:undefined,done:true};}ba.prototype={constructor:ba,reset:function ea(fa){this.prev=0;this.next=0;this.sent=undefined;this.done=false;this.delegate=null;this.tryEntries.forEach(aa);if(!fa)for(var ga in this)if(ga.charAt(0)==="t"&&h.call(this,ga)&&!isNaN(+ga.slice(1)))this[ga]=undefined;},stop:function ea(){this.done=true;var fa=this.tryEntries[0],ga=fa.completion;if(ga.type==="throw")throw ga.arg;return this.rval;},dispatchException:function ea(fa){if(this.done)throw fa;var ga=this;function ha(na,oa){ka.type="throw";ka.arg=fa;ga.next=na;return !!oa;}for(var ia=this.tryEntries.length-1;ia>=0;--ia){var ja=this.tryEntries[ia],ka=ja.completion;if(ja.tryLoc==="root")return ha("end");if(ja.tryLoc<=this.prev){var la=h.call(ja,"catchLoc"),ma=h.call(ja,"finallyLoc");if(la&&ma){if(this.prev<ja.catchLoc){return ha(ja.catchLoc,true);}else if(this.prev<ja.finallyLoc)return ha(ja.finallyLoc);}else if(la){if(this.prev<ja.catchLoc)return ha(ja.catchLoc,true);}else if(ma){if(this.prev<ja.finallyLoc)return ha(ja.finallyLoc);}else throw new Error("try statement without catch or finally");}}},abrupt:function ea(fa,ga){for(var ha=this.tryEntries.length-1;ha>=0;--ha){var ia=this.tryEntries[ha];if(ia.tryLoc<=this.prev&&h.call(ia,"finallyLoc")&&this.prev<ia.finallyLoc){var ja=ia;break;}}if(ja&&(fa==="break"||fa==="continue")&&ja.tryLoc<=ga&&ga<=ja.finallyLoc)ja=null;var ka=ja?ja.completion:{};ka.type=fa;ka.arg=ga;if(ja){this.next=ja.finallyLoc;}else this.complete(ka);return q;},complete:function ea(fa,ga){if(fa.type==="throw")throw fa.arg;if(fa.type==="break"||fa.type==="continue"){this.next=fa.arg;}else if(fa.type==="return"){this.rval=fa.arg;this.next="end";}else if(fa.type==="normal"&&ga)this.next=ga;},finish:function ea(fa){for(var ga=this.tryEntries.length-1;ga>=0;--ga){var ha=this.tryEntries[ga];if(ha.finallyLoc===fa){this.complete(ha.completion,ha.afterLoc);aa(ha);return q;}}},"catch":function ea(fa){for(var ga=this.tryEntries.length-1;ga>=0;--ga){var ha=this.tryEntries[ga];if(ha.tryLoc===fa){var ia=ha.completion;if(ia.type==="throw"){var ja=ia.arg;aa(ha);}return ja;}}throw new Error("illegal catch attempt");},delegateYield:function ea(fa,ga,ha){this.delegate={iterator:ca(fa),resultName:ga,nextLoc:ha};return q;}};}),null);
__d('VideoDashPrefetchCache',['regeneratorRuntime','Map','PriorityJobQueue','Run','URI','VideoPlayerShakaBandwidthEstimator','VideoPlayerShakaExperiments','XHRRequest','getCrossOriginTransport'],(function a(b,c,d,e,f,g){var h=null,i=c('VideoPlayerShakaExperiments').prefetchCacheUseNativePromise?window.Promise:Promise;function j(){'use strict';this.$Deferred1=false;this.$Deferred2=new i(function(p,q){this.$Deferred3=p;this.$Deferred4=q;}.bind(this));}j.prototype.getPromise=function(){'use strict';return this.$Deferred2;};j.prototype.resolve=function(p){'use strict';this.$Deferred1=true;this.$Deferred3(p);};j.prototype.reject=function(p){'use strict';this.$Deferred1=true;this.$Deferred4(p);};j.prototype['catch']=function(){'use strict';return i.prototype['catch'].apply(this.$Deferred2,arguments);};j.prototype.then=function(){'use strict';return i.prototype.then.apply(this.$Deferred2,arguments);};j.prototype.done=function(){'use strict';var p=arguments.length?this.$Deferred2.then.apply(this.$Deferred2,arguments):this.$Deferred2;p.then(undefined,function(q){setTimeout(function(){throw q;},0);});};j.prototype.isSettled=function(){'use strict';return this.$Deferred1;};function k(p,q){var r=new Error(p.errorMsg);r.name=p.errorType;r.type='preload';r.url=q;r.status=p.errorCode;return r;}function l(p){var q=new (c('URI'))(p.url),r=q.getDomain();return r.endsWith('fbcdn.net')&&!r.startsWith('interncache')&&!r.endsWith('ak.fbcdn.net');}function m(p,q,r){return {response:p.slice(q.start+0,q.end+1),responseTime:r};}function n(p,q,r){'use strict';this.$UrlRequestJob1=p;this.$UrlRequestJob2=q;this.$UrlRequestJob5=r;var s=new (c('XHRRequest'))(this.$UrlRequestJob2).setMethod('GET').setResponseType('arraybuffer').setTransportBuilder(c('getCrossOriginTransport'));this.$UrlRequestJob3=new i(function(t,u){s.setErrorHandler(function(v){u(k(v,this.$UrlRequestJob2));}.bind(this));s.setResponseHandler(function(v){s.response=v;t(s);});s.setAbortHandler(function(){u(this.$UrlRequestJob3,new Error('Request promise aborted'));}.bind(this));}.bind(this));this.$UrlRequestJob4=s;}n.prototype.getUrl=function(){'use strict';return this.$UrlRequestJob2;};n.prototype.getPromise=function(){'use strict';return this.$UrlRequestJob3;};n.prototype.start=function(){'use strict';this.$UrlRequestJob4.send();};n.prototype.abort=function(){'use strict';this.$UrlRequestJob4.abort();};n.prototype.getPriority=function(p){'use strict';return 1/Math.min(this.$UrlRequestJob5,1)/Math.min(p,1);};n.prototype.getJobID=function(){'use strict';return this.$UrlRequestJob1;};function o(){'use strict';this.$VideoDashPrefetchCache1=new (c('Map'))();this.$VideoDashPrefetchCache2=new (c('Map'))();this.$VideoDashPrefetchCache3=[];this.$VideoDashPrefetchCache4=[];this.$VideoDashPrefetchCache5=0;this.$VideoDashPrefetchCache6=c('VideoPlayerShakaExperiments').maxPrefetchVideosNum;this.$VideoDashPrefetchCache7=c('VideoPlayerShakaExperiments').consolidateFragmentedPrefetchRequest;}o.prototype.$VideoDashPrefetchCache8=function(p){'use strict';var q=new (c('URI'))(p);if(q.getDomain()){q=q.removeQueryData(['oh']);q=q.removeQueryData('__gda__');for(var r=Object.keys(q.getQueryData()),s=Array.isArray(r),t=0,r=s?r:r[typeof Symbol==='function'?Symbol.iterator:'@@iterator']();;){var u;if(s){if(t>=r.length)break;u=r[t++];}else{t=r.next();if(t.done)break;u=t.value;}var v=u;if(v.startsWith('_nc'))q=q.removeQueryData(v);}return q.toString();}return p;};o.prototype.$VideoDashPrefetchCache9=function(p){var q=arguments.length<=1||arguments[1]===undefined?{}:arguments[1],r=arguments.length<=2||arguments[2]===undefined?0:arguments[2];'use strict';var s=p;if(Object.keys(q))s=new (c('URI'))(p).addQueryData(q);var t=new (c('XHRRequest'))(s).setMethod('GET').setResponseType('arraybuffer').setTransportBuilder(c('getCrossOriginTransport')),u=new i(function(v,w){t.setErrorHandler(function(x){this.$VideoDashPrefetchCache10(t);w(k(x,s));}.bind(this));t.setResponseHandler(function(x){t.response=x;this.$VideoDashPrefetchCache10(t);v(t);}.bind(this));t.setAbortHandler(function(){w(u,new Error('Request promise aborted'));});}.bind(this));this.$VideoDashPrefetchCache11(p,u,r);this.$VideoDashPrefetchCache12(p,u);this.$VideoDashPrefetchCache3.push(t);t.send();return u;};o.prototype.$VideoDashPrefetchCache11=function(p,q){var r=arguments.length<=2||arguments[2]===undefined?3600000:arguments[2];'use strict';this.$VideoDashPrefetchCache13(p);if(r>0)this.$VideoDashPrefetchCache2.set(this.$VideoDashPrefetchCache8(p),setTimeout(function(){return this.$VideoDashPrefetchCache13(p);}.bind(this),r));this.$VideoDashPrefetchCache12(p,q);};o.prototype.genPrfetchMpdNow=function p(q,r,s){var t,u;return c('regeneratorRuntime').async(function v(w){while(1)switch(w.prev=w.next){case 0:'use strict';if(!this.has(r)){w.next=3;break;}return w.abrupt('return',null);case 3:t=s.getURL();u=new n(q,t,0);this.$VideoDashPrefetchCache11(r,u.getPromise());u.start();w.next=9;return c('regeneratorRuntime').awrap(u.getPromise());case 9:return w.abrupt('return',null);case 10:case 'end':return w.stop();}},null,this);};o.prototype.queueRequestFromMouseMovement=function(p,q,r,s,t){var u=arguments.length<=5||arguments[5]===undefined?function(){}:arguments[5],v=arguments.length<=6||arguments[6]===undefined?function(){}:arguments[6];'use strict';var w=c('PriorityJobQueue').get(),x=this.$VideoDashPrefetchCache14(q);if(x){x.then(v).done();return;}var y=r.getURL(),z=new n(p,y,s);z.getPromise().then(v)['catch'](function(){return this.getAndDelete(q);}.bind(this));w.enqueue(z,function(){this.$VideoDashPrefetchCache11(q,z.getPromise(),t);u();}.bind(this));};o.prototype.cancelRequestFromMouseMovement=function(p){'use strict';c('PriorityJobQueue').get().abort(p);};o.prototype.$VideoDashPrefetchCache13=function(p,q){'use strict';this.getAndDelete(p,q);if(this.$VideoDashPrefetchCache2.has(p)){clearTimeout(this.$VideoDashPrefetchCache2.get(p));this.$VideoDashPrefetchCache2['delete'](p);}};o.prototype.$VideoDashPrefetchCache15=function(p){'use strict';var q=[];for(var r=0;r<p.length;r++){var s=o.createQueryStringURL(p[r]);if(!this.has(s))q.push(this.$VideoDashPrefetchCache9(s));}return q;};o.prototype.$VideoDashPrefetchCache16=function(p){'use strict';var q=o.getConsolidatedURL(p);if(q==null)return this.$VideoDashPrefetchCache15(p);var r=new (c('XHRRequest'))(q).setMethod('GET').setResponseType('arraybuffer').setTransportBuilder(c('getCrossOriginTransport')),s=Date.now(),t=[];for(var u=0;u<p.length;u++){var v=o.createQueryStringURL(p[u]),w=new j();if(!this.has(v))this.$VideoDashPrefetchCache12(v,w.getPromise());t.push(w);}r.setErrorHandler(function(x){this.$VideoDashPrefetchCache10(r);for(var y=0;y<t.length;y++)t[y].reject(k(x,q));}.bind(this));r.setResponseHandler(function(x){var y=Date.now()-s;for(var z=0;z<p.length;z++){var aa=t[z],ba=p[z];aa.resolve(m(x,ba,y));}this.$VideoDashPrefetchCache10(r);}.bind(this));r.setAbortHandler(function(){for(var x=0;x<p.length;x++){var y=t[x];y.reject(new Error('Request aborted.'));}});this.$VideoDashPrefetchCache3.push(r);r.send();return t.map(function(x){return x.getPromise();});};o.prototype.$VideoDashPrefetchCache17=function(p){'use strict';this.$VideoDashPrefetchCache5++;var q=this.$VideoDashPrefetchCache7?this.$VideoDashPrefetchCache16(p.video):this.$VideoDashPrefetchCache15(p.video),r=this.$VideoDashPrefetchCache7?this.$VideoDashPrefetchCache16(p.audio):this.$VideoDashPrefetchCache15(p.audio),s=this.$VideoDashPrefetchCache15(p.manifest),t=q.concat(r,s);i.all(t).then(function(){return this.$VideoDashPrefetchCache18();}.bind(this))['catch'](function(){return this.$VideoDashPrefetchCache18();}.bind(this));};o.prototype.$VideoDashPrefetchCache12=function(p,q){'use strict';p=this.$VideoDashPrefetchCache8(p);if(this.$VideoDashPrefetchCache1.values().next().done)c('Run').onLeave(function(){for(var r=0;r<this.$VideoDashPrefetchCache3.length;r++)this.$VideoDashPrefetchCache3[r].abort();this.$VideoDashPrefetchCache3=[];this.$VideoDashPrefetchCache4=[];this.$VideoDashPrefetchCache5=0;this.$VideoDashPrefetchCache1.clear();}.bind(this));this.$VideoDashPrefetchCache1.set(p,q);};o.prototype.$VideoDashPrefetchCache10=function(p){'use strict';var q=this.$VideoDashPrefetchCache3.indexOf(p);if(q>-1)this.$VideoDashPrefetchCache3.splice(q,1);};o.prototype.$VideoDashPrefetchCache18=function(){'use strict';this.$VideoDashPrefetchCache5--;var p=this.$VideoDashPrefetchCache4.shift();if(p)this.$VideoDashPrefetchCache17(p);};o.prototype.has=function(p){'use strict';p=this.$VideoDashPrefetchCache8(p);return this.$VideoDashPrefetchCache1.has(p);};o.prototype.getAndDelete=function(p,q){'use strict';p=this.$VideoDashPrefetchCache8(p);var r=this.$VideoDashPrefetchCache1.get(p);if(r&&q)q();this.$VideoDashPrefetchCache1['delete'](p);return r;};o.prototype.$VideoDashPrefetchCache14=function(p){'use strict';p=this.$VideoDashPrefetchCache8(p);var q=this.$VideoDashPrefetchCache1.get(p);return q;};o.prototype.queueRequestBatch=function(p){'use strict';if(this.$VideoDashPrefetchCache6===0||this.$VideoDashPrefetchCache5<this.$VideoDashPrefetchCache6){this.$VideoDashPrefetchCache17(p);}else this.$VideoDashPrefetchCache4.push(p);};o.getInstance=function(){'use strict';if(h===null)h=new o();return h;};o.createQueryStringURL=function(p){'use strict';var q=p.url,r=p.start,s=p.end;if(r!==null&&r!==undefined&&s!==null&&s!==undefined)q=new (c('URI'))(q).addQueryData({bytestart:r,byteend:s});return q.toString();};o.getConsolidatedURL=function(p){'use strict';var q='',r=Infinity,s=0;for(var t=0;t<p.length;t++){var u=p[t],v=u.url,w=u.start,x=u.end;if(v==null||w==null||x==null)return null;if(q===''){q=v;}else if(q!==v)return null;r=Math.min(r,w);s=Math.max(s,x);}return o.createQueryStringURL({url:q,start:r,end:s});};o.loadVideo=function(p){'use strict';if(c('VideoPlayerShakaBandwidthEstimator').isAutoplayBandwidthRestrained())return;var q=o.getInstance();if(!p.manifest)p.manifest=[];q.queueRequestBatch({manifest:p.manifest.filter(l),video:p.video.filter(l),audio:p.audio.filter(l)});};o.getCacheValue=function(p,q){'use strict';return o.getInstance().getAndDelete(p,q);};f.exports=o;}),null);