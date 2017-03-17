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
							<?php  dynamic_sidebar('Social widget'); ?>
						</li>
                        <li>
                            <!-- <a href="#"> -->
                                <svg id="dj" x="0px" y="0px" width="34px" height="10.746px" viewBox="0 0 34 10.746">
                                    <linearGradient id="grad" x1="0" y1="0" x2="0" y2="100%">
                                        <stop stop-color="#977d40" offset="0"></stop>
                                        <stop stop-color="#cfb66f" offset="10%"></stop>
                                        <stop stop-color="gold" offset="41%"></stop>
                                        <stop stop-color="#7f5a2f" offset="49%"></stop>
                                        <stop stop-color="#7c5a2e" offset="100%"></stop>
                                    </linearGradient>
                                    <g>
                                        <polygon fill="url(#grad)" points="0.532,1.198 0,2.787 4.992,2.787 4.992,10.746 6.387,10.746 6.387,2.787 7.597,2.787 8.129,1.198"/>
                                        <path fill="url(#grad)" d="M9.073,0l0.202,3.976h1.193L10.662,0H9.073z M11.855,0l0.202,3.976h1.193L13.452,0H11.855z"/>
                                        <path fill="url(#grad)" d="M16.669,10.746l-0.968-7.96H14.5l0.532-1.588h5.517c1.445,0,2.422,0.171,2.927,0.512
                                            c0.505,0.342,0.759,1.004,0.759,1.988c0,1.118-0.285,2.201-0.855,3.246c-0.57,1.046-1.338,1.902-2.307,2.568
                                            C19.997,10.249,18.529,10.66,16.669,10.746 M17.871,9.157c1,0,1.882-0.255,2.645-0.767c0.624-0.414,1.15-1.026,1.581-1.838
                                            c0.431-0.812,0.646-1.597,0.646-2.355c0-0.57-0.189-0.948-0.568-1.133s-1.152-0.278-2.318-0.278h-2.759L17.871,9.157z"/>
                                        <path fill="url(#grad)" d="M25.621,10.746l0.532-1.589h5.258V5.375c0-1.242-0.104-1.984-0.311-2.226
                                            c-0.206-0.242-0.835-0.363-1.883-0.363h-2.862l0.531-1.589h2.331c1.517,0,2.493,0.235,2.932,0.706
                                            c0.438,0.471,0.657,1.528,0.657,3.173v4.081H34l-0.524,1.589H25.621z"/>
                                    </g>
                                </svg>
                            <!-- </a> -->
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