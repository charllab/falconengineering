<?php
/**
 *
 * Template Name: Blog
 *
 */
global $post;

get_header(); ?>

    <main class="pt-1 pb-3">

        <section class="pb-75">
            <div class="container">
                <div class="row">
                    <p class="mb-50">Filter by Tags:</p>
                </div>
                <!--https://stackoverflow.com/questions/41673373/how-do-i-get-all-the-post-tags-in-wordpress-->
                <?php
                $tags = get_tags();
                foreach ( $tags as $tag ) {
                    $tag_link = get_tag_link( $tag->term_id );
                ?>
                    <a href="<?php echo $tag_link; ?>" class="tag-link">
                        <?php echo ucwords($tag->name) . ' (' .$tag->count . ')'; ?>
                    </a>
                <?php
                } ?>
                <?php
                wp_reset_postdata();
                ?>
            </div>
        </section>

        <section class="general-sect__padding">

            <div class="container">
                <div class="row mb-1">
                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page' => 10,
                        'paged' => $paged
                    );

                    $query=new WP_Query(array('posts_per_page=-1', ));

                    $wp_query = new WP_Query();
                    $wp_query->query($args);

                    while ($wp_query->have_posts()) : $wp_query->the_post(); $bloghero = get_field('blog_hero'); ?>

                        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                            <a href="<?php the_permalink(); ?>">
                                <div class="stacker stacker--blog bg-info text-white position-relative"
                                     style="background-image: url(<?php echo esc_url($bloghero['url']); ?>); background-size: cover; background-repeat: no-repeat;">
                                    <div class="block__tint-overlay block__tint-overlay--hover"></div>
                                    <div class="stacker-content position-relative z-index-100">
                                        <h2 class="stacker-title text-white">
                                            <?php
                                            $thetitle = $post->post_title; /* or you can use get_the_title() */
                                            $getlength = strlen($thetitle);
                                            $thelength = 35;
                                            echo substr($thetitle, 0, $thelength);
                                            if ($getlength > $thelength) echo "&hellip;";
                                            ?>
                                        </h2>
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