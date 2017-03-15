<?php get_header(); ?>
<div class="video-item block">
	<div class="container">
			<div class="page-title">
				<a href="/video/"><?php echo __('Видео', 'machete');?> /</a> <?php the_title(); ?>
			</div>
		<?php  while (have_posts()) : the_post(); ?>
			<div class="description">
				<?php the_content(); ?>
			</div>
			<div class="content">
                <div class="text-center">
                    <div class="video-wrapper">
                        <iframe width="955" height="539" src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        <?php   endwhile; ?>
	</div>
</div>
<div class="videos block">
	<div class="container">
		<div class="block-title"><?php echo __("Новое", 'machete'); ?>
		  <div class="row">
		  <?php
            query_posts(array(
                'post_type' => 'video',
                'showposts' => 3,
                'post__not_in' => array(get_the_ID()),
                'order' => 'DESC'
            ) );
            global $wp_query;
           ?>
            <?php  while (have_posts()) : the_post(); ?>
			  	<div class="col-sm-4 col-md-4">
		  			<div class="image">
	                    <a href="<?php echo get_permalink(); ?>">
	                    	<?php do_action('video_thumbnail', get_field('youtube_video_id'), get_the_post_thumbnail_url(get_the_ID(), array(360, 226))); ?>
	                        <span class="caption">
	                        	<span class="title"><?php the_title(); ?></span>
	                        	<span class="type">VIDEO</span>
	                    	</span>
	                    </a>
	                </div>
			  	</div>
			<?php endwhile;?>
	   		<?php wp_reset_query(); ?>
		  </div>
		</div>
	</div>
</div>
<?php get_footer(); ?>