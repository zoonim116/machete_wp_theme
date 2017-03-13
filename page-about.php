<?php /* Template Name: О нас */ ?>
<?php get_header(); ?>
<div class="videos block">
    <div class="container">
        <div class="block-title"><?php the_title(); ?></div>

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