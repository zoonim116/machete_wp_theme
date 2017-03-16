    <footer>
        <div class="container">
            <div class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/footer-logo.png" alt=""></div>
            <nav id="footermenu" class="hidden-xs">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '',  'menu_id' => 'menu', 'menu_class' => 'clearfix')); ?>
            </nav>
            <div class="footer-links tac">
                <ul class="soc">
                    <li>
                        <?php  dynamic_sidebar('Social widget'); ?>
                    </li>
                </ul>
            </div>
            <div class="copy text-center">
                All rights reserved © <?php echo date('Y') ?>.  Machete Records<br />
                <small><?php echo __('Использование  информации', 'machete'); ?></small>
            </div>
            <a href="http://www.fod.com.ua" target="_blank" class="fod">
                www.fod.com.ua
                <img src="<?php echo get_template_directory_uri() ?>/images/fod.png" alt="">
            </a>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>