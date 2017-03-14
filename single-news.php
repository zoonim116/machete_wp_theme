<?php get_header(); ?>
<div class="news-item block">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title"><a href="/news/"><?php echo __('Новости', 'machete'); ?> /</a> <?php the_title(); ?></div>
				<div class="content">
					<?php  while (have_posts()) : the_post(); ?>
			       		<?php if(!empty(get_the_content())) { ?>
			            	<?php the_content(); ?>
			            <?php } else { ?>
			            	<?php echo __('Нет данных', 'machete'); ?>
			            <?php } ?>
			          <?php   endwhile; ?>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="news">
	<div class="container line-top">
		<div class="row">
		<?php
            query_posts(array(
                'post_type' => 'news',
                'showposts' => 3,
                'post__not_in' => array(get_the_ID()),
                'order' => 'DESC'
            ) );
            global $wp_query;
           ?>
            <?php  while (have_posts()) : the_post(); ?>
				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="image">
						<?php the_post_thumbnail(array(318, 226), array('class' => 'img-responsive')); ?>
					</div>
					<div class="caption">
						<div class="title">
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<!-- <div class="type"> VIDEO</div> -->
					</div>
				</div>
			<?php endwhile;?>
    	   <?php wp_reset_query(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>