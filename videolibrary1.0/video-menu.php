<?php $posts = get_field('videos'); if( $posts ): ?>
				 
						 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						     <?php setup_postdata($post); ?>
						     
						 <?php $selectVid = get_field('select_video_source'); if($selectVid == "youtube"){ ?>
						 
						  	<div class="video-link tube-link" res="<?php the_field('resolution');?>" vidURL="https://www.youtube.com/embed/<?php the_field('youtube_id');?>?rel=0"><i class="material-icons">video_label</i> <?php the_title();?></div>
						  
						 <?php }else if ($selectVid == "mp4_upload"){ ?>
						   
						   	<div class="video-link mp4-link" res="<?php the_field('resolution');?>" mp4Url="<?php the_field('mp4_upload');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
						  
						 <?php }else{ ?>
						  
						  	<div class="video-link mp4-link" res="<?php the_field('resolution');?>" mp4Url="<?php the_field('remote_mp4');?>"><i class="material-icons">video_label</i> <?php the_title();?></div>
						
						 <?php } ?>
						               	 
						 <?php endforeach; ?>
							    
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>	