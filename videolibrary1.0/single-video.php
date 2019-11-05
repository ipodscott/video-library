<?php get_header('video'); ?>
		
	<?php $selectVid = get_field('select_video_source'); if($selectVid == "youtube"){ ?>
			
		<iframe frameborder="0" src="https://www.youtube.com/embed/<?php the_field('youtube_id');?>?rel=0"></iframe>
								  
	<?php }else if ($selectVid == "mp4_upload"){ ?>
								   
		<video src="<?php the_field('mp4_upload');?>" controls></video>
								  
	<?php }else{ ?>
		
		<video src="<?php the_field('remote_mp4');?>" controls></video>						  
		
								
	<?php } ?>
			
<?php get_footer(); ?>
	