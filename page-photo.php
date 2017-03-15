<?php /* Template Name: Фото */ ?>
<?php get_header(); ?>
<div class="photos block">
	<div class="container">
		<div class="block-title"><?php the_title(); ?></div>
		<div class="text-center">
			<ul class="items-filter">
				<li><a href="#" data-filter="*" class="active">ВСЕ</a></li>
			<?php
				   /** The taxonomy we want to parse */
				   $taxonomy = "albums";
				   /** Get all taxonomy terms */
				    $terms = get_terms($taxonomy, array(
				            "orderby"    => "ASC",
				            "hide_empty" => false
				        )
				    );
				    /** Get terms that have children */
				    $hierarchy = _get_term_hierarchy($taxonomy);
		        	/** Loop through every term */
			        foreach($terms as $term) :
				        //Skip term if it has children
				        if($term->parent) {
				          continue;
				        }
				         if($hierarchy[$term->term_id]) : ?>
				          	<li><a href="#" data-filter=".year<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
				         <?php endif; ?>
		          <?php endforeach; ?>
			</ul>
		</div>
		<div class="grid">
			<div class="grid-sizer"></div>
			<?php $hierarchy = _get_term_hierarchy($taxonomy);
				foreach($terms as $term) :
					if($hierarchy[$term->term_id]) : 
						foreach($hierarchy[$term->term_id] as $child) { 
							$child = get_term($child);
							$meta_image = get_wp_term_image($child->term_id);
							 ?>
							  <div class="grid-item year<?php echo $term->name; ?>">
				                <a href="<?php echo get_term_link($child); ?>">
				                    <img src="<?php echo $meta_image; ?>" />
				                    <span class="caption"><?php echo $child->name; ?></span>
				                </a>
				              </div>
						<?php }
				?>
					<?php endif; ?>
			<?php endforeach; ?>
			
		</div>
	</div>
</div>
<?php get_footer(); ?>