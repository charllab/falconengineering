<?php
global $post;
get_header(); ?>

<!--page-projects.php-->

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
        </div><!-- container -->

    </main>

<?php get_footer();