/* ==========================================================
 * bootstrap-carousel.js v2.3.1
 * http://twitter.github.com/bootstrap/javascript.html#carousel
 * ==========================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* CAROUSEL CLASS DEFINITION
  * ========================= */

  var Carousel = function (element, options) {
    this.$element = $(element)
    this.$indicators = this.$element.find('.carousel-indicators')
    this.options = options
    this.options.pause == 'hover' && this.$element
      .on('mouseenter', $.proxy(this.pause, this))
      .on('mouseleave', $.proxy(this.cycle, this))
  }

  Carousel.prototype = {

    cycle: function (e) {
      if (!e) this.paused = false
      if (this.interval) clearInterval(this.interval);
      this.options.interval
        && !this.paused
        && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))
      return this
    }

  , getActiveIndex: function () {
      this.$active = this.$element.find('.item.active')
      this.$items = this.$active.parent().children()
      return this.$items.index(this.$active)
    }

  , to: function (pos) {
      var activeIndex = this.getActiveIndex()
        , that = this

      if (pos > (this.$items.length - 1) || pos < 0) return

      if (this.sliding) {
        return this.$element.one('slid', function () {
          that.to(pos)
        })
      }

      if (activeIndex == pos) {
        return this.pause().cycle()
      }

      return this.slide(pos > activeIndex ? 'next' : 'prev', $(this.$items[pos]))
    }

  , pause: function (e) {
      if (!e) this.paused = true
      if (this.$element.find('.next, .prev').length && $.support.transition.end) {
        this.$element.trigger($.support.transition.end)
        this.cycle(true)
      }
      clearInterval(this.interval)
      this.interval = null
      return this
    }

  , next: function () {
      if (this.sliding) return
      return this.slide('next')
    }

  , prev: function () {
      if (this.sliding) return
      return this.slide('prev')
    }

  , slide: function (type, next) {
      var $active = this.$element.find('.item.active')
        , $next = next || $active[type]()
        , isCycling = this.interval
        , direction = type == 'next' ? 'left' : 'right'
        , fallback  = type == 'next' ? 'first' : 'last'
        , that = this
        , e

      this.sliding = true

      isCycling && this.pause()

      $next = $next.length ? $next : this.$element.find('.item')[fallback]()

      e = $.Event('slide', {
        relatedTarget: $next[0]
      , direction: direction
      })

      if ($next.hasClass('active')) return

      if (this.$indicators.length) {
        this.$indicators.find('.active').removeClass('active')
        this.$element.one('slid', function () {
          var $nextIndicator = $(that.$indicators.children()[that.getActiveIndex()])
          $nextIndicator && $nextIndicator.addClass('active')
        })
      }

      if ($.support.transition && this.$element.hasClass('slide')) {
        this.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $next.addClass(type)
        $next[0].offsetWidth // force reflow
        $active.addClass(direction)
        $next.addClass(direction)
        this.$element.one($.support.transition.end, function () {
          $next.removeClass([type, direction].join(' ')).addClass('active')
          $active.removeClass(['active', direction].join(' '))
          that.sliding = false
          setTimeout(function () { that.$element.trigger('slid') }, 0)
        })
      } else {
        this.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $active.removeClass('active')
        $next.addClass('active')
        this.sliding = false
        this.$element.trigger('slid')
      }

      isCycling && this.cycle()

      return this
    }

  }


 /* CAROUSEL PLUGIN DEFINITION
  * ========================== */

  var old = $.fn.carousel

  $.fn.carousel = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('carousel')
        , options = $.extend({}, $.fn.carousel.defaults, typeof option == 'object' && option)
        , action = typeof option == 'string' ? option : options.slide
      if (!data) $this.data('carousel', (data = new Carousel(this, options)))
      if (typeof option == 'number') data.to(option)
      else if (action) data[action]()
      else if (options.interval) data.pause().cycle()
    })
  }

  $.fn.carousel.defaults = {
    interval: 5000
  , pause: 'hover'
  }

  $.fn.carousel.Constructor = Carousel


 /* CAROUSEL NO CONFLICT
  * ==================== */

  $.fn.carousel.noConflict = function () {
    $.fn.carousel = old
    return this
  }

 /* CAROUSEL DATA-API
  * ================= */

var slideCount = $('.practical #myCarousel_date').find('.carousel-inner .item').length; // get number of slides
var slideCount_2 = $('.theorie #myCarousel_date_1').find('.carousel-inner .item').length; // get number of slides
	
 	
$('.practical #myCarousel_date .kursListPrev').addClass('inactive');
$('.practical #myCarousel_date .kursListPrev a').attr('href','javascript:void(0);');

$('.theorie #myCarousel_date_1 .kursListPrev').addClass('inactive');
$('.theorie #myCarousel_date_1 .kursListPrev a').attr('href','javascript:void(0);');

if(slideCount<2){
	$('.practical #myCarousel_date .kursListNext').addClass('inactive');
	$('.practical #myCarousel_date .kursListNext a').attr('href','javascript:void(0);');
}

if(slideCount_2<2){
	$('.theorie #myCarousel_date_1 .kursListNext').addClass('inactive');
	$('.theorie #myCarousel_date_1 .kursListNext a').attr('href','javascript:void(0);');
}




$('.tablenav').click( function (e) {
var getId = $(this).attr('id');	

if(getId=='t1'){
$('.p1').text('1');
$('.t1').text('0');
}else{
$('.p1').text('0');
$('.t1').text('1');
}

});


  $(document).on('click.carousel.data-api', '[data-slide], [data-slide-to]', function (e) {	
   /* var $this = $(this), href
      , $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
      , options = $.extend({}, $target.data(), $this.data())
      , slideIndex

    $target.carousel(options)

    if (slideIndex = $this.attr('data-slide-to')) {
      $target.data('carousel').pause().to(slideIndex).cycle()
    }

    e.preventDefault()*/
	var practical = $('.p1').text();
	var theory = $('.t1').text();
	
	
	if(practical==1){
	
	var index = $('.practical #myCarousel_date .carousel-inner .active').attr('id'); // get the index of the slide we are NOW on
	
	 if(index == 1){ // is first slide
		
		$('.practical #myCarousel_date .kursListPrev').addClass('inactive');
		$('.practical #myCarousel_date .kursListPrev a').attr('href','javascript:void(0);');
		
		$('.practical #myCarousel_date .kursListNext').removeClass('inactive');
		$('.practical #myCarousel_date .kursListNext a').attr('href','#myCarousel_date');


	  }else if(index == slideCount){ // is last slide
		
		$('.practical #myCarousel_date .kursListPrev').removeClass('inactive');
		$('.practical #myCarousel_date .kursListPrev a').attr('href','#myCarousel_date');
		
		$('.practical #myCarousel_date .kursListNext').addClass('inactive');
		$('.practical #myCarousel_date .kursListNext a').attr('href','javascript:void(0);');
		
	  }else{ // is not first or last slide
		
		$('.practical #myCarousel_date .kursListPrev').removeClass('inactive');
		$('.practical #myCarousel_date .kursListPrev a').attr('href','#myCarousel_date');
		
		$('.practical #myCarousel_date .kursListNext').removeClass('inactive');
		$('.practical #myCarousel_date .kursListNext a').attr('href','#myCarousel_date');
	  }
  	}
	
	
	if(theory==1){		
	var index_2 = $('.theorie #myCarousel_date_1 .carousel-inner .active').attr('id'); // get the index of the slide we are NOW on
	
	  if(index_2 == 1){ // is first slide
		
		$('.theorie #myCarousel_date_1 .kursListPrev').addClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListPrev a').attr('href','javascript:void(0);');
		
		$('.theorie #myCarousel_date_1 .kursListNext').removeClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListNext a').attr('href','#myCarousel_date_1');


	  }else if(index_2 == slideCount_2){ // is last slide
		
		$('.theorie #myCarousel_date_1 .kursListPrev').removeClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListPrev a').attr('href','#myCarousel_date_1');
		
		$('.theorie #myCarousel_date_1 .kursListNext').addClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListNext a').attr('href','javascript:void(0);');
		
	  }else{ // is not first or last slide
		
		$('.theorie #myCarousel_date_1 .kursListPrev').removeClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListPrev a').attr('href','#myCarousel_date_1');
		
		$('.theorie #myCarousel_date_1 .kursListNext').removeClass('inactive');
		$('.theorie #myCarousel_date_1 .kursListNext a').attr('href','#myCarousel_date_1');
	  }
	}
	
	
	
  })

}(window.jQuery);

