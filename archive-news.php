<?php get_header(); ?>
<div class="news block">
	<div class="container">
		<div class="block-title"> <?php echo __('Новости', 'machete');?></div>
		<div class="stick-item">
		<?php
            query_posts(array(
                'post_type' => 'news',
                'showposts' => 1,
                'order' => 'DESC'
            ) );
            global $wp_query;
           ?>
            <?php  while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="image">
							<?php the_post_thumbnail(array(339, 224), array('class' => 'img-responsive')); ?>
					</div>
				</div>
				<div class="col-sm-6 col-md-8">
					<div class="date"><?php the_date(); ?></div>
					<div class="title"> <?php the_title(); ?></div>
					<div class="description"><?php echo wp_trim_words( get_the_content(), 35, '' ); ?></div>
				</div>
			</div>
			<?php endwhile;?>
    	   <?php wp_reset_query(); ?>
		</div>
		<div class="row">
		<?php  while (have_posts()) : the_post(); ?>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<div class="image">
					<?php the_post_thumbnail(array(318, 226), array('class' => 'img-responsive')); ?>
					<span class="date">
						<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?> </span>
					</span>
				</div>
				<div class="caption">
                    <div class="title"><a href="#"><?php the_title(); ?></a></div>
                    <!-- <div class="type">VIDEO</div> -->
                </div>
			</div>
			<?php endwhile;?>
		</div>
		<div class="text-center">
			<?php $pages = paginate_links( array(
					'base' => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'type'  => 'array',
				));
				if( is_array( $pages ) ) {
			        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
			        echo '<div class="text-center"><ul class="pagination">';
			        foreach ( $pages as $page ) {
			                echo "<li>$page</li>";
			        }
			       echo '</ul></div>';
			        }
 			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>