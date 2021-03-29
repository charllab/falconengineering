<?php get_header(); ?>

    <!--front-page.php-->

    <main>

        <section class="about-us my-lg-3">
            <?php $image = get_field('image'); ?>
            <div class="ping-bg <?php if( get_field('position') == 'right' ):?>ping--right <?php else : ?>ping--left <?php endif; ?> d-flex"
                 style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                <div class="container px-xl-0 position-relative z-index-100">
                    <div class="row align-content-center h-100">
                        <div class="col-lg-6 <?php if( get_field('position') == 'right' ):?>ml-auto<?php endif; ?>">

                            <div class="ping-content">
                                <?php $pingimg = get_field('icon'); ?>
                                <img src="<?php echo esc_url($pingimg['url']); ?>"
                                     alt="<?php echo esc_url($pingimg['alt']); ?>"
                                     class="d-block mb-250 ping-icon--size">
                                <h2 class="h2 semi-bold"><?php the_field('title'); ?></h2>
                                <?php the_field('content'); ?>
                                <a href="<?php the_field('button_link'); ?>"
                                   class="btn btn-primary"><?php the_field('button_label'); ?></a>
                            </div><!-- ping-content -->

                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_url($image['alt']); ?>"
                                 class="d-block img-fluid d-lg-none mb-2">

                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container-->
            </div><!-- ping-bg -->
        </section><!-- my-3 -->

        <section class="learn-mores my-4 my-xxxl-5 mb-xxxl-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 bg-secondary py-1">
                        <div class="row h-100">

                            <?php if (have_rows('services')): ?>
                                <?php while (have_rows('services')) : the_row(); ?>
                                    <div class="col-lg-4 text-center text-white my-1 px-175 h-lg-100 d-lg-flex flex-lg-column">
                                        <div class="pb-1">
                                        <?php
                                        $image = get_sub_field('icon'); ?>
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                             alt="<?php echo esc_attr($image['alt']); ?>"
                                             class="d-block mb-50 mx-auto icon--frontpage-services"/>
                                        <h2 class="h4 mb-75"><?php the_sub_field('title'); ?></h2>
                                            <?php the_sub_field('blurb'); ?>
                                        </div><!-- pb-1 -->
                                        <div class="mt-auto">

                                            <a href="<?php the_sub_field('link_url'); ?>" class="d-block"><?php the_sub_field('link_text'); ?></a>
                                        </div><!-- mt-auto -->

                                    </div><!-- col -->
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div><!-- row -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- learn-mores -->

        <section class="project-slider pattern-bg pb-4">
            <div class="container py-2">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="h1 semi-bold text-white">Projects</h2>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->

            <?php if (have_rows('project_slider')): ?>
            <div class="owl-carousel owl-theme text-center" id="projects-slide">
                <?php while (have_rows('project_slider')) : the_row(); ?>
                <?php $projectsliderimageurl = get_sub_field('project_image'); ?>

                <div class="item container project-item h-100 px-0"
                     style="background: #666 url(<?php echo esc_url($projectsliderimageurl['url']); ?>) no-repeat center center; background-size: cover;">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="project-item-wrapper bg-white p-150">
                            <div class="project-item-content">
                                <h3 class="h2 mb-75"><?php the_sub_field('project_title'); ?></h3>
                                <a href="<?php the_sub_field('project_link'); ?>" class="btn btn-primary mb-0">Read More</a>
                            </div><!-- project-item-content -->
                        </div><!-- bg-white -->
                    </div><!-- row -->
                </div><!-- item container -->
                <?php endwhile; ?>
            </div><!-- owl-carousel -->
            <?php endif; ?>
        </section><!-- project-slider -->

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h1 semi-bold">
                            Latest News
                        </h2>
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">

                    <?php global $post;

                    $args = array(
                        'posts_per_page' => 2
                    );

                    $wp_query = new WP_Query();
                    $wp_query->query($args);

                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <div class="col-lg-6">
                            <a href="<?php the_permalink(); ?>">
                                <div class="stacker stacker--blog bg-info text-white position-relative"
                                     style="background-image: url('https://source.unsplash.com/1228x980');">
                                    <div class="block__tint-overlay"></div>
                                    <div class="stacker-content position-relative z-index-100">
                                        <h2 class="stacker-title text-white"><?php the_title(); ?></h2>
                                        <div class="btn btn-outline-light">Read More</div>
                                    </div><!-- stacker-content -->
                                </div><!-- stacker -->
                            </a>
                        </div><!-- col -->

                      <?php wp_reset_postdata(); endwhile; ?>

                </div><!-- row -->
            </div><!-- container -->
        </section><!-- project-slider -->

    </main>

<?php get_footer();
