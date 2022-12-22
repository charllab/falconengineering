<?php

get_header();

// Build query
global $post;

// Retrieves the currently queried object
$tag = get_queried_object();
$urlTagName = $tag->slug;
$theTagName = $tag->name;

// Init args
$args = [
    'posts_per_page' => -1,
    'order' => 'ASC',
    'tag' => $urlTagName,
];

$wp_query = new WP_Query($args);
?>
    <!--category.php-->
    <main class="py-3">

        <div class="container">

            <div class="row">
                <div class="col-12">
                    <p><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a> > Tags > <?php echo ucwords($theTagName); ?></p>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">

                <?php if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        $bloghero = get_field('blog_hero'); ?>
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                            <div class="bg-secondary logo-image--fallback" style="">
                            <a href="<?php the_permalink(); ?>">
                                <div class="stacker stacker--project text-white position-relative"
                                     style="background-image: url(<?php echo esc_url($bloghero['url']); ?>); background-size: cover; background-repeat: no-repeat;">
                                    <div class="block__tint-overlay block__tint-overlay--hover"></div>
                                    <div class="stacker-content position-relative z-index-100">
                                        <h3 class="stacker-title text-white">
                                            <?php
                                            $thetitle = $post->post_title; /* or you can use get_the_title() */
                                            $getlength = strlen($thetitle);
                                            $thelength = 35;
                                            echo substr($thetitle, 0, $thelength);
                                            if ($getlength > $thelength) echo "&hellip;";
                                            ?>
                                        </h3>
                                    </div><!-- stacker-content -->
                                </div><!-- stacker -->

                            </a>
                            </div><!-- bg-scondary -->
                        </div><!-- col -->

                        <?php
                    }
                    wp_reset_postdata();
                } ?>

            </div><!-- row -->
        </div><!-- container -->

    </main>

<?php get_footer();