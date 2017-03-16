<?php
function social_widget_init() {
        register_sidebar( array(
                'name'          => 'Social widget',
                'id'            => 'social_widget',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
        ) );
}
add_action( 'widgets_init', 'social_widget_init' );
