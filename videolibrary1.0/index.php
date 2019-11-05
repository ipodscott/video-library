<?php get_header(); ?>
		

		<div class="default-video-cover">
			<div class="start-right">
				<img src="<?php bloginfo('template_directory'); ?>/img/video_library_logo.svg" alt="Video Library 1.0" />
			</div>
		</div>
		
		<div class="menu-btn"><i class="material-icons">menu</i></div>
		<div class="menu-overlay"></div>
		<div class="main-menu">
			<div class="menu-title">MAIN MENU<div class="close-menu"><i class="material-icons"> close </i></div><div></div></div>
			<ul class="training-menu">
				
				
				
			<?php $posts = get_field('video_menu');
			
			if( $posts ): ?>
			    
			    <?php include('builder.php');?>
			    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
			
				
				
			</ul>
		</div>
		
	
<?php get_footer(); ?>
	