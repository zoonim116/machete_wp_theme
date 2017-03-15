<?php get_header(); ?>
<div class="videos block">
	<div class="container">
		<div class="block-title"> <?php echo __('Видео', 'machete');?> </div>
		<div class="row">
			<?php  while (have_posts()) : the_post(); ?>
				<div class="col-sm-4 col-md-4">
					<div class="image">
						<a href="<?php echo get_permalink(); ?>"> 
							<?php 
								do_action('video_thumbnail', get_field('youtube_video_id'), get_the_post_thumbnail_url(get_the_ID(), array(360, 226)));
							 ?>
							<span class="caption">
	                            <span class="title"><?php the_title(); ?></span>
	                            <span class="type">VIDEO</span>
	                        </span>
						</a>
					</div>
				</div>
			<?php   endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>