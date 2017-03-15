<?php get_header(); ?>
	<div id="mainslider">
		<div class="owl-carousel">
			<?php
                query_posts(array(
                    'post_type' => 'homepage_slider',
                    'showposts' => 100,
                    'order' => 'DESC'
                ) );
                global $wp_query;
            ?>
            <?php $i = 0; while (have_posts()) : the_post(); ?>
            	<div>
					<div class="slide" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
						<div class="content">
							<div class="city"><?php the_title(); ?></div>
							<div class="date"><?php echo get_field('date'); ?></div>
							<div class="description"><?php the_content(); ?></div>
							<a href="<?php echo get_field('link'); ?>" class="btn-more">more info</a>
						</div>
					</div>
				</div>
    	   <?php $i++;  endwhile;?>
    	   <?php wp_reset_query(); ?>
		</div>
		<div class="mdwn"><a href="#new"></a></div>
	</div>
	<div id="new" class="block">
        <div class="container">
            <div class="block-title"><?php echo __('New', 'machete'); ?> </div>
            <div class="owl-carousel round-items">
            <?php 
            $news = get_posts(array(
				'numberposts' => 8,
				'post_type' => 'news',
				'meta_query' => array(
					array(
						'key' => 'go_homepage',
						'compare' => '==',
						'value' => '1'
					))
			)); 
            $hightLevelNews = count($news);
            $exclude = [];
			?>
			<?php if($news) { ?>
				<?php foreach( $news as $n ):
				$exclude[] = $n->ID;
				 ?>
	                <div>
	                    <a href="<?php echo get_permalink($n->ID); ?>">
	                        <span class="image"><img class="" src="<?php echo get_the_post_thumbnail_url($n->ID); ?>" alt=""></span>
	                        <span class="title"><?php echo $n->post_title; ?></span>
	                        <!-- <span class="type">VIDEO</span> -->
	                    </a>
	                </div>
            	<?php endforeach; ?>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
            <?php $res = 8 -  $hightLevelNews; ?>
            <?php
            query_posts(array(
                'post_type' => 'news',
                'showposts' => $res,
                'post__not_in' => $exclude,
                'order' => 'DESC'
            ) );
            global $wp_query;
           ?>
            <?php  while (have_posts()) : the_post(); ?>
    			 <div>
	                    <a href="<?php echo get_permalink(); ?>">
	                        <span class="image"><img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></span>
	                        <span class="title"><?php the_title(); ?></span>
	                        <!-- <span class="type">VIDEO</span> -->
	                    </a>
	                </div>
    		<?php endwhile;?>
    	    <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <div id="about" class="block">
        <div class="container">
            <div class="block-title"><?php echo get_field('subtitle'); ?></div>
            <div class="content text-center">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>