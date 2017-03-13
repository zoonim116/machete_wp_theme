<?php /* Template Name: Музыка */ ?>
<?php get_header(); ?>
<div class="videos block">
    <div class="container">
        <div class="block-title"><?php the_title(); ?></div>

        <div class="row">
        <?php 
        	global $wp_query;
			$post = $wp_query->post;
			$page_id = $post->ID; // page ID
			$page_object = get_page( $page_id ); // page stuff
			$author_id = $post->post_author; // author ID

			$page_content = $page_object->post_content;
			if(!empty($page_content)) {
    			 echo $page_content; 
			 } else { 
		 		echo __('Нет данных', 'machete');
	 		 } 
	 		 ?>
        
        </div>
    </div>
</div>
<?php get_footer(); ?>