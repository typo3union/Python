(function($){$.fn.resizecrop=function(options){var defaults={width:50,height:50,vertical:"center",horizontal:"center",wrapper:"span",moveClass:true,moveId:true,className:"resizecrop",zoom:true,wrapperCSS:{}};var options=$.extend(defaults,options);return this.each(function(){var $obj=$(this);$obj.css("display","none");$obj.removeAttr("width").removeAttr("height");var wrapper=$(document.createElement(options.wrapper)).css({width:options.width,height:options.height,overflow:"hidden",display:"inline-block","vertical-align":"middle","position":"relative"}).css(options.wrapperCSS);if(options.moveClass){var classList=$obj.attr("class").split(/\s+/);$.each(classList,function(index,className){wrapper.addClass(className);});$obj.removeAttr("class");$obj.addClass(options.className);}
if(options.moveId){var idName=$obj.attr("id");if(typeof idName!=="undefined"&&idName!==false&&idName!==""){$obj.removeAttr("id");wrapper.attr("id",idName);}}
$obj.wrap(wrapper);function transform(ref){width_ratio=options.width/ref.width();height_ratio=options.height/ref.height();if(width_ratio>height_ratio){if(options.zoom||width_ratio<1)
ref.width(options.width);switch(options.vertical){case"top":ref.css("top",0);break;case"bottom":ref.css("bottom",0);break;case"center":default:ref.css("top",((ref.height()-options.height)/-2)+"px");}
if(options.zoom||width_ratio<1)
ref.css("left",0);else
ref.css("left",((ref.width()-options.width)/-2)+"px");}else{if(options.zoom||height_ratio<1)
ref.height(options.height);switch(options.horizontal){case"left":ref.css("left",0);break;case"right":ref.css("right",0);break;case"center":default:ref.css("left",((ref.width()-options.width)/-2)+"px");}
if(options.zoom||height_ratio<1)
ref.css("top",0);else
ref.css("top",((ref.height()-options.height)/-2)+"px");}
ref.css({position:"relative",display:"block"});}
if(this.complete){transform($obj);}else{$obj.load(function(){transform($(this));});}});};$.fn.cropresize=$.fn.resizecrop;})(jQuery);