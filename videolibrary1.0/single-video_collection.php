<?php get_header(); ?>
		
		
		<div class="menu-btn"><i class="material-icons">menu</i></div>
		<div class="menu-overlay"></div>
		<div class="main-menu">
			<div class="menu-title">MAIN MENU<div class="close-menu"><i class="material-icons"> close </i></div><div></div></div>
			<ul class="training-menu">
				<li>
				<h2 class="acc-head"><?php the_title();?> <i class="material-icons">add_circle_outline</i></h2>
				
				<div class="acc-body">
						<div class="video-summary">
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
							<?php endwhile; ?>
							<?php endif; ?>
							
						</div>
										 	
						<?php include('video-menu.php');?>
				</div>

			</li>
			</ul>
		</div>
		
			
<?php get_footer(); ?>