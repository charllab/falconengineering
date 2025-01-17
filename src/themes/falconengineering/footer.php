<footer class="bg-dark">

    <?php if (!is_page([23])) : ?>
    <section class="pt-2 pb-3">
        <div class="container h-100">
            <div class="row text-white h-100">
                <div class="col-xl-2">
                    <h1 class="h4">Contact us</h1>
                    <table class="w-100 small">
                        <tr class="align-top pb-50 d-block">
                            <td class="footer-icon-width">
                                <img src="<?php bloginfo('template_url'); ?>/images/svg-call-icon.svg"
                                     alt=" "
                                     class="">
                            </td>
                            <td class="footer-icon-width">
                                <a href="tel:+1<?php echo strip_tel(get_field('phone_number', 'option')); ?>" class="text-white"><?php echo get_field('phone_number', 'option'); ?></a>
                            </td>
                        </tr>
                        <tr class="align-top pb-50 d-block">
                            <td class="footer-icon-width">
                                <img src="<?php bloginfo('template_url'); ?>/images/svg-email-icon.svg"
                                     alt=" "
                                     class="">
                            </td>
                            <td>
                                <a href="mailto:<?php echo get_field('email_address', 'option'); ?>" class="text-white"><?php echo get_field('email_address', 'option'); ?></a>
                            </td>
                        </tr>
                        <tr class="align-top pb-50 d-block">
                            <td class="footer-icon-width">
                                <img src="<?php bloginfo('template_url'); ?>/images/svg-pin-icon.svg"
                                      alt=" "
                                      class="">
                            </td>
                            <td>
                                <!--<a href="--><?php //echo get_field('googlemaps_link','option'); ?><!--" class="text-white" title="View on Google Maps" target="_blank">-->
                                    <?php echo get_field('address', 'option'); ?>
                                <!--</a>-->
                            </td>
                        </tr>
                    </table>
                    <div class="social-links mb-1">
                        <p class="mb-250 font-weight-bold text-white mt-50 small">Join us on:</p>
                        <?php while( have_rows('social_links', 'options') ): the_row(); ?>
                            <a class="social-link btn btn-link text-white px-0 mr-250 py-0" target="_blank" href="<?php the_sub_field('url'); ?>">
                                <i class="<?php the_sub_field('icon_class'); ?> fa-lg">
                                    <span class="sr-only"><?php the_sub_field('label'); ?></span>
                                </i>
                            </a>
                        <?php endwhile; ?>
                    </div><!-- social-links -->
                </div><!-- col -->
                <div class="col-xl-1">
                    <h2 class="h4">Menu</h2>
                    <div class="mainnav-f">
                        <?php wp_nav_menu([
                            'theme_location' => 'secondary',
                            'container_class' => 'container px-0',
                            'container_id' => 'mainnav-f',
                            'menu_class' => 'navbar-nav',
                            'fallback_cb' => '',
                            'menu_id' => 'footer-menu',
                            'walker' => new understrap_WP_Bootstrap_Navwalker(),
                        ]); ?>
                    </div>
                </div>
                <div class="col-xl-3">
                    <h2 class="h4">Projects</h2>
                    <ul class="navbar-nav" id="projects-menu">
                        <?php

                        global $wp_query;

                        $args = array(
                            'post_type' => 'projects',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'posts_per_page' => 5
                        );

                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <li class="menu-item">
                                <a href="<?php the_permalink(); ?>" class="nav-link"><?php the_title(); ?></a>
                            </li>

                        <?php wp_reset_postdata(); endwhile; ?>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <h2 class="h4">Latest News</h2>
                    <ul class="navbar-nav" id="blog-menu">
                        <?php
                        global $post;
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'posts_per_page' => 5
                        );

                        $wp_query = new WP_Query();
                        $wp_query->query($args);

                        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                        <li class="menu-item">
                            <a href="<?php the_permalink(); ?>" class="nav-link"><?php the_title(); ?></a>
                        </li>

                        <?php wp_reset_postdata(); endwhile; ?>
                    </ul>
                </div>
                <div class="col d-flex flex-xl-column align-items-center px-0 mt-150 mt-xl-0">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Send Us a Message</a>
                </div>
            </div>
        </div>

    </section>

    <?php endif; ?>

    <section class="py-50 border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-4 text-center text-xl-left">
                    <p class="text-white small py-xl-50 mb-xl-0">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?>. All rights reserved.</p>
                </div>
                <div class="col-lg-12 col-xl-4 text-center">
                    <p class="text-white small py-xl-50 mb-xl-0"><a href="<?php echo esc_url(home_url('/terms-of-use')); ?>" class="text-white">Terms of Use</a> |
                        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="text-white">Privacy Policy</a></p>
                </div>
                <div class="col-lg-12 col-xl-4 text-center text-xl-right">
                    <p class="text-white small py-xl-50 mb-xl-0">Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank" class="text-white">Sproing&nbsp;Creative</a>
                    </p>
                </div>
            </div>
        </div>

    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>