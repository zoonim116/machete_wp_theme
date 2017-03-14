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
<?php get_footer(); ?>