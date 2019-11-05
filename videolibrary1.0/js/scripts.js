$( document ).ready(function() {
   
   $('.load-overlay').delay(1000).fadeOut(500);
   
   $( "button" ).click(function() {
	   $('.load-overlay').fadeOut(500);
   });
   
    
    $( ".menu-btn" ).click(function() {
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
		$('.vidFrame').hide();
		$('.vidFrame').attr("src", "empty");
		$('.myVideo').attr("src", $(this).attr("mp4url"));
		$('.myVideo').show();	
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
    
    
});