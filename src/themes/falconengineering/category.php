<?php

get_header();

// Build query
global $project_query;

// Retrieves the currently queried object
$page_object = get_queried_object();
$urlCategoryName = $page_object->cat_name;

// Init args
$args = [
    'post_type' => 'projects',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'category_name' => $urlCategoryName,
];

$project_query = new WP_Query($args); ?>
    <!--category.php-->
    <main class="py-3">

        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Category: <?php echo $urlCategoryName; ?></h2>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">

                <?php if ($project_query->have_posts()) {
                    while ($project_query->have_posts()) {
                        $project_query->the_post();
                        $projecthero = get_field('project_hero'); ?>
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                            <a href="<?php the_permalink(); ?>">
                                <div class="stacker stacker--project bg-info text-white position-relative"
                                     style="background-image: url(<?php echo esc_url($projecthero['url']); ?>); background-size: cover; background-repeat: no-repeat;">
                                    <div class="block__tint-overlay block__tint-overlay--hover"></div>
                                    <div class="stacker-content position-relative z-index-100">
                                        <h3 class="stacker-title text-white">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div><!-- stacker-content -->
                                </div><!-- stacker -->

                            </a>
                        </div><!-- col -->

                        <?php
                    }
                    wp_reset_postdata();
                } ?>

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