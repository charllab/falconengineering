<?php
/**
 *
 * Template Name: Blog
 *
 */
global $post;

get_header(); ?>

    <main class="py-3">
        <section class="general-sect__padding">

            <div class="container">
                <div class="row">
                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page' => 10,
                        'paged' => $paged
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

                    <?php endwhile; ?>

                </div><!-- row -->

                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8 text-center">
                        <nav aria-label="Page navigation">

                            <?php bootstrap_pagination(); ?>

                        </nav>
                    </div><!-- col-->
                </div><!-- row -->

            </div><!-- container -->
        </section><!-- .section -->


    </main>

<?php get_footer(); ?>