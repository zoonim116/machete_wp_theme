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
<?php get_footer(); ?>