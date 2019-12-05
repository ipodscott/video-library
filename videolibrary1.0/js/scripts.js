$( document ).ready(function() {
   
   $('.load-overlay').delay(1000).fadeOut(500);
   
   $( "button" ).click(function() {
	   $('.load-overlay').fadeOut(500);
   });
   
    
    $( ".menu-btn" ).click(function() {
	    document.getElementById('myVideo').pause();
		$('.menu-overlay').fadeIn(500, function(){
			$('.main-menu').fadeIn(500);
			$('.close-menu').fadeIn(500);
		});
	});
	
	
	$( ".menu-overlay, .close-menu" ).click(function() {
		$('.main-menu').fadeOut(500, function(){
			$('.menu-overlay').fadeOut(500);
		});
	});
	
	$( ".video-link" ).click(function() {
		$('.video-link.active').removeClass( "active" );
		$(this).addClass( "active" );
	});
	
	
	$( ".tube-link" ).click(function() {
		videoChange();
		$('.vidFrame').attr("src", $(this).attr("vidUrl"));
		$('.myVideo').attr("src", "empty");
		$('.myVideo').hide();
		$('.vidFrame').show();
	});
	
	
	$( ".mp4-link" ).click(function() {
		videoChange();
		$('.vidFrame, .vimFrame').hide();
		$('.vidFrame, .vimFrame').attr("src", "empty");
		$('.myVideo').attr("src", $(this).attr("mp4url"));
		$('.myVideo').show(function(){
			 document.getElementById('myVideo').play();
		});
		
	});
	
	$(".widescreen-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".widescreen-img").addClass("show")
    });
    
    $(".pano-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".pano-img").addClass("show")
    });
    
    $(".standard-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".standard-img").addClass("show")
    });
    
    $(".sixteen-nine-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".sixteen-nine-img").addClass("show")
    });
    
    $(".pal-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".pal-img").addClass("show")
    });
    
     $(".na-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".nat-arch").addClass("show")
    });
    
    $(".vintage-wide-btn").click(function() {
        $(".vid-holder img").removeClass("show");
        $(".vintage-wide").addClass("show")
    });
	
	function videoChange(){
		$('.default-video-cover').fadeOut(500);
		
		$('.vid-box').fadeOut(500, function(){
			$('.vid-box').delay(500).fadeIn(500);
		});
	
		$('.main-menu').delay(500).fadeOut(500, function(){
			$('.menu-overlay').fadeOut(500);
		});
	}
	
	
	 $(".video-menu li").click(function() {
        $(".video-menu li").removeClass("show");
        $(this).addClass("show")
    });
	
	var $container = jQuery('.acc-body'), $acc_head = jQuery('.acc-head');

		$acc_head.last().addClass('last');
		
		$acc_head.on('click', function(e) {
			if( jQuery(this).next().is(':hidden') ) {
			    //Comment or uncomment the line below to control other open accordions when acc-head is clicked.
				$acc_head.removeClass('active').next().slideUp(300);
				jQuery(this).toggleClass('active').next().slideDown(300);
				
			}
          else{
              //Comment or Uncomment out the line below to add or remove the toggle function from acc-head
            jQuery(this).toggleClass('active').next().slideToggle(300);
          }
			e.preventDefault();
		});
		
    function fsToggle(){
	     $('.fullscreen-btn').toggleClass('active');
    }
    
  
    
});
        

	function toggleFullscreen(elem) {
	  elem = elem || document.documentElement;
	  if (!document.fullscreenElement && !document.mozFullScreenElement &&
	    !document.webkitFullscreenElement && !document.msFullscreenElement) {
	    if (elem.requestFullscreen) {
	      elem.requestFullscreen();
	    } else if (elem.msRequestFullscreen) {
	      elem.msRequestFullscreen();
	    } else if (elem.mozRequestFullScreen) {
	      elem.mozRequestFullScreen();
	    } else if (elem.webkitRequestFullscreen) {
	      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	    }
	    
	  } else {
	    if (document.exitFullscreen) {
	      document.exitFullscreen();
	    } else if (document.msExitFullscreen) {
	      document.msExitFullscreen();
	    } else if (document.mozCancelFullScreen) {
	      document.mozCancelFullScreen();
	    } else if (document.webkitExitFullscreen) {
	      document.webkitExitFullscreen();
	    }
	  }
	}
	
	document.getElementById('btnFullscreen').addEventListener('click', function() {
	  toggleFullscreen();
	  fsToggle();
	});
	
			