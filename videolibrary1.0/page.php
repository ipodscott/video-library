<?php get_header(); ?>

		<div class="menu-btn"><i class="material-icons">menu</i></div>
		<div class="menu-overlay"></div>
		<div class="main-menu">
			<div class="menu-title">MAIN MENU<div class="close-menu"><i class="material-icons"> close </i></div><div></div></div>
			<ul class="video-menu">
					
					
					<?php while(has_sub_field("video_page_builder")): ?>
					
					
						<?php if(get_row_layout() == "collection_manager"):?>
						
						
							<?php $posts = get_sub_field('video_menu_items');
						
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
						
						 
						<?php elseif(get_row_layout() == "add_by_movie"):?>
						
							<li>
								<h2 class="acc-head"><?php the_sub_field('group_title');?> <i class="material-icons">add_circle_outline</i></h2>
									<div class="acc-body">
										<div class="video-summary">
											
												<p><?php the_sub_field('group_summary');?></p>
										
										</div>
										
										<?php $posts = get_sub_field('videos'); if( $posts ): ?>
									 
											 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
											     <?php setup_postdata($post); ?>
											     
											 <?php $selectVid = get_field('select_video_source'); if($selectVid == "youtube"){ ?>
											 
											  	<div class="video-link tube-link <?php the_field('resolution');?>" vidURL="https://www.youtube.com/embed/<?php the_field('youtube_id');?>?rel=0"><i class="material-icons">video_label</i> <?php the_title();?></div>
											  
											 <?php }else if ($selectVid == "mp4_upload"){ ?>
											   
											   	<div class="video-link <?php the_field('resolution');?> mp4-link" mp4Url="<?php the_field('mp4_upload');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
											  
											 <?php }else{ ?>
											  
											  	<div class="video-link <?php the_field('resolution');?> mp4-link"  mp4Url="<?php the_field('remote_mp4');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
											
											 <?php } ?>
											               	 
											 <?php endforeach; ?>
												    
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>	
			
										
									</div>
							</li>
						 			
						<?php elseif(get_row_layout() == "add_by_movie_external"):?>
							
							<li>
								<h2 class="acc-head"><?php the_sub_field('group_title');?> <i class="material-icons">add_circle_outline</i></h2>
									<div class="acc-body">
										<div class="video-summary">
											
												<p><?php the_sub_field('group_summary');?></p>
										
										</div>
										
										
											     
											 <?php if(get_sub_field('videos')): ?>
											 <?php while(has_sub_field('videos')): ?>
					
											 	<?php $selectVid = get_sub_field('select_video_source'); if($selectVid == "youtube"){ ?>
											 	
											 	<div class="video-link tube-link <?php the_sub_field('resolution');?>" vidURL="https://www.youtube.com/embed/<?php the_sub_field('youtube_id');?>?rel=0"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
											  
											 	 <?php }else if ($selectVid == "mp4_upload"){ ?>
											   
											   	<div class="video-link <?php the_sub_field('resolution');?> mp4-link" mp4Url="<?php the_sub_field('mp4_upload');?>"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
											  
											   	 <?php }else{ ?>
											  
											  	<div class="video-link <?php the_sub_field('resolution');?> mp4-link"  mp4Url="<?php the_sub_field('remote_mp4');?>"><i class="material-icons">video_label</i> <?php the_sub_field('video_title');?></div>
											  	
											  	 <?php } ?>
											 		
											 <?php endwhile; ?>
											 <?php endif; ?>
											
										
									</div>
							</li>

									
								
						<?php elseif(get_row_layout() == "toys"):?>
								
					<?php endif; ?>
					<?php endwhile; ?>
				
				
					
										
			</ul>
		</div>
		

<?php get_footer(); ?>
	