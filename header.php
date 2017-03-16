<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.5.9/es5-shim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--[if IE]>
    <![endif]-->
    <?php if (is_admin_bar_showing()) { ?> 
    	<style type="text/css">
    		header.main-header {
    			margin-top: 32px;
    		}
    		@media only screen and (max-width: 768px) {
    			#mainmenu .menu-wrapper {
    				margin-top: 32px;
    			}
    		}
    	</style>
    <?php } ?>
    <?php wp_head(); ?>
</head>

<header class="<?php if(is_front_page()) echo "main-header"; ?>">
		<div class="container">
			<div class="row top-links">
				<div class="col-xs-3 col-sm-2 col-md-6  hidden-xs">
					<a href="<?php echo get_option('option_2') ?>" rel="nofollow"> <?php echo __('HAVAKUK', 'machete'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
				</div>
				<div class="col-xs-9 col-sm-10 col-md-6  hidden-xs">
					<ul class="soc">
						<li>
							<a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a>
							<a href="#"><i class="fa yandex-music"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="logo">
						<a href="/">
							<?php
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            ?>
							<img src="<?php echo esc_url($logo[0]); ?>" class="img-responsive" alt="">
						</a>
					</div>					
				</div>

			</div>
		</div>
		<nav id="mainmenu">
            <div class="icon-block">
                <span><?php echo __('Меню', 'machete'); ?></span>
                <i class="fa fa-bars" aria-hidden="true"></i>

            </div>

            <div class="menu-wrapper">
                <i class="fa fa-times visible-xs" aria-hidden="true"></i>
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '',  'menu_id' => 'menu', 'menu_class' => 'clearfix')); ?>
            </div>
		</nav>		
	</header>