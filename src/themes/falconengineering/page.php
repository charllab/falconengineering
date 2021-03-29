<?php
get_header();
?>

<!--page.php-->

<main class="my-3">

    <?php if (is_page([36])) : ?>


        <?php if (have_rows('pingpongs')): ?>
            <?php while (have_rows('pingpongs')) : the_row(); ?>

                <?php
                $icon = get_sub_field('icon');
                $image = get_sub_field('image');
                ?>

                <div class="my-lg-3 ping-bg <?php if( get_sub_field('position') == 'right' ):?>ping--right <?php else : ?>ping--left <?php endif; ?>d-flex"
                     style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                    <div class="container px-50 px-xl-0 position-relative z-index-100">
                        <div class="row align-content-center h-100">
                            <div class="col-lg-6 <?php if( get_sub_field('position') == 'right' ):?>ml-auto<?php endif; ?>">

                                <div class="ping-content">

                                    <?php if (get_sub_field('icon')): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_url($icon['alt']); ?>"
                                             class="d-block mb-250 ping-icon--size">
                                    <?php endif; ?>

                                    <h2 class="h2 semi-bold"><?php the_sub_field('title'); ?></h2>

                                    <?php if (get_field('sub_title')): ?>
                                        <h3 class="h4 semi-bold"><?php the_sub_field('sub_title'); ?></h3>
                                    <?php endif; ?>

                                    <?php the_sub_field('content'); ?>

                                    <?php if (get_sub_field('collapsable_content_list')): ?>

                                        <?php if (have_rows('collapsable_content_list')): ?>
                                            <ul>
                                            <?php while (have_rows('collapsable_content_list')) : the_row(); ?>
                                               <li>
                                                   <h5><?php the_sub_field('title_tab'); ?></h5>
                                                   <p><?php the_sub_field('content_area'); ?></p>
                                               </li>
                                            <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if (get_sub_field('button_link')): ?>
                                        <a href="<?php the_field('button_link'); ?>"
                                           class="btn btn-primary"><?php the_field('button_label'); ?></a>
                                    <?php endif; ?>
                                </div><!-- ping-content -->

                                <img src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_url($image['alt']); ?>"
                                     class="d-block img-fluid d-lg-none mb-2">

                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container-->
                </div><!-- ping-bg -->

            <?php endwhile; ?>
        <?php endif; ?>


    <?php elseif (is_page([40])) : ?>

        <section>
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

                <?php if (have_rows('team_members')): ?>

                <div class="row">

                    <?php while (have_rows('team_members')) : the_row(); ?>
                    <?php $photo = get_sub_field('photo'); ?>

                    <div class="col-sm-6 col-xxxl-4">
                        <a href="#">
                            <div class="stacker stacker--team bg-info text-white position-relative"
                                 style="background-image: url(<?php echo esc_url($photo['url']); ?>); background-size: cover; background-position: center;">
                                <div class="block__tint-overlay"></div>
                                <div class="stacker-content position-relative z-index-100">
                                    <h2 class="stacker-title text-white"><?php the_sub_field('name'); ?></h2>
                                    <p>
                                        <?php the_sub_field('name'); ?><br>
                                        <?php the_sub_field('job_title'); ?>
                                    </p>
                                    <div class="btn btn-outline-light">Read Full Bio</div>
                                </div><!-- stacker-content -->
                            </div><!-- stacker -->
                        </a>
                    </div><!-- col -->
                    <?php endwhile; ?>
                </div><!-- row -->
                <?php endif; ?>
            </div><!-- container -->
        </section>

    <?php else : ?>

        <section>
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
        </section>

    <?php endif; ?>


</main>

<?php get_footer(); ?>
