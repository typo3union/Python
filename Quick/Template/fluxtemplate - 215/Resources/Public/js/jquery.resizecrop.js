!function(t){t.fn.resizecrop=function(e){var i={width:50,height:50,vertical:"center",horizontal:"center",wrapper:"span",moveClass:!0,moveId:!0,className:"resizecrop",zoom:!0,wrapperCSS:{}},e=t.extend(i,e);return this.each(function(){function i(t){if(width_ratio=e.width/t.width(),height_ratio=e.height/t.height(),width_ratio>height_ratio){switch((e.zoom||1>width_ratio)&&t.width(e.width),e.vertical){case"top":t.css("top",0);break;case"bottom":t.css("bottom",0);break;case"center":default:t.css("top",(t.height()-e.height)/-2+"px")}e.zoom||1>width_ratio?t.css("left",0):t.css("left",(t.width()-e.width)/-2+"px")}else{switch((e.zoom||1>height_ratio)&&t.height(e.height),e.horizontal){case"left":t.css("left",0);break;case"right":t.css("right",0);break;case"center":default:t.css("left",(t.width()-e.width)/-2+"px")}e.zoom||1>height_ratio?t.css("top",0):t.css("top",(t.height()-e.height)/-2+"px")}t.css({position:"relative",display:"block"})}var s=t(this);s.css("display","none"),s.removeAttr("width").removeAttr("height");var r=t(document.createElement(e.wrapper)).css({width:e.width,height:e.height,overflow:"hidden",display:"inline-block","vertical-align":"middle",position:"relative"}).css(e.wrapperCSS);if(e.moveClass){var o=s.attr("class").split(/\s+/);t.each(o,function(t,e){r.addClass(e)}),s.removeAttr("class"),s.addClass(e.className)}if(e.moveId){var a=s.attr("id");"undefined"!=typeof a&&a!==!1&&""!==a&&(s.removeAttr("id"),r.attr("id",a))}s.wrap(r),this.complete?i(s):s.load(function(){i(t(this))})})},t.fn.cropresize=t.fn.resizecrop}(jQuery);