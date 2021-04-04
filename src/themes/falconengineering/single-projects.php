<?php
get_header();
?>

    <!--single-projects.php-->

    <main>

        <section class="about-us my-lg-3">
            <?php $image = get_field('project_hero'); ?>
            <div
                class="ping-bg <?php if (get_field('position') == 'right'): ?>ping--right <?php else : ?>ping--left <?php endif; ?> d-flex"
                style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                <div class="container px-xl-0 position-relative z-index-100">
                    <div class="row align-content-center h-100">
                        <div class="col-lg-6 <?php if (get_field('position') == 'right'): ?>ml-auto<?php endif; ?>">

                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_url($image['alt']); ?>"
                                 class="d-block img-fluid d-lg-none mt-2">

                            <div data-aos="<?php if (get_sub_field('position') == 'right'): ?>fade-left<?php else: ?>fade-right<?php endif; ?>" data-aos-duration="1000">
                            <div class="ping-content">
                                <h2 class="h2 semi-bold"><?php the_title(); ?></h2>
                                <?php if (get_field('sub_title')): ?>
                                    <?php $subTitle = strtolower(get_field('sub_title')); ?>
                                    <h3 class="h4 semi-bold"><?php echo ucwords($subTitle); ?></h3>
                                <?php endif; ?>

                                <?php the_field('content'); ?>

                                <?php if (get_sub_field('collapsable_content_list')): ?>
                                    <?php if (have_rows('collapsable_content_list')): ?>
                                        <ul class="list-unstyled">
                                            <?php $counter = 0;
                                            while (have_rows('collapsable_content_list')) : the_row(); ?>
                                                <li class="mb-0">
                                                    <div class="border-bottom border-secondary py-250">
                                                        <a class="h4 text-primary semi-bold " data-toggle="collapse"
                                                           data-target="#collapse-<?php echo $counter ?>"
                                                           aria-expanded="false" aria-controls="collapseExample">
                                                            <span
                                                                class="d-flex justify-content-xs-between align-items-center">
                                                            <?php the_sub_field('title_tab'); ?>  <i
                                                                    class="fas fa-chevron-right"></i>
                                                            </span>

                                                        </a>
                                                    </div>
                                                    <div class="collapse" id="collapse-<?php echo $counter ?>">
                                                        <div class="card card-body border-0 rounded-0">
                                                            <?php the_sub_field('content_area'); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $counter++; endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div><!-- ping-content -->

                            <?php if (have_rows('footer_block')): ?>
                                <div class="ping-footer">
                                    <ul class="list-unstyled mb-0">
                                        <?php while (have_rows('footer_block')) : the_row(); ?>
                                            <li class="mb-0">
                                                <p class="text-white mb-0"><?php the_sub_field('additional_information'); ?></p>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div><!-- ping-content bg-secondary -->
                            <?php endif; ?>

                            </div><!-- aos -->

                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container-->
            </div><!-- ping-bg -->
        </section><!-- my-3 -->

        <div class="container my-3 px-xxl-0">

            <div class="row">
                <div class="col-12">
                    <h2 class="mb-2 semi-bold" data-aos="fade-up">See More Projects</h2>
                </div><!-- col -->
            </div><!-- row -->

            <div class="row">
                <?php

                $the_query = new WP_Query(array(
                    'post_type' => 'projects',
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                    'post__not_in' => array($post->ID)
                ));

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>
                        <?php $otherimage = get_field('project_hero'); ?>
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1500">
                            <a href="<?php the_permalink(); ?>">
                                <div class="stacker stacker--project bg-info text-white position-relative"
                                     style="background-image: url(<?php echo esc_url($otherimage['url']); ?>); background-size: cover; background-repeat: no-repeat;">
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