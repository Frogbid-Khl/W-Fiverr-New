(function(){var e,t,n,r;e=function(e){return $("<style>").attr({"class":"keyframe-style",id:e.id,type:"text/css"}).appendTo("head")};$.keyframe={getVendorPrefix:function(){var e;e=navigator.userAgent;if(e.indexOf("Opera")!==-1){return"-o-"}else if(e.indexOf("MSIE")!==-1){return"-ms-"}else if(e.indexOf("WebKit")!==-1){return"-webkit-"}else{return""}},isSupported:function(){var e,t,n;t=$("body").get(0);e=false;if(t.style.animationName){e=true}else{n=this.getVendorPrefix().slice(1,-1);var r=n+"AnimationName";if(r in t.style){e=true}}return e},getProperty:function(e){var t=e;switch(e){case"transform":t=this.getVendorPrefix()+t;break}return t},generate:function(t){var n,r,i,s,o,u;s=t.name||"";i="@"+this.getVendorPrefix()+"keyframes "+s+" {";for(u in t){if(u!=="name"){i+=u+" {";for(o in t[u]){var a=this.getProperty(o);i+=a+":"+t[u][o]+";"}i+="}"}}i+="}";r=$("style#"+t.name);if(r.length>0){r.html(i);n=$("*").filter(function(){this.style[""+$.keyframe.getVendorPrefix().slice(1,-1)+"AnimationName"]===s});n.each(function(){var e,t;e=$(this);t=e.data("keyframeOptions");e.resetKeyframe(function(){e.playKeyframe(t)})})}else{e({id:s}).append(i)}},define:function(e){if(e.length){for(var t=0;t<e.length;t++){var n=e[t];this.generate(n)}}else{return this.generate(e)}}};r=$.keyframe.getVendorPrefix();t="animation-play-state";n="running";$.fn.resetKeyframe=function(e){var i=$(this).css(r+t,n).css(r+"animation","none");if(e){setTimeout(e,1)}};$.fn.pauseKeyframe=function(){var e=$(this).css(r+t,"paused")};$.fn.resumeKeyframe=function(){return $(this).css(r+t,n)};$.fn.playKeyframe=function(e,i){var s,o,u,a,f,l;if(typeof e==="string"){var c=e.trim().split(" ");e={name:c[0],duration:parseInt(c[1]),timingFunction:c[2],delay:parseInt(c[3]),repeat:c[4],complete:i}}e=$.extend({duration:0,timingFunction:"ease",delay:0,repeat:1,direction:"normal",fillMode:"forwards",complete:i},e);a=e.duration;u=e.delay;l=e.repeat;s=""+e.name+" "+a+"ms "+e.timingFunction+" "+u+"ms "+l+" "+e.direction+" "+e.fillMode;i=e.complete;o=r+"animation";f=["webkit","moz","MS","o",""];var h=function(e,t,n){var r,i,s;i=0;s=[];while(i<f.length){if(!f[i]){t=t.toLowerCase()}r=f[i]+t;e.off(r).on(r,n);s.push(i++)}s};this.each(function(){var u=$(this).addClass("boostKeyframe").css(r+t,n).css(o,s).data("keyframeOptions",e);if(i){h(u,"AnimationIteration",i);h(u,"AnimationEnd",i)}})};e({id:"boost-keyframe"}).append(" .boostKeyframe{"+r+"transform:scale3d(1,1,1);}")}).call(this)
