
$(document).ready(function(){

  // portfolio isotope
  //===============================================================
  var textProp = document.documentElement.textContent !== undefined ? 'textContent' : 'innerText';

function getText( elem ) {
  return elem[ textProp ];
}

// -----  ----- //

window.onload = function() {
  // init Isotope
  var iso = new Isotope( '.portfolio_isotope', {
    itemSelector: '.portfolio-item',
    layoutMode: 'fitRows',
  cellsByRow: {
    columnWidth: 200,
    //rowHeight: 150
  },
  });

  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function( itemElem ) {
      var number = getText( itemElem.querySelector('.number') );
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function( itemElem ) {
      var name = getText( itemElem.querySelector('.name') );
      return name.match( /ium$/ );
    }
  };

  // bind filter button click
  var filtersElem = document.querySelector('#filters');
  eventie.bind( filtersElem, 'click', function( event ) {
    // only work with buttons
    if ( !matchesSelector( event.target, 'button' ) ) {
      return;
    }
    var filterValue = event.target.getAttribute('data-filter');
    // use matching filter function
    filterValue = filterFns[ filterValue ] || filterValue;
    iso.arrange({ filter: filterValue });
  });

  // change is-checked class on buttons
  var buttonGroups = document.querySelectorAll('.project-button-group');
  for ( var i=0, len = buttonGroups.length; i < len; i++ ) {
    var buttonGroup = buttonGroups[i];
    radioButtonGroup( buttonGroup );
  }

} //);

function radioButtonGroup( buttonGroup ) {
  eventie.bind( buttonGroup, 'click', function( event ) {
    // only work with buttons
    if ( !matchesSelector( event.target, 'button' ) ) {
      return;
    }
    classie.remove( buttonGroup.querySelector('.is-checked'), 'is-checked' );
    classie.add( event.target, 'is-checked' );
  });
}


  //===============================================================
  // end portfolio isotope
  
  
  
  $(".prod-box").click(function(){
   if($(this).children().hasClass("m-hover")){
      $(".h-time").removeClass("m-hover");
   }else{
     $(".h-time").removeClass("m-hover");
     $(this).children().addClass("m-hover");
  }
  });
});
