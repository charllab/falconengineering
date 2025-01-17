<header id="header" class="hero-nav-overlay">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary px-50 px-lg-0 z-index-500 w-100">
        <div class="container">

            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-aligned.svg"
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
                <form class="form-inline header-search-form ml-auto mt-50" method="GET" action="/" role="search">
                    <input class="form-control search-field"
                           id="s"
                           name="s"
                           type="search"
                           placeholder="Search"
                           aria-label="Search"
                    >
                    <button class="btn btn-primary btn-submit-search" type="submit">
                        <i class="fas fa-search"></i>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="mainnav-m collapse navbar-collapse bg-primary">
        <div class="d-lg-none pt-0 p-250">
            <form class="d-flex header-search-form ml-auto border border-primary" method="GET" action="/" role="search">
                <input class="form-control search-field"
                       id="s"
                       name="s"
                       type="search"
                       placeholder="Search"
                       aria-label="Search"
                >
                <button class="btn btn-secondary btn-submit-search" type="submit">
                    <i class="fas fa-search"></i>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container px-1 pt-250 pb-75 d-lg-none',
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
                         style="background: #666 url(<?php echo $herosliderimageurl['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
                        <div class="block__tint-overlay"></div>
                        <div class="item text-center h-100">
                            <div class="container hero-slide__container h-100">
                                <div class="row justify-content-center align-items-center h-100">
                                    <div class="col-lg-9">
                                        <h1 class="text-white mb-1"data-aos="fade-up"
                                            data-aos-easing="ease-in-back"
                                            data-aos-delay="300"
                                            data-aos-offset="0"><?php the_sub_field('hero_slide_title'); ?></h1>
                                        <?php if (get_sub_field('hero_slide_button_text')): ?>
                                            <a href="<?php the_sub_field('hero_slide_button_link'); ?>"
                                               class="btn btn-primary" class="text-white mb-1"data-aos="fade-up"
                                               data-aos-easing="ease-in-back"
                                               data-aos-delay="600"
                                               data-aos-offset="0"><?php the_sub_field('hero_slide_button_text'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div><!-- owl-carousel -->

        <?php endif; ?>

    <?php elseif ( is_search() ) : ?>

    <?php elseif ( is_archive() ) : ?>

    <?php else : ?>
        <?php $pagehero = get_field('page_header_image'); ?>
        <section class="py-3 position-relative page-title-section" style="background: #666 url(<?php echo $pagehero['sizes']['large']; ?>) no-repeat center center; background-size: cover;">
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