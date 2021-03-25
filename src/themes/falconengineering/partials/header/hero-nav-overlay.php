<header id="header" class="hero-nav-overlay">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary px-50 px-lg-0 z-index-500 w-100">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".mainnav-m"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="mainnav-desktop d-lg-flex flex-lg-column d-none d-lg-block">

                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'mainnav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>

            </div>

        </div>
    </nav>

    <div class="mainnav-m collapse navbar-collapse bg-primary">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container px-1',
            'container_id' => 'mainnav',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'walker' => new understrap_WP_Bootstrap_Navwalker(),
        ]); ?>
    </div>

    <?php if (is_front_page()) : ?>

        <?php if (have_rows('hero_slide')): ?>
            <div class="owl-carousel" id="hero-slide">

                <?php while (have_rows('hero_slide')) : the_row(); ?>

                    <?php $herosliderimageurl = get_sub_field('hero_slide_image'); ?>

                    <div class="hero-slide--fullheight"
                         style="background: #666 url(<?php echo $herosliderimageurl['sizes']['large'] ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay"></div>
                        <div class="item text-center h-100">
                            <div class="container hero-slide__container h-100">
                                <div class="row justify-content-center align-items-center h-100">
                                    <div class="col-lg-9">
                                        <h1 class="text-white mb-1"><?php the_sub_field('hero_slide_title'); ?></h1>
                                        <?php if (get_sub_field('hero_slide_button_text')): ?>
                                            <a href="<?php the_sub_field('hero_slide_button_link'); ?>"
                                               class="btn btn-primary"><?php the_sub_field('hero_slide_button_text'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div><!-- owl-carousel -->

        <?php endif; ?>

    <?php else : ?>

        <section class="bg-success py-3 position-relative">
            <div class="block__tint-overlay position-absolute z-index-1"></div><!-- tint-overlay-->
            <div class="container position-relative z-index-100">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="text-white"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

</header>