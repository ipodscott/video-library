	<div class="load-overlay">
			<div class="login">
				
				
				<?php $selectLoadImage = get_field('select_load_image'); if($selectLoadImage == "default"){ ?>
					
					<img src="<?php the_field('branding_logo', 'option'); ?>" alt="Logo" />
				
				<?php }else{ ?>
				  	
				  	<img src="<?php the_field('branding_logo'); ?>" alt="Logo" />
				
				<?php } ?>
								
			</div>
		</div>

	
	<?php wp_footer(); ?>
		
	</body>
</html>