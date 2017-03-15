<?php get_header(); ?>
  <div class="photo-item block">
  	<div class="container">
  		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );   ?>
  		<div class="page-title"><a href="/photo/"><?php echo __('Фото', 'machete'); ?> /</a> <?php echo $term->name; ?></div>
  		<div class="description"><?php echo $term->description; ?></div>
  	</div>
  	<div class="photo-slider owl-carousel">
  		<?php  while (have_posts()) : the_post(); ?>
	  		<div class="item">
	            <a href="#"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>"></a>
	        </div>
        <?php   endwhile; ?>
  	</div>
  </div>
<?php get_footer(); ?>