<?php
function language_widget_init() {
        register_sidebar( array(
                'name'          => 'Language widget',
                'id'            => 'language_widget',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
        ) );
}
add_action( 'widgets_init', 'language_widget_init' );
