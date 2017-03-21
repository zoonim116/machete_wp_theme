<?php get_header(); ?>
<div class="videos block">
	<div class="container">
		<div class="block-title"> <?php echo __('Видео', 'machete');?> </div>
			<div class="text-center">
				<ul class="items-filter">
					<li><a href="#" data-filter="*" class="active">ВСЕ</a></li>
				<?php
					   /** The taxonomy we want to parse */
					   $taxonomy = "v_albums";
					   /** Get all taxonomy terms */
					    $terms = get_terms($taxonomy, array(
					            "orderby"    => "ASC",
					            "hide_empty" => false
					        )
					    );
			        	/** Loop through every term */
				        foreach($terms as $term) :
					        //Skip term if it has children
					        if($term->parent) {
					          continue;
					        } ?>
					          	<li><a href="#" data-filter=".year<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
			          <?php endforeach; ?>
				</ul>
			</div>
		<div class="grid">
			<div class="grid-sizer"></div>
			<?php  
				foreach($terms as $term) :
				$videos = get_posts(
					  array(
					      'posts_per_page' => -1,
					      'post_type' => 'video',
					      'tax_query' => array(
					          array(
					              'taxonomy' => 'v_albums',
					              'field' => 'term_id',
					              'terms' => $term->term_id,
					          )
					      )
					  )
					); 
					foreach ($videos as $video) :
					?>
					<div class="grid-item year<?php echo $term->name; ?>">
						<div class="image">
							<a href="<?php echo get_permalink($video->ID); ?>"> 
								<?php 
									do_action('video_thumbnail', get_field('youtube_video_id', $video->ID), get_the_post_thumbnail_url($video->ID, array(360, 300)));
								 ?>
								<span class="caption">
		                            <span class="title"><?php echo  $video->post_title; ?></span>
		                            <span class="type">VIDEO</span>
		                        </span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>