!function(a){function e(e,f){if(this.element=e,this.options=a.extend({},c,f),a(this.element).data("max-height",this.options.maxHeight),a(this.element).data("height-margin",this.options.heightMargin),delete this.options.maxHeight,this.options.embedCSS&&!d){var g=".readmore-js-toggle, .readmore-js-section { "+this.options.sectionCSS+" } .readmore-js-section { overflow: hidden; }";!function(a,b){var c=a.createElement("style");c.type="text/css",c.styleSheet?c.styleSheet.cssText=b:c.appendChild(a.createTextNode(b)),a.getElementsByTagName("head")[0].appendChild(c)}(document,g),d=!0}this._defaults=c,this._name=b,this.init()}var b="readmore",c={speed:100,maxHeight:150,heightMargin:16,moreLink:'<a href="#">Подробнее</a>',lessLink:'<a href="#">Закрыть</a>',embedCSS:!0,sectionCSS:"display: inline-block;",startOpen:!1,expandedClass:"readmore-js-expanded",collapsedClass:"readmore-js-collapsed",beforeToggle:function(){},afterToggle:function(){}},d=!1;e.prototype={init:function(){var b=this;a(this.element).each(function(){var c=a(this),d=c.css("max-height").replace(/[^-\d\.]/g,"")>c.data("max-height")?c.css("max-height").replace(/[^-\d\.]/g,""):c.data("max-height"),e=c.data("height-margin");if("none"!=c.css("max-height")&&c.css("max-height","none"),b.setBoxHeight(c),c.outerHeight(!0)<=d+e)return!0;c.addClass("readmore-js-section "+b.options.collapsedClass).data("collapsedHeight",d);var f=b.options.startOpen?b.options.lessLink:b.options.moreLink;c.after(a(f).on("click",function(a){b.toggleSlider(this,c,a)}).addClass("readmore-js-toggle")),b.options.startOpen||c.css({height:d})}),a(window).on("resize",function(a){b.resizeBoxes()})},toggleSlider:function(b,c,d){d.preventDefault();var e=this,f=newLink=sectionClass="",g=!1,h=a(c).data("collapsedHeight");a(c).height()<=h?(f=a(c).data("expandedHeight")+"px",newLink="lessLink",g=!0,sectionClass=e.options.expandedClass):(f=h,newLink="moreLink",sectionClass=e.options.collapsedClass),e.options.beforeToggle(b,c,g),a(c).animate({height:f},{duration:e.options.speed,complete:function(){e.options.afterToggle(b,c,g),a(b).replaceWith(a(e.options[newLink]).on("click",function(a){e.toggleSlider(this,c,a)}).addClass("readmore-js-toggle")),a(this).removeClass(e.options.collapsedClass+" "+e.options.expandedClass).addClass(sectionClass)}})},setBoxHeight:function(a){var b=a.clone().css({height:"auto",width:a.width(),overflow:"hidden"}).insertAfter(a),c=b.outerHeight(!0);b.remove(),a.data("expandedHeight",c)},resizeBoxes:function(){var b=this;a(".readmore-js-section").each(function(){var c=a(this);b.setBoxHeight(c),(c.height()>c.data("expandedHeight")||c.hasClass(b.options.expandedClass)&&c.height()<c.data("expandedHeight"))&&c.css("height",c.data("expandedHeight"))})},destroy:function(){var b=this;a(this.element).each(function(){var c=a(this);c.removeClass("readmore-js-section "+b.options.collapsedClass+" "+b.options.expandedClass).css({"max-height":"",height:"auto"}).next(".readmore-js-toggle").remove(),c.removeData()})}},a.fn[b]=function(c){var d=arguments;return void 0===c||"object"==typeof c?this.each(function(){if(a.data(this,"plugin_"+b)){var d=a.data(this,"plugin_"+b);d.destroy.apply(d)}a.data(this,"plugin_"+b,new e(this,c))}):"string"==typeof c&&"_"!==c[0]&&"init"!==c?this.each(function(){var f=a.data(this,"plugin_"+b);f instanceof e&&"function"==typeof f[c]&&f[c].apply(f,Array.prototype.slice.call(d,1))}):void 0}}(jQuery);