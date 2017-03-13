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
                <div>
                    <a href="#" class="play">
                        <span class="image"><img src="images/new1.jpg" alt=""></span>
                        <span class="title">Хит группы MACHETE исполненный на виолончелях и скрипке</span>
                        <span class="type">VIDEO</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <span class="image"><img class="img-circle" src="images/new1.jpg" alt=""></span>
                        <span class="title">Хит группы MACHETE исполненный на виолончелях и скрипке</span>
                        <span class="type">VIDEO</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <span class="image"><img class="img-circle" src="images/new1.jpg" alt=""></span>
                        <span class="title">Хит группы MACHETE исполненный на виолончелях и скрипке</span>
                        <span class="type">VIDEO</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <span class="image"><img class="img-circle" src="images/new1.jpg" alt=""></span>
                        <span class="title">Хит группы MACHETE исполненный на виолончелях и скрипке</span>
                        <span class="type">VIDEO</span>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <span class="image"><img class="img-circle" src="images/new1.jpg" alt=""></span>
                        <span class="title">Хит группы MACHETE исполненный на виолончелях и скрипке</span>
                        <span class="type">VIDEO</span>
                    </a>
                </div>
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