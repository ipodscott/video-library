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