<?php
get_header();
?>

<!--single-projects.php-->

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <?php the_content(); ?>

                        <?php endwhile; ?>

                    <?php endif; ?>

                </div><!-- col -->
            </div><!-- row -->

            <div class="row">
            <?php

            $the_query = new WP_Query( array(
                'post_type' => 'projects',
                'post__not_in' => array( $post->ID )
            ) );

            if($the_query->have_posts()){
                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                            <div class="col-md-6 col-lg-4">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="stacker stacker--project bg-info text-white position-relative"
                                         style="background-image: url('https://source.unsplash.com/1228x980');">
                                        <div class="block__tint-overlay"></div>
                                        <div class="stacker-content position-relative z-index-100">
                                            <h2 class="stacker-title text-white">
                                                <?php the_title(); ?>
                                            </h2>
                                        </div><!-- stacker-content -->
                                    </div><!-- stacker -->

                                </a>
                            </div><!-- col -->
                    <?php
                }
                wp_reset_postdata();
            } ?>
            </div><!-- row -->

        </div><!-- container -->

    </main>

<?php get_footer();