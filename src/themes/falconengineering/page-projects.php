<?php

get_header();

global $wp_query;

$args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'posts_per_page' => 18
);

?>

    <!--page-our-projects.php-->

    <main class="py-3">

        <div class="container">
            <div class="row">

                <?php

                $the_query = new WP_Query($args);

                while ($the_query->have_posts()) : $the_query->the_post(); $projecthero = get_field('project_hero');?>

                    <div class="col-md-6 col-lg-4">
                        <a href="<?php the_permalink(); ?>">
                            <div class="stacker stacker--project bg-info text-white position-relative"
                                 style="background-image: url(<?php echo esc_url($projecthero['url']); ?>); background-size: cover; background-repeat: no-repeat;">
                                <div class="block__tint-overlay"></div>
                                <div class="stacker-content position-relative z-index-100">
                                    <h2 class="stacker-title text-white">
                                        <?php the_title(); ?>
                                    </h2>
                                </div><!-- stacker-content -->
                            </div><!-- stacker -->

                        </a>
                    </div><!-- col -->

                    <?php wp_reset_postdata(); ?>

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

    </main>

<?php get_footer();