<?php

get_header();

global $wp_query;

$args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
);
$categories = get_categories();
?>

    <!--page-our-projects.php-->
    <main class="py-3">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>All Categories</h2>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">
                <?php foreach ($categories as $category) { ?>
                    <?php $category_image = get_field('category_image',  $category ); ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                        <a href="<?php echo get_category_link($category->term_id); ?>">
                            <div class="stacker stacker--project bg-info text-white position-relative"
                                 style="background-image: url(<?php echo esc_url($category_image['url']); ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
                                <div class="block__tint-overlay block__tint-overlay--hover"></div>
                                <div class="stacker-content position-relative z-index-100">
                                    <h3 class="stacker-title text-white">
                                        <?php echo $category->name; ?>
                                    </h3>
                                </div><!-- stacker-content -->
                            </div><!-- stacker -->

                        </a>
                    </div><!-- col -->
                <?php }
                ?>
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