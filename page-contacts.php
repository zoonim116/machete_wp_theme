<?php /* Template Name: Контакты */ ?>
<?php get_header(); ?>
<div id="contact" class="block">
	<div class="container">
		<div class="block-title"><?php the_title(); ?></div>
		<div class="content text-center">
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
<?php get_footer(); ?>