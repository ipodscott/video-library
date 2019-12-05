<?php get_header(); ?>


 <?php 
			  $catId = get_field('episode_count');
			  $the_query = new WP_Query( array(
			 'post_type' => 'video',
			 'tax_query' => array(
			 
			 array('taxonomy' => 'video_category','terms' => $catId)
			 )
			 ));
			 $count = $the_query->found_posts;?>
		 
		

		<div class="menu-btn"><i class="material-icons">menu</i></div>
		<div id="btnFullscreen" class="fullscreen-btn"><i class="material-icons">fullscreen</i></div>
		<div class="menu-overlay"></div>
		<div class="main-menu">
			<div class="menu-title"> <?php the_title();?> <?php if((get_field('episode_count'))): ?>  <?php echo($count);?> Episodes  <?php endif;?> <div class="close-menu"><i class="material-icons"> close </i></div><div></div></div>
			<ul class="video-menu">
				
				<?php include('main_video_menu.php');?>
																
			</ul>
		</div>
		
		
		 <script>
	        function poll(poll_url, poll_timeout) {
			
			    setInterval( function() {
			
			        $.ajax({
			        	dataType: "json",
			        	url: poll_url,
			        	success: function (data){
			
				       	if(data.modified != date_modified){
				       		if(!date_modified){
				       			date_modified = data.modified;
				       		}
				       		else{
				       			location.reload();
				       		}
				       	}
				       	
			
			        	}
			        });
			    }, poll_timeout);
			}
			
			
				var date_modified = null; poll("<?php echo site_url() ?>/wp-json/wp/v2/<?php echo $post->post_type ?>s/<?php echo $post->ID ?>", 3000);
		
	</script>
		

<?php get_footer(); ?>
	