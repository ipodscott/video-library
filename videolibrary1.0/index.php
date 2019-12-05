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
	