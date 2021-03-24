<header id="header" class="hero-nav-overlay bg-dark">

    <a class="btn btn-light rounded-0 mb-4 d-block d-lg-none"
       href="tel:<?php echo strip_tel(get_field('phone_number', 'options')); ?>">
        Call <?php bloginfo('name'); ?>
    </a>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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

            <div class="d-lg-flex flex-lg-column d-none d-lg-block">

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

    <div class="mainnav-m collapse navbar-collapse bg-warning">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container_class' => 'container',
            'container_id' => 'mainnav',
            'menu_class' => 'navbar-nav ml-auto',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'walker' => new understrap_WP_Bootstrap_Navwalker(),
        ]); ?>

        <div class="container">
            <a class="btn btn-link text-white px-0"
               href="tel:<?php echo strip_tel(get_field('phone_number', 'options')); ?>"><?php the_field('phone_number', 'options'); ?></a>
        </div>
    </div>

    <?php if (is_front_page()) : ?>

        <section class="bg-danger py-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-10 col-lg-7 col-xl-6">
                        <h1 class="text-white">Maecenas sed diam eget</h1>
                        <a href="#" class="btn btn-primary">learn about our services</a>
                    </div>
                </div>
            </div>
        </section>

    <?php else : ?>

        <section class="bg-success py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="text-white"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

</header>