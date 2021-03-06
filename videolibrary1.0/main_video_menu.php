	<?php if ( 'yes' == get_field('include_summary') ): ?>
	 
	 <li>
	     	<h2 class="acc-head <?php if ( 'yes' == get_field('menu_active') ): ?> active <?php endif; ?>"><?php the_field('menu_title');?> <i class="material-icons">add_circle_outline</i></h2>
	     	<div class="acc-body" <?php if ( 'yes' == get_field('menu_active') ): ?> style="display: block";  <?php endif; ?> >
				<div class="video-summary">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?>
					<?php endif; ?>

				</div>

	     	</div>
	 </li>
	
	<?php endif; ?>
	
	<?php if(get_field('video_menu_builder')): ?>
	<?php while(has_sub_field('video_menu_builder')): ?>
						
	     <li>
	     	<h2 class="acc-head <?php if ( 'yes' == get_sub_field('menu_active') ): ?> active <?php endif; ?>"><?php the_sub_field('menu_title');?> <i class="material-icons">add_circle_outline</i></h2>
	     	<div class="acc-body" <?php if ( 'yes' == get_sub_field('menu_active') ): ?> style="display: block";  <?php endif; ?> >
				<div class="video-summary">
					<?php the_sub_field('menu_info');?>
				</div>
				
				<?php while(has_sub_field("add_menu_items")): ?>
					
					
					<?php if(get_row_layout() == "select_from_library"):?>
					
						<?php $posts = get_sub_field('select_from_library'); if( $posts ): ?>
	 
						 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						     <?php setup_postdata($post); ?>
						     
						 <?php $selectVid = get_field('select_video_source'); if($selectVid == "youtube"){ ?>
						 
						  	<div class="video-link tube-link <?php the_field('resolution');?>" vidURL="https://www.youtube.com/embed/<?php the_field('youtube_id');?>?rel=0&autoplay=1"><i class="material-icons">video_label</i> <?php the_title();?></div>
						 
						 <?php }else if ($selectVid == "vimeo"){ ?>
						  	
						  	<div class="video-link tube-link <?php the_field('resolution');?>" vidURL="https://player.vimeo.com/video/<?php the_field('vimeo_id');?>?autoplay=1"><i class="material-icons">video_label</i> <?php the_title();?></div>
						  
						 <?php }else if ($selectVid == "wistia"){ ?>
						  	
						  	<div class="video-link tube-link <?php the_field('resolution');?>" vidURL="https://fast.wistia.net/embed/iframe/<?php the_field('wistia_id');?>?autoplay=1"><i class="material-icons">video_label</i> <?php the_title();?></div>	
						  
						 <?php }else if ($selectVid == "mp4_upload"){ ?>
						   
						   	<div class="video-link <?php the_field('resolution');?> mp4-link" mp4Url="<?php the_field('mp4_upload');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
						  
						 <?php }else{ ?>
						  
						  	<div class="video-link <?php the_field('resolution');?> mp4-link"  mp4Url="<?php the_field('remote_mp4');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
						
						 <?php } ?>
						               	 
						 <?php endforeach; ?>
							    
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>	
					
					
					<?php elseif(get_row_layout() == "select_external_video"):?>
				 			
					
					     
					 <?php $selectVid = get_sub_field('select_video_source'); if($selectVid == "youtube"){ ?>
					 
					  	<div class="video-link tube-link <?php the_sub_field('resolution');?>" vidURL="https://www.youtube.com/embed/<?php the_sub_field('youtube_id');?>?rel=0&autoplay=1"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
					  	
					  <?php }else if ($selectVid == "vimeo"){ ?>
						  	
						<div class="video-link tube-link <?php the_sub_field('resolution');?>" vidURL="https://player.vimeo.com/video/<?php the_sub_field('vimeo_id');?>?autoplay=1"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
					
					<?php }else if ($selectVid == "wistia"){ ?>
						  	
						<div class="video-link tube-link <?php the_sub_field('resolution');?>" vidURL="https://fast.wistia.net/embed/iframe/<?php the_sub_field('wistia_id');?>?autoplay=1"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>		
					
		
					 <?php }else if ($selectVid == "mp4_upload"){ ?>
					   
					   	<div class="video-link <?php the_sub_field('resolution');?> mp4-link" mp4Url="<?php the_sub_field('mp4_upload');?>"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
					  
					 <?php }else{ ?>
					  
					  	<div class="video-link <?php the_sub_field('resolution');?> mp4-link"  mp4Url="<?php the_sub_field('remote_mp4');?>"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
					
					 <?php } ?>
					               	 
					 
												
				<?php endif; ?>
				<?php endwhile; ?>

										
			</div>
	     </li>
	<?php endwhile; ?>
	<?php endif; ?>
