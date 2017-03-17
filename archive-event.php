<?php get_header(); ?>
<div class="events block">
    <div class="container">
        <div class="block-title"><?php echo __('События', 'machete'); ?></div>
        <div class="row">
        <?php  while (have_posts()) : the_post(); ?>
            <div class="col-sm-4 col-md-4 event_item">
                <!-- <a href="#"> -->
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                   <?php the_content(); ?>
                <!-- </a> -->
            </div>
             <?php   endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>