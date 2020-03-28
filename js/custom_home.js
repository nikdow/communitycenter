/* ----------------- Start Document ----------------- */
(function($){
	$(document).ready(function(){
		'use strict';

/*----------------------------------------------------*/
/*	Hero Discover More Scroll - http://goo.gl/yTcXf
/*----------------------------------------------------*/

	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });

/*----------------------------------------------------*/
/*	Home Forum Content Slider  
/*----------------------------------------------------*/

	$('#forum_slider').liquidSlider({
	  slideEaseDuration: 500,
	  hoverArrows: false,
	  useCSSMaxWidth: 815,
	  autoSlide: true,
	  autoSlideInterval: 4000,
	  slideEaseFunction: "easeInOutCubic"
	});


/*----------------------------------------------------*/
/*	Home Background Video - http://goo.gl/G6B2HU
/*----------------------------------------------------*/

	(function ( window, document, undefined ) {

	  /*
	   * Grab all iframes on the page or return
	   */
	  var iframes = document.getElementsByTagName( 'iframe' );

	  /*
	   * Loop through the iframes array
	   */
	  for ( var i = 0; i < iframes.length; i++ ) {

	    var iframe = iframes[i],

	    /*
	       * RegExp, extend this if you need more players
	       */
	    players = /www.youtube.com|player.vimeo.com/;

	    /*
	     * If the RegExp pattern exists within the current iframe
	     */
	    if ( iframe.src.search( players ) > 0 ) {

	      /*
	       * Calculate the video ratio based on the iframe's w/h dimensions
	       */
	      var videoRatio        = ( iframe.height / iframe.width ) * 100;
	      
	      /*
	       * Replace the iframe's dimensions and position
	       * the iframe absolute, this is the trick to emulate
	       * the video ratio
	       */
	      iframe.style.position = 'absolute';
	      iframe.style.top      = '0';
	      iframe.style.left     = '0';
	      iframe.width          = '100%';
	      iframe.height         = '100%';
	      
	      /*
	       * Wrap the iframe in a new <div> which uses a
	       * dynamically fetched padding-top property based
	       * on the video's w/h dimensions
	       */
	      var wrap              = document.createElement( 'div' );
	      wrap.className        = 'fluid-vids';
	      wrap.style.width      = '100%';
	      wrap.style.position   = 'relative';
	      wrap.style.paddingTop = videoRatio + '%';
	      
	      /*
	       * Add the iframe inside our newly created <div>
	       */
	      var iframeParent      = iframe.parentNode;
	      iframeParent.insertBefore( wrap, iframe );
	      wrap.appendChild( iframe );

	    }

	  }

	})( window, document );


/* ------------------ End Document ------------------ */
});
	
})(this.jQuery);
