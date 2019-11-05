<?php get_header(); ?>

		<div class="menu-btn"><i class="material-icons">menu</i></div>
		<div class="menu-overlay"></div>
		<div class="main-menu">
			<div class="menu-title">MAIN MENU<div class="close-menu"><i class="material-icons"> close </i></div><div></div></div>
			<ul class="training-menu">
					
					<?php $posts = get_field('video_menu_items');
					
					if( $posts ): ?>
					
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
					        
					        <li>
								<h2 class="acc-head"><?php the_title();?> <i class="material-icons">add_circle_outline</i></h2>
									<div class="acc-body">
										<div class="video-summary">
											
												<?php the_content(); ?>
										
										</div>
										
										<?php include('video-menu.php');?>

										
									</div>
					        </li>
					        
					    <?php endforeach; ?>
					 
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>						
			</ul>
		</div>
		

<?php get_footer(); ?>
	